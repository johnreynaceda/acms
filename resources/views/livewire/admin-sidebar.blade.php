<div>
    <div class="border p-5 rounded-[2rem]">
        <div class="bg-gray-700 relative overflow-hidden rounded-2xl p-5">

            <div class="absolute -bottom-16 left-0">
                <h1 class="font-black text-[8rem] text-white opacity-5 tracking-widest">LOAN</h1>
            </div>
            <div class="flex text-white justify-between items-center">
                <h1 class="text-xl ">Loan Wallet</h1>
                <div class="relative w-10 h-10">
                    <div
                        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-gray-500">
                    </div>
                    <div
                        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-6 h-6 rounded-full bg-gray-300">
                    </div>
                </div>
            </div>
            <div class="mt-10 mb-10">
                <div class="text-gray-400">
                    <h1 class="text-sm">Total Loan</h1>
                    <h1 class="text-4xl text-white font-bold">&#8369;{{ number_format($total_loan, 2) }}</h1>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <div class="flex justify-between items-end">
                <h1 class="text-xl  text-gray-600">Transactions</h1>
                <a href="" class="text-blue-500">See more</a>
            </div>
            <ul class="mt-5 space-y-2 relative z-10">
                @forelse ($payments as $item)
                    <li class="flex justify-between items-center">
                        <div class="flex space-x-3 items-center">
                            <div class="h-12 w-12  grid place-content-center text-center bg-gray-500">
                                <h1 class="text-sm font-bold text-gray-400 uppercase">
                                    {{ \Carbon\Carbon::parse($item->updated_at)->format('M') }}</h1>
                                <h1 class="text-xs font-bold leading-3 text-gray-300">
                                    {{ \Carbon\Carbon::parse($item->updated_at)->format('d') }}</h1>
                            </div>
                            <div class="text-gray-700">
                                <h1 class=" font-semibold">
                                    {{ $item->loan->user->name }}
                                </h1>
                                <h1 class="leading-3 text-sm text-gray-500 ">
                                    &#8369;{{ number_format($item->monthly_payment + $item->interest, 2) }}</h1>
                            </div>
                        </div>
                    </li>
                @empty
                    <li>
                        <h1 class="text-sm text-gray-300 ">No transaction history found.</h1>
                    </li>
                @endforelse

            </ul>
        </div>
    </div>
    <div class="mt-5 border p-2 rounded-[2rem]">
        <img src="{{ asset('images/bg.jpg') }}" class="h-40 w-full object-cover rounded-2xl" alt="">
    </div>
</div>
