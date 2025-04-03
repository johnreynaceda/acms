<section>
    <div class="relative px-1 ">
        <div x-data="{ tab: 'tab1' }">
            <ul class="flex gap-5 text-sm text-base-500 border-b border-base-200">
                <li class="-mb-px">
                    <a @click.prevent="tab = 'tab1'" href="#_"
                        class="inline-block py-2 font-medium bg-white text-accent-500 border-b-2 border-main"
                        :class="{ ' bg-white text-accent-500 border-b-2 border-main': tab === 'tab1' }">
                        PERSONAL INFO.</a>
                </li>
                <li class="-mb-px">
                    <a @click.prevent="tab = 'tab2'" href="#_" class="inline-block py-2 font-medium"
                        :class="{ ' bg-white text-accent-500 border-b-2 border-main': tab === 'tab2' }">
                        SOURCE OF INCOME</a>
                </li>
                <li class="-mb-px">
                    <a @click.prevent="tab = 'tab3'" href="#_" class="inline-block py-2 font-medium"
                        :class="{ ' bg-white text-accent-500 border-b-2 border-main': tab === 'tab3' }">
                        MONTHLY INCOME</a>
                </li>
                <li class="-mb-px">
                    <a @click.prevent="tab = 'tab4'" href="#_" class="inline-block py-2 font-medium"
                        :class="{ ' bg-white text-accent-500 border-b-2 border-main': tab === 'tab4' }">
                        LOAN PURPOSE</a>
                </li>
                <li class="-mb-px">
                    <a @click.prevent="tab = 'tab5'" href="#_" class="inline-block py-2 font-medium"
                        :class="{ ' bg-white text-accent-500 border-b-2 border-main': tab === 'tab5' }">
                        CREDIT INFO.</a>
                </li>
                <li class="-mb-px">
                    <a @click.prevent="tab = 'tab7'" href="#_" class="inline-block py-2 font-medium"
                        :class="{ ' bg-white text-accent-500 border-b-2 border-main': tab === 'tab7' }">
                        COLLATERAL INFO.</a>
                </li>
                <li class="-mb-px">
                    <a @click.prevent="tab = 'tab6'" href="#_" class="inline-block py-2 font-medium"
                        :class="{ ' bg-white text-accent-500 border-b-2 border-main': tab === 'tab6' }">
                        HOUSE SKETCH</a>
                </li>
            </ul>
            <div class="py-4 pt-4 text-left bg-white content">
                <div x-show="tab==='tab1'" class="text-base-500">
                    <main class="py-4">
                        <div class="grid grid-cols-5 gap-5">
                            <div>
                                <h1 class="text-sm">Image</h1>
                                <img src="{{ Storage::url($getRecord()->loanInfo->photo_path) }}" class="w-20 h-20"
                                    alt="">
                            </div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div>
                                <h1 class="text-sm">Lastname</h1>
                                <h1 class="uppercase font-semibold">{{ $getRecord()->loanInfo->lastname }}</h1>
                            </div>
                            <div>
                                <h1 class="text-sm">Firstname</h1>
                                <h1 class="uppercase font-semibold">{{ $getRecord()->loanInfo->firstname }}</h1>
                            </div>
                            <div>
                                <h1 class="text-sm">Middlename</h1>
                                <h1 class="uppercase font-semibold">{{ $getRecord()->loanInfo->middlename }}</h1>
                            </div>
                            <div>
                                <h1 class="text-sm">Contact Number</h1>
                                <h1 class="uppercase font-semibold">{{ $getRecord()->loanInfo->contact_number }}</h1>
                            </div>
                            <div>
                                <h1 class="text-sm">Birthdate</h1>
                                <h1 class="uppercase font-semibold">{{ $getRecord()->loanInfo->birthdate }}</h1>
                            </div>
                            <div class="col-span-5">
                                <h1 class="font-bold text-main">Spouse</h1>
                                <div class="grid grid-cols-4 mt-3 gap-5">
                                    <div>
                                        <h1 class="text-sm">Lastname</h1>
                                        <h1 class="font-semibold uppercase">
                                            {{ $getRecord()->loanInfo->spouse_lastname }}</h1>
                                    </div>
                                    <div>
                                        <h1 class="text-sm">Firstname</h1>
                                        <h1 class="font-semibold uppercase">
                                            {{ $getRecord()->loanInfo->spouse_lastname }}</h1>
                                    </div>
                                    <div>
                                        <h1 class="text-sm">Middlename</h1>
                                        <h1 class="font-semibold uppercase">
                                            {{ $getRecord()->loanInfo->spouse_lastname }}</h1>
                                    </div>

                                    <div>
                                        <h1 class="text-sm">Birthdate</h1>
                                        <h1 class="font-semibold uppercase">
                                            {{ $getRecord()->loanInfo->spouse_lastname }}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-5">
                                <h1 class="font-bold text-main">Residential Address</h1>
                                <div class="grid grid-cols-4 mt-3 gap-3">
                                    <div>
                                        <h1 class="text-sm">Purok</h1>
                                        <h1 class="font-semibold uppercase">{{ $getRecord()->loanInfo->purok }}</h1>
                                    </div>
                                    <div>
                                        <h1 class="text-sm">Barangay</h1>
                                        <h1 class="font-semibold uppercase">{{ $getRecord()->loanInfo->brgy }}</h1>
                                    </div>
                                    <div>
                                        <h1 class="text-sm">City</h1>
                                        <h1 class="font-semibold uppercase">{{ $getRecord()->loanInfo->city }}</h1>
                                    </div>

                                    <div>
                                        <h1 class="text-sm">Province</h1>
                                        <h1 class="font-semibold uppercase">{{ $getRecord()->loanInfo->province }}</h1>
                                    </div>
                                    <div>
                                        <h1 class="text-sm">Home</h1>
                                        <h1 class="font-semibold uppercase">{{ $getRecord()->loanInfo->home }}</h1>
                                    </div>
                                    <div>
                                        <h1 class="text-sm">Civil Status</h1>
                                        <h1 class="font-semibold uppercase">{{ $getRecord()->loanInfo->civil_status }}
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </main>
                </div>
                <div x-show="tab==='tab2'" class="text-base-500" style="display: none">
                    <main class="py-4">
                        <div class="grid grid-cols-5 gap-5">
                            <div class="col-span-5">
                                <h1 class="font-bold text-main">A. Business</h1>
                            </div>
                            @foreach (json_decode($getRecord()->loanInfo->business, true) as $item)
                                <div>
                                    <h1 class="text-sm">Type of Business</h1>
                                    <h1 class="font-semibold uppercase">{{ $item['type_of_business'] }}</h1>
                                </div>
                                <div>
                                    <h1 class="text-sm">Year in Business</h1>
                                    <h1 class="font-semibold uppercase">{{ $item['years_in_business'] }}</h1>
                                </div>
                                <div>
                                    <h1 class="text-sm">No. of Paid Employees</h1>
                                    <h1 class="font-semibold uppercase">{{ $item['no_of_paid_employees'] }}</h1>
                                </div>
                                <div class="col-span-2">
                                    <h1 class="text-sm">Workplace Characteristics</h1>
                                    <h1 class="font-semibold uppercase">{{ $item['workplace_characteristics'] }}</h1>
                                </div>
                                <div class="col-span-5">
                                    <h1 class="font-semibold text-main">Amount Requested</h1>
                                </div>
                                <div>
                                    <h1 class="text-sm">Loan Amount</h1>
                                    <h1 class="font-semibold uppercase">
                                        &#8369; {{ number_format($getRecord()->loan_amount, 2) }}
                                    </h1>
                                </div>
                            @endforeach

                            {{-- @dump(json_decode($getRecord()->loanInfo->business)) --}}
                            <div>
                                <h1 class="text-sm">Term</h1>
                                <h1 class="font-semibold uppercase">{{ $getRecord()->term }}
                                </h1>
                            </div>

                        </div>

                        <main class="py-4">
                            <h2 class="text-lg font-bold">Employment Details</h2>

                            @php
                                // Decode employment JSON safely
                                $employment = optional($getRecord())->loanInfo->employment
                                    ? json_decode($getRecord()->loanInfo->employment, true)
                                    : [];
                            @endphp

                            {{-- Current Employment Section --}}
                            @if (!empty($employment))
                                <div class="mt-4">
                                    <h3 class="font-semibold">Current Employment</h3>
                                    <p><strong>Name of Employer:</strong>
                                        {{ $employment['name_of_employer'] ?? 'N/A' }}</p>
                                    <p><strong>Address:</strong> {{ $employment['address'] ?? 'N/A' }}</p>
                                    <p><strong>Immediate Supervisor:</strong>
                                        {{ $employment['immediate_supervisor'] ?? 'N/A' }}</p>
                                    <p><strong>Position:</strong> {{ $employment['position'] ?? 'N/A' }}</p>
                                    <p><strong>Contact Number:</strong> {{ $employment['contact_number'] ?? 'N/A' }}
                                    </p>
                                    <p><strong>Length of Service:</strong>
                                        {{ $employment['length_of_service'] ?? 'N/A' }}</p>
                                    <p><strong>Status of Employment:</strong>
                                        {{ $employment['status_of_employment'] ?? 'N/A' }}</p>
                                </div>
                            @endif

                            {{-- Past Employment Section --}}
                            @if (!empty($employment['past_employment']))
                                <div class="mt-4">
                                    <h3 class="font-semibold">Past Employment</h3>
                                    <p><strong>Company Name:</strong>
                                        {{ $employment['past_employment']['company_name'] ?? 'N/A' }}</p>
                                    <p><strong>Past Address:</strong>
                                        {{ $employment['past_employment']['past_address'] ?? 'N/A' }}</p>
                                </div>
                            @endif

                            {{-- If no employment data exists --}}
                            @if (empty($employment))
                                <p class="text-gray-500 mt-4">No employment details available.</p>
                            @endif
                        </main>
                    </main>
                </div>
                <div x-show="tab==='tab3'" class="text-base-500" style="display: none">
                    <main class="py-4">
                        <div class="grid grid-cols-5 gap-5">
                            <div class="col-span-5">
                                <h1 class="font-semibold text-main">Basic Monthly Income</h1>
                            </div>
                            <div>
                                <h1 class="text-sm">Gross</h1>
                                <h1 class="font-semibold uppercase">{{ $getRecord()->loanInfo->gross_income }}
                                </h1>
                            </div>
                            <div>
                                <h1 class="text-sm">Spouse</h1>
                                <h1 class="font-semibold uppercase">{{ $getRecord()->loanInfo->spouse_income }}
                                </h1>
                            </div>
                            <div class="col-span-5">
                                <h1 class="font-semibold text-main">Expense</h1>
                            </div>
                            <div>
                                <h1 class="text-sm">Total Expense</h1>
                                <h1 class="font-semibold uppercase">{{ $getRecord()->loanInfo->total_expense }}
                                </h1>
                            </div>
                            <div class="col-span-2">
                                <h1 class="text-sm">Total Uncommited Income</h1>
                                <h1 class="font-semibold uppercase">
                                    {{ $getRecord()->loanInfo->total_uncommitted_income }}
                                </h1>
                            </div>
                        </div>
                    </main>
                </div>

                <div x-show="tab==='tab4'" class="text-base-500" style="display: none">
                    <main class="py-4">
                        <div class="grid grid-cols-5 gap-5">
                            <div class="col-span-5">
                                <h1 class="font-semibold text-main">Agriculture</h1>
                            </div>
                            <div>
                                <h1 class="text-sm"></h1>
                                <h1 class="font-semibold uppercase">
                                    {{ implode(',', json_decode($getRecord()->loanInfo->agriculture)) }}
                                </h1>
                            </div>

                            <div class="col-span-5">
                                <h1 class="font-semibold text-main">Microfinance</h1>
                            </div>
                            <div>
                                <h1 class="text-sm"></h1>
                                <h1 class="font-semibold uppercase">
                                    {{ implode(',', json_decode($getRecord()->loanInfo->agriculture)) }}
                                </h1>
                            </div>

                        </div>
                    </main>
                </div>
                <div x-show="tab==='tab5'" class="text-base-500" style="display: none">
                    <main class="py-4">
                        <div class="grid grid-cols-5 gap-5">

                            @if ($getRecord()->loanInfo->farming != null)
                                @forelse (json_decode($getRecord()->loanInfo->farming, true) as $item)
                                    <div>
                                        <h1 class="text-sm">Creditor/Supplier</h1>
                                        <h1 class="font-semibold uppercase">{{ $item['creditor'] ?? 'N/A' }}</h1>
                                    </div>
                                    <div>
                                        <h1 class="text-sm">Loan Amount</h1>
                                        <h1 class="font-semibold uppercase">
                                            &#8369;{{ number_format($item['loan_amount'] ?? 0, 2) }}
                                        </h1>
                                    </div>
                                    <div>
                                        <h1 class="text-sm">Outstanding Loan Balance</h1>
                                        <h1 class="font-semibold uppercase">
                                            &#8369;{{ number_format($item['outstanding_loan_balance'] ?? 0, 2) }}
                                        </h1>
                                    </div>
                                    <div>
                                        <h1 class="text-sm">Term</h1>
                                        <h1 class="font-semibold uppercase">{{ $item['term'] ?? 'N/A' }}</h1>
                                    </div>
                                    <div>
                                        <h1 class="text-sm">Maturity Date</h1>
                                        <h1 class="font-semibold uppercase">{{ $item['maturity_date'] ?? 'N/A' }}</h1>
                                    </div>
                                    <div>
                                        <h1 class="text-sm">Installment/Frequency</h1>
                                        <h1 class="font-semibold uppercase">{{ $item['installment'] ?? 'N/A' }}</h1>
                                    </div>
                                    <div>
                                        <h1 class="text-sm">Amount</h1>
                                        <h1 class="font-semibold uppercase">
                                            &#8369;{{ number_format($item['amount'] ?? 0, 2) }}
                                        </h1>
                                    </div>
                                @empty
                                    <p>null</p>
                                @endforelse
                            @endif

                        </div>
                    </main>
                </div>
                <div x-show="tab==='tab6'" class="text-base-500" style="display: none">
                    <main class="py-4">
                        <img src="" class="w-full h-auto" alt="">
                    </main>
                </div>
                <div x-show="tab==='tab7'" class="text-base-500" style="display: none">
                    <main class="py-4">
                        <h2 class="text-lg font-bold">Collateral Details</h2>

                        @php
                            // Ensure $getRecord() is not null and has 'loanInfo' before decoding
                            $collateral = optional($getRecord()->loanInfo)->collateral
                                ? json_decode($getRecord()->loanInfo->collateral, true)
                                : [];
                        @endphp

                        {{-- Real Estate Section --}}
                        @if (!empty($collateral['real_estate']))
                            <div class="mt-4">
                                <h3 class="font-semibold">Real Estate</h3>
                                <p><strong>Title Holder:</strong>
                                    {{ $collateral['real_estate']['title_holder'] ?? 'N/A' }}</p>
                                <p><strong>Title Number:</strong> {{ $collateral['real_estate']['title_no'] ?? 'N/A' }}
                                </p>
                                <p><strong>Lot Number:</strong> {{ $collateral['real_estate']['lot_no'] ?? 'N/A' }}</p>
                                <p><strong>Area:</strong> {{ $collateral['real_estate']['area'] ?? 'N/A' }} sq. m.</p>
                                <p><strong>Location:</strong> {{ $collateral['real_estate']['location'] ?? 'N/A' }}</p>
                            </div>
                        @endif

                        {{-- Motorcycle/Vehicle Section --}}
                        @if (!empty($collateral['vehicle']))
                            <div class="mt-4">
                                <h3 class="font-semibold">Motorcycle/Vehicle</h3>
                                <p><strong>Owner Name:</strong> {{ $collateral['vehicle']['owner_name'] ?? 'N/A' }}</p>
                                <p><strong>Body Type:</strong> {{ $collateral['vehicle']['body_type'] ?? 'N/A' }}</p>
                                <p><strong>Make:</strong> {{ $collateral['vehicle']['make'] ?? 'N/A' }}</p>
                                <p><strong>Engine No:</strong> {{ $collateral['vehicle']['engine_no'] ?? 'N/A' }}</p>
                                <p><strong>Chassis No:</strong> {{ $collateral['vehicle']['chassis_no'] ?? 'N/A' }}</p>
                                <p><strong>Year Model:</strong> {{ $collateral['vehicle']['year_model'] ?? 'N/A' }}</p>
                            </div>
                        @endif

                        {{-- ATM Section --}}
                        @if (!empty($collateral['atm']))
                            <div class="mt-4">
                                <h3 class="font-semibold">ATM</h3>
                                <p><strong>Account Name:</strong> {{ $collateral['atm']['account_name'] ?? 'N/A' }}</p>
                                <p><strong>Bank Name:</strong> {{ $collateral['atm']['bank_name'] ?? 'N/A' }}</p>
                                <p><strong>Account Source:</strong>
                                    {{ isset($collateral['atm']['account_source']) && is_array($collateral['atm']['account_source'])
                                        ? implode(', ', $collateral['atm']['account_source'])
                                        : 'N/A' }}
                                </p>
                                <p><strong>Others:</strong> {{ $collateral['atm']['others'] ?? 'N/A' }}</p>
                            </div>
                        @endif

                        {{-- If no collateral data exists --}}
                        @if (empty($collateral))
                            <p class="text-gray-500 mt-4">No collateral details available.</p>
                        @endif
                    </main>

                </div>
            </div>
        </div>
    </div>
</section>
