{{-- @can('manage-users', Auth::user()) --}}

<x-app-layout>



    <div class="bg-white p-2 mt-11 shadow-md rounded-lg">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-xl font-semibold"> </h1>


        </div>

        <section class="py-6 leading-7 text-gray-900 m bg-white sm:py-12 md:py-16">
            <div class="box-border px-4 mx-auto border-solid sm:px-6 md:px-6 lg:px-0 max-w-7xl">

                <div class="flex flex-col items-center leading-7 text-center text-gray-900 border-0 border-gray-200">
                    <h2 id="pricing"
                        class="box-border m-0 text-xl font-semibold leading-tight tracking-tight text-black border-solid sm:text-2xl md:text-3xl">
                        Choisissez le forfait qui vous convient
                    </h2>
                </div>

                <div id="pricing"
                    class="grid grid-cols-1 gap-12 mt-4 leading-7 text-gray-900 border-0 border-gray-200 sm:mt-6 sm:gap-6 md:mt-8 md:gap-0 lg:grid-cols-3">
                    @foreach ($plans as $plan)
                    <div class=" m-6 ">
                        <div class="relative flex flex-col h-full p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-900 shadow shadow-slate-950/5">
                            <div class="mb-5">
                                <div class="text-slate-900 dark:text-slate-200 font-semibold mb-1"> {{ $plan->name }}</div>
                                <div class="inline-flex items-baseline mb-2">
                                    <span class="text-slate-900 dark:text-slate-200 font-bold text-3xl"></span>
                                    <span class="text-slate-900 dark:text-slate-200 font-bold text-4xl" x-text="isAnnual ? '79' : '85'">   {{ $plan->price }} f</span>
                                    <span class="text-slate-500 font-medium">/{{ $plan->interval }}</span>
                                </div>
                                <div class="text-sm text-slate-500 mb-5">{{ $plan->description }}.</div>
                                <a class="w-full inline-flex justify-center whitespace-nowrap rounded-lg bg-indigo-500 px-3.5 py-2.5 text-sm font-medium text-white shadow-sm shadow-indigo-950/10 hover:bg-indigo-600 focus-visible:outline-none focus-visible:ring focus-visible:ring-indigo-300 dark:focus-visible:ring-slate-600 transition-colors duration-150" href="#0">
                                    <form method="POST" action="{{ route('paytech.payment') }}">
                                        @csrf
                                        <input type="hidden" name="item_name" value="{{ Auth::user()->email }}">
                                        <input type="hidden" name="item_price" value="{{ $plan->price }}">
                                        <input type="hidden" name="currency" value="XOF">
                                        <input type="hidden" name="subscription_plan_id" value="{{ $plan->id }}">
                                        <button

                                            type="submit">S'abonner</button>
                                    </form>
                                </a>
                            </div>
                            <div class="text-slate-900 dark:text-slate-200 font-medium mb-3">Includes:</div>
                            <ul class="text-slate-600 dark:text-slate-400 text-sm space-y-3 grow">
                                <li class="flex items-center">
                                    <svg class="w-3 h-3 fill-emerald-500 mr-3 shrink-0" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.28 2.28L3.989 8.575 1.695 6.28A1 1 0 00.28 7.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 2.28z" />
                                    </svg>
                                    <span>                                    Qualité vidéo et sonore
                                    </span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-3 h-3 fill-emerald-500 mr-3 shrink-0" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.28 2.28L3.989 8.575 1.695 6.28A1 1 0 00.28 7.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 2.28z" />
                                    </svg>
                                    <span> 720p (HD)</span>
                                </li>

                            </ul>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </section>

    </div>

</x-app-layout>

{{-- @endcan --}}
