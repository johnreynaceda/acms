<div x-data>
    <div class="flex justify-between items-end">
        <div class="w-64">
            <label for="">Report Type:</label>
            <x-filament::input.wrapper>
                <x-filament::input.select wire:model.live="selected_report">
                    <option value="">Select An Option</option>
                    <option value="1">Financial Report</option>
                    <option value="2">Credit Report</option>
                    <option value="3">Transaction Report</option>
                </x-filament::input.select>
            </x-filament::input.wrapper>
        </div>
        <div>
            <x-button label="Print Report" class="font-bold" sm slate
                @click="printOut($refs.printContainer.outerHTML);" />
        </div>
    </div>
    <div class="mt-5 border-t pt-5 ">
        @if ($selected_report == 1)
            <div x-ref="printContainer">
                <h1>FINANCIAL REPORT</h1>
                <div class="mt-3">
                    <table id="example" class="table-auto" style="width:100%">
                        <thead class="font-normal">
                            <tr>
                                <th class="border   text-left border-gray-400 px-2 font-semibold text-sm  py-1">
                                    CATEGORY
                                </th>
                                <th class="border   text-left border-gray-400 px-2 font-semibold text-sm  py-1">
                                    DETAILS
                                </th>
                                <th class="border   text-left border-gray-400 px-2 font-semibold text-sm  py-1">
                                    AMOUNT
                                </th>


                            </tr>
                        </thead>
                        <tbody class="">
                            <tr>
                                <td class="border text-sm  text-gray-700  font-medium border-gray-400 px-3 ">
                                    Member Contribution
                                </td>
                                <td class="border text-sm  text-gray-700  font-medium border-gray-400 px-3 ">
                                    Monthly Member Contributions
                                </td>
                                <td class="border text-sm  text-gray-700  font-medium border-gray-400 px-3 ">
                                    &#8369;{{ number_format($contribution, 2) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border text-sm  text-gray-700  font-medium border-gray-400 px-3 ">
                                    Loan Interest Income
                                </td>
                                <td class="border text-sm  text-gray-700  font-medium border-gray-400 px-3 ">
                                    Interest from members loan
                                </td>
                                <td class="border text-sm  text-gray-700  font-medium border-gray-400 px-3 ">
                                    &#8369;{{ number_format($interest, 2) }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        @if ($selected_report == 2)
            <div x-ref="printContainer">
                <h1>CREDIT REPORT</h1>
                <div class="mt-3">
                    <table id="example" class="table-auto" style="width:100%">
                        <thead class="font-normal">
                            <tr>
                                <th class="border   text-left border-gray-400 px-2 font-semibold text-sm  py-1">LOAN
                                    TYPE
                                </th>

                                <th class="border   text-left border-gray-400 px-2 font-semibold text-sm  py-1">LOAN
                                    AMOUNT
                                </th>
                                <th class="border   text-left border-gray-400 px-2 font-semibold text-sm  py-1">
                                    REPAYMENT
                                    SCHEDULE
                                </th>
                                <th class="border   text-left border-gray-400 px-2 font-semibold text-sm  py-1">
                                    OUTSTANDING BALANCE
                                </th>
                                <th class="border   text-left border-gray-400 px-2 font-semibold text-sm  py-1">
                                    PAYMENT HISTORY
                                </th>
                                <th class="border   text-left border-gray-400 px-2 font-semibold text-sm  py-1">
                                    LOAN STATUS
                                </th>


                            </tr>
                        </thead>
                        <tbody class="">
                            @forelse ($credits as $item)
                                <tr>
                                    <td class="border text-sm  text-gray-700  font-medium border-gray-400 px-3 ">
                                        {{ $item->loan->loanInfo->agriculture != null ? 'Agriculture' : '' }}
                                        {{ $item->loan->loanInfo->microfinance != null ? 'Microfinance' : '' }}
                                    </td>
                                    <td class="border text-sm  text-gray-700  font-medium border-gray-400 px-3 ">
                                        &#8369;{{ number_format($item->monthly_payment, 2) }}
                                    </td>
                                    <td class="border  text-sm text-gray-700  font-medium border-gray-400 px-3 ">
                                        {{ \Carbon\Carbon::parse($item->due_date)->addMonth()->format('F d, Y') }}
                                    </td>
                                    <td class="border text-sm  text-gray-700  font-medium border-gray-400 px-3 ">
                                        {{ number_format($item->loan->loan_amount - $item->loan->payments->where('is_paid', 1)->sum('monthly_payment'), 2) }}
                                    </td>
                                    <td class="border text-sm  text-gray-700  font-medium border-gray-400 px-3 ">
                                        @php
                                            $updatedAt = \Carbon\Carbon::parse($item->updated_at);
                                            $dueDate = \Carbon\Carbon::parse($item->due_date);
                                        @endphp
                                        {{ $updatedAt->lte($dueDate) ? 'On-Time' : 'Delay' }}
                                    </td>
                                    <td class="border  text-sm text-gray-700  font-medium border-gray-400 px-3 ">
                                        Active
                                    </td>
                                </tr>
                            @empty
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        @endif


        @if ($selected_report == 3)
            <div x-ref="printContainer">
                <h1>TRANSACTION REPORT</h1>
                <div class="mt-3">
                    <table id="example" class="table-auto" style="width:100%">
                        <thead class="font-normal">
                            <tr>
                                <th class="border   text-left border-gray-400 px-2 font-semibold text-sm  py-1">
                                    MEMBER NAME
                                </th>
                                <th class="border   text-left border-gray-400 px-2 font-semibold text-sm  py-1">
                                    PAYMENT METHOD
                                </th>
                                <th class="border   text-left border-gray-400 px-2 font-semibold text-sm  py-1">
                                    DATE
                                </th>
                                <th class="border   text-left border-gray-400 px-2 font-semibold text-sm  py-1">
                                    AMOUNT
                                </th>
                                <th class="border   text-left border-gray-400 px-2 font-semibold text-sm  py-1">
                                    BALANCE
                                </th>
                                <th class="border   text-left border-gray-400 px-2 font-semibold text-sm  py-1">
                                    AUTHORIZED BY
                                </th>
                                <th class="border   text-left border-gray-400 px-2 font-semibold text-sm  py-1">
                                    STATUS
                                </th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @forelse ($credits as $item)
                                <tr>
                                    <td class="border text-sm  text-gray-700  font-medium border-gray-400 px-3 ">
                                        {{ $item->loan->user->name }}
                                    </td>
                                    <td class="border text-sm  text-gray-700  font-medium border-gray-400 px-3 ">
                                        GCash
                                    </td>
                                    <td class="border text-sm  text-gray-700  font-medium border-gray-400 px-3 ">
                                        {{ \Carbon\Carbon::parse($item->updated_at)->format('F d, Y') }}
                                    </td>
                                    <td class="border text-sm  text-gray-700  font-medium border-gray-400 px-3 ">
                                        &#8369;{{ number_format($item->monthly_payment, 2) }}
                                    </td>
                                    <td class="border text-sm  text-gray-700  font-medium border-gray-400 px-3 ">
                                        &#8369;{{ number_format($item->loan->loan_amount - $item->loan->payments->where('is_paid', 1)->sum('monthly_payment'), 2) }}
                                    </td>
                                    <td class="border text-sm  text-gray-700  font-medium border-gray-400 px-3 ">
                                        Admin
                                    </td>
                                    <td class="border text-sm  text-gray-700  font-medium border-gray-400 px-3 ">
                                        PAID
                                    </td>

                                </tr>
                            @empty
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
