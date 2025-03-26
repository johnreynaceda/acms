<?php

namespace App\Livewire\Admin;

use App\Models\Payment;
use Livewire\Component;

class Report extends Component
{
    public $selected_report;
    public function render()
    {
        return view('livewire.admin.report', [
            'credits' => Payment::where('is_paid', 1)->get(),
            'contribution' => Payment::where('is_paid', 1)->sum('monthly_payment'),
            'interest' => Payment::where('is_paid', 1)->sum('interest')
        ]);
    }
}
