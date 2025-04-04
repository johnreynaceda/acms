<?php
namespace App\Livewire\Admin;

use App\Jobs\SendReminder;
use App\Models\Loan;
use App\Models\Payment;
use App\Notifications\LoanApplicationNotification;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class LoanApplication extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Loan::query())
            ->columns([
                TextColumn::make('created_at')->date()->label('DATE')->searchable(),
                TextColumn::make('user.name')->label('NAME')->searchable(),
                TextColumn::make('loan_amount')->label('LOAN AMOUNT')->formatStateUsing(
                    fn($record) => '₱' . number_format($record->loan_amount, 2),
                )->searchable(),
                TextColumn::make('term')->label('TERM')->formatStateUsing(
                    fn($record) => $record->term . ' month(s)',
                )->searchable(),
                TextColumn::make('status')->label('STATUS')->searchable()->formatStateUsing(
                    fn($record) => ucfirst($record->status)
                )->badge()->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    })->icon(fn(string $state): string => match ($state) {
                        'pending' => 'heroicon-o-clock',
                        'approved' => 'heroicon-o-hand-thumb-up',
                        'rejected' => 'heroicon-o-hand-thumb-down',
                    }),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make('view')->label('View Record')->icon('heroicon-m-eye')->color('warning')->slideOver()->modalHeading('Loan Information')
                        ->form([
                            ViewField::make('form')
                                ->view('filament.forms.application')
                        ])->modalWidth('5xl'),
                    Action::make('approve')->visible(fn($record) => $record->status == 'pending')->icon('heroicon-m-hand-thumb-up')->color('success')->action(
                        function ($record) {
                            $record->update(['status' => 'approved']);

                            $remaining = Payment::where('loan_id', $record->id)->where('is_paid', true)->sum('monthly_payment');
                            $months_paid = Payment::where('loan_id', $record->id)->where('is_paid', true)->count();
                            $months_left = $record->term - $months_paid;

                            // Calculate the remaining loan balance
                            $remaining_balance = $record->loan_amount - $remaining;

                            // Monthly interest rate (5%)
                            $monthly_rate = 0.05;

                            // Calculate the monthly payment for the remaining balance
                            if ($months_left > 0) {
                                $numerator = $monthly_rate * pow(1 + $monthly_rate, $months_left);
                                $denominator = pow(1 + $monthly_rate, $months_left) - 1;
                                $monthly_payment = $remaining_balance * ($numerator / $denominator);
                            } else {
                                $monthly_payment = 0; // Prevent division by zero if no months are left
                            }

                            // Calculate the monthly interest for the remaining balance
                            $monthly_interest = $remaining_balance * $monthly_rate;

                            // Total interest for the remaining months
                            $total_interest = $monthly_interest * $months_left;

                            // Calculate the total payment for the remaining balance
                            $total_payment = $monthly_payment + $monthly_interest;

                            // Create a new payment record with calculated amounts
                            Payment::create([
                                'loan_id' => $record->id,
                                'monthly_payment' => $monthly_payment,
                                'interest' => $monthly_interest,
                                'due_date' => now()->addMonth(),
                            ]);

                            $record->user->notify(new LoanApplicationNotification($record->user));
                            SendReminder::dispatch($record->user, now())->delay(now()->addMinutes(1));
                        }
                    ),
                    Action::make('reject')->visible(fn($record) => $record->status == 'pending')->icon('heroicon-m-hand-thumb-down')->color('danger'),
                    Action::make('completed')->visible(fn($record) => $record->status == 'approved')->icon('heroicon-m-check-circle')->color('success'),
                ]),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function test()
    {
        sleep(2);

        SendReminder::dispatch(auth()->user(), now())->delay(now()->addMinutes(1));
    }

    public function render()
    {
        return view('livewire.admin.loan-application');
    }
}
