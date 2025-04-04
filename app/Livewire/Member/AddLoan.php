<?php

namespace App\Livewire\Member;

use App\Models\Loan;
use App\Models\LoanInformation;
use App\Models\Post;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AddLoan extends Component implements HasForms
{
    use InteractsWithForms;

    public $photo = [], $lastname, $firstname, $middlename, $contact_number, $birthdate;
    public $spouse_lastname, $spouse_firstname, $spouse_middlename, $spouse_birthdate;
    public $purok, $brgy, $city, $province;
    public $home, $civil_status;
    public $loan_amount, $term;

    public $gross_income, $spouse_income, $total_expense, $total_uncommitted_income;

    public $agriculture = [], $microfinance = [];

    public $employment = [
        'name_of_employer' => '',
        'address' => '',
        'immediate_supervisor' => '',
        'position' => '',
        'contact_number' => '',
        'length_of_service' => '',
        'status_of_employment' => '',
        'past_employment' => [
            'company_name' => '',
            'past_address' => '',
        ],
    ];

    public $house_sketch = [];
    public $business = [[]];
    public $farming = [[]];
    public $collateral = [];
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('I. PERSONAL INFORMATION')
                    ->schema([
                        Fieldset::make('APPLICANT')->schema([
                            FileUpload::make('photo')->columnSpan(1),
                            ViewField::make('emplty')->label('')
                                ->view('filament.forms.empty'),
                            ViewField::make('emplty')->label('')
                                ->view('filament.forms.empty'),
                            ViewField::make('emplty')->label('')
                                ->view('filament.forms.empty'),
                            TextInput::make('lastname')->required(),
                            TextInput::make('firstname')->required(),
                            TextInput::make('middlename'),
                            TextInput::make('contact_number')->numeric(),
                            DatePicker::make('birthdate')->required(),
                        ])->columns(4),
                        Fieldset::make('SPOUSE')->schema([
                            TextInput::make('spouse_lastname')->label('Lastname')->required(),
                            TextInput::make('spouse_fistname')->label('Firstname')->required(),
                            TextInput::make('spouse_middlename')->label('Middlename'),
                            DatePicker::make('spouse_birthdate')->label('Birthdate')->required(),
                        ])->columns(4),
                        Fieldset::make('RESIDENTIAL ADDRESS')->schema([
                            TextInput::make('purok'),
                            TextInput::make('brgy'),
                            TextInput::make('city'),
                            TextInput::make('province'),
                        ])->columns(4),
                        Select::make('home')->options([
                            'Owned' => 'Owned',
                            'Rented' => 'Rented',
                            'Living w/ arents' => 'Living w/ arents',
                        ]),
                        Select::make('civil_status')->options([
                            'Single' => 'Single',
                            'Married' => 'Married',
                            'Widow' => 'Widowed',
                        ])
                    ])->columns(2),
                Section::make('II. SOURCES OF INCOME')
                    ->schema([
                        Fieldset::make('A. BUSINESS')->schema([
                            Repeater::make('business')->label('')->addActionLabel('Add to Business')
                                ->schema([
                                    TextInput::make('type_of_business')->required(),
                                    TextInput::make('years_in_business')->required(),
                                    TextInput::make('no_of_paid_employees')->required(),
                                    Select::make('workplace_characteristics')->options([
                                        'Owned' => 'Owned',
                                        'Rented' => 'Rented',
                                        'Home-based' => 'Home-based',
                                        'Ambudant' => 'Ambudant',
                                        'Commercial' => 'Commercial',
                                    ]),
                                ])
                                ->columns(3)
                        ])->columns(1),
                        Fieldset::make('B. EMPLOYMENT')->schema([
                            Grid::make(3)->schema([
                                TextInput::make('employment.name_of_employer')
                                    ->label('Name of Employer')
                                    ->required()
                                    ->live(),

                                TextInput::make('employment.address')
                                    ->label('Address')
                                    ->required()
                                    ->live(),

                                TextInput::make('employment.immediate_supervisor')
                                    ->label('Immediate Supervisor')
                                    ->required()
                                    ->live(),

                                TextInput::make('employment.position')
                                    ->label('Position')
                                    ->required()
                                    ->live(),

                                TextInput::make('employment.contact_number')
                                    ->label('Contact Number')
                                    ->required()
                                    ->live(),

                                TextInput::make('employment.length_of_service')
                                    ->label('Length of Service')
                                    ->required()
                                    ->live(),

                                Radio::make('employment.status_of_employment')
                                    ->label('Status of Employment')
                                    ->options([
                                        'Regular' => 'Regular',
                                        'Contractual' => 'Contractual',
                                    ])
                                    ->required()
                                    ->live(),
                            ]),

                            Fieldset::make('PAST EMPLOYMENT DETAILS')->schema([
                                TextInput::make('employment.past_employment.company_name')
                                    ->label('Company Name')
                                    ->required()
                                    ->live(),

                                TextInput::make('employment.past_employment.past_address')
                                    ->label('Past Address')
                                    ->required()
                                    ->live(),
                            ])
                        ])->columns(1),

                        Fieldset::make('AMOUNT REQUESTED')->schema([
                            Grid::make(2)->schema([
                                TextInput::make('loan_amount')->required()->numeric()->prefix('PHP'),
                                TextInput::make('term')->required()->numeric()->prefix('No. of Months'),

                            ])
                        ])->columns(1),
                    ]),
                Section::make('III. STATEMENT OF MONTHLY INCOME')
                    ->schema([
                        Fieldset::make('Basic Monthly Income')->schema([
                            TextInput::make('gross_income')->numeric()->prefix('PHP'),
                            TextInput::make('spouse_income')->label('Spouse')->numeric()->prefix('PHP'),
                        ]),
                        Fieldset::make('Expense')->schema([
                            TextInput::make('total_expense')->numeric()->prefix('PHP'),
                        ]),
                        TextInput::make('total_uncommitted_income')->numeric()->prefix('PHP'),
                    ])->columns(2),
                Section::make('IV. LOAN PURPOSE')
                    ->schema([
                        Fieldset::make('AGRICULTURE')->schema([
                            CheckboxList::make('agriculture')->label('')
                                ->options([
                                    'Rice' => 'Rice',
                                    'Corn' => 'Corn',
                                    'Sugar Cane' => 'Sugar Cane',
                                    'Mango' => 'Mango',
                                    'Banana' => 'Banana',
                                    'Poultry' => 'Poultry',
                                    'Swine' => 'Swine',
                                ])
                                ->columns(3)
                        ])->columnSpan(4),
                        Fieldset::make('MICROFINANCE')->schema([
                            CheckboxList::make('microfinance')->label('')
                                ->options([
                                    'Sari-sari Store' => 'Sari-sari Store',
                                    'Carenderia' => 'Carenderia',
                                    'Tailoring/ Dressmaking' => 'Tailoring/ Dressmaking',
                                    'Food Processing' => 'Food Processing',
                                    'Tricycle' => 'Tricycle',

                                ])
                                ->columns(3)
                        ])->columnSpan(4),
                    ])->columns(2),
                Section::make('V. CREDIT INFORMATION')
                    ->schema([
                        Repeater::make('credit')->label('')
                            ->schema([
                                TextInput::make('creditor')->label('Creditor/Supplier')->required(),
                                TextInput::make('loan_amount')->required(),
                                TextInput::make('outstanding_loan_balance')->required(),
                                TextInput::make('term')->required(),
                                DatePicker::make('maturity_date')->required(),
                                Select::make('installment')->label('Installment/Frequency')->options([
                                    'Weekly' => 'Weekly',
                                    'Monthly' => 'Monthly'
                                ]),
                                TextInput::make('amount')->prefix('PHP')->numeric()->required(),
                            ])
                            ->columns(3)->addActionLabel('Add New Information')
                    ])->columns(1),
                Section::make('VI. COLLATERAL DETAIL')
                    ->schema([
                        Fieldset::make('REAL ESTATE')
                            ->schema([
                                TextInput::make('collateral.real_estate.title_holder')
                                    ->label('Title Holder'),
                                TextInput::make('collateral.real_estate.title_no')
                                    ->label('Title Number'),
                                TextInput::make('collateral.real_estate.lot_no')
                                    ->label('Lot Number'),
                                TextInput::make('collateral.real_estate.area')
                                    ->label('Area (sq. m.)')
                                    ->hint('sq. m.'),
                                TextInput::make('collateral.real_estate.location')
                                    ->label('Location'),
                            ])->columns(3),

                        Fieldset::make('MOTORCYCLE/VEHICLE')
                            ->schema([
                                TextInput::make('collateral.vehicle.owner_name')
                                    ->label('Owner Name'),
                                TextInput::make('collateral.vehicle.body_type')
                                    ->label('Body Type'),
                                TextInput::make('collateral.vehicle.make')
                                    ->label('Make'),
                                TextInput::make('collateral.vehicle.engine_no')
                                    ->label('Engine Number'),
                                TextInput::make('collateral.vehicle.chassis_no')
                                    ->label('Chassis Number'),
                                TextInput::make('collateral.vehicle.year_model')
                                    ->label('Year Model'),
                            ])->columns(3),

                        Fieldset::make('ATM')
                            ->schema([
                                TextInput::make('collateral.atm.account_name')
                                    ->label('Account Name'),
                                TextInput::make('collateral.atm.bank_name')
                                    ->label('Bank Name'),
                                CheckboxList::make('collateral.atm.account_source')
                                    ->label('Account Source')
                                    ->options([
                                        'Salary' => 'Salary',
                                        'Pension' => 'Pension',
                                        'Allotment' => 'Allotment',
                                    ])->columns(2),
                                TextInput::make('collateral.atm.others')
                                    ->label('Other Sources')
                                    ->columnSpan(2),
                            ])->columns(3),
                    ])->columns(1),
                Section::make('VII. HOUSE SKETCH')
                    ->schema([
                        FileUpload::make('house_sketch')->label('')->required()
                    ])->columns(1),

            ]);
    }

    public function submitForm()
    {
        sleep(1);

        $data = Loan::where('user_id', auth()->user()->id)->where('status', 'approved')->get();

        if ($data->count() > 0) {

        } else {
            $loan = Loan::create([
                'user_id' => auth()->user()->id,
                'loan_amount' => $this->loan_amount,
                'term' => $this->term,
            ]);

            $info = LoanInformation::create([
                'loan_id' => $loan->id,
                'lastname' => $this->lastname,
                'firstname' => $this->firstname,
                'middlename' => $this->middlename,
                'birthdate' => $this->birthdate,
                'contact_number' => $this->contact_number,
                'spouse_lastname' => $this->spouse_lastname,
                'spouse_firstname' => $this->spouse_firstname,
                'spouse_middlename' => $this->spouse_middlename,
                'spouse_birthdate' => $this->spouse_birthdate,
                'purok' => $this->purok,
                'brgy' => $this->brgy,
                'city' => $this->city,
                'province' => $this->province,
                'home' => $this->home,
                'civil_status' => $this->civil_status,
                'gross_income' => $this->gross_income,
                'spouse_income' => $this->spouse_income,
                'total_expense' => $this->total_expense,
                'total_uncommitted_income' => $this->total_uncommitted_income,
                'collateral' => json_encode($this->collateral),
                'employment' => json_encode($this->employment),
            ]);

            if ($this->photo) {
                foreach ($this->photo as $key => $value) {
                    $info->update([
                        'photo_path' => $value->store('Photo', 'public'),
                    ]);
                }
            }

            if ($this->house_sketch) {
                foreach ($this->house_sketch as $key => $value) {
                    $info->update([
                        'house_sketch_path' => $value->store('HouseSketch', 'public'),
                    ]);
                }
            }

            if ($this->agriculture) {
                $info->update([
                    'agriculture' => json_encode($this->agriculture),
                ]);
            }

            if ($this->microfinance) {
                $info->update([
                    'microfinance' => json_encode($this->microfinance),
                ]);
            }

            if ($this->farming) {
                $info->update([
                    'farming' => json_encode($this->farming),
                ]);
            }

            if ($this->business) {
                $info->update([
                    'business' => json_encode($this->business),
                ]);
            }
        }



        return redirect()->route('member.dashboard');

    }

    public function render()
    {
        return view('livewire.member.add-loan');
    }
}
