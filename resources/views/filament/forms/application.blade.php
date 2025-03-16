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
                        <p class="text-base-500 text-sm">Application content</p>
                    </main>
                </div>
                <div x-show="tab==='tab3'" class="text-base-500" style="display: none">
                    <main class="py-4">
                        <p class="text-base-500 text-sm">ECommerce content</p>
                    </main>
                </div>
            </div>
        </div>
    </div>
</section>
