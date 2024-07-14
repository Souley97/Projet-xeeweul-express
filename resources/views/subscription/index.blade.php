{{-- @can('manage-users', Auth::user()) --}}

<x-app-layout>



    <div class="bg-white p-2 shadow-md rounded-lg">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-xl font-semibold"> </h1>


        </div>

        <section class="py-6 leading-7 text-gray-900 bg-white sm:py-12 md:py-16">
            <div class="box-border px-4 mx-auto border-solid sm:px-6 md:px-6 lg:px-0 max-w-7xl">

                <div class="flex flex-col items-center leading-7 text-center text-gray-900 border-0 border-gray-200">
                    <h2 id="pricing"
                        class="box-border m-0 text-3xl font-semibold leading-tight tracking-tight text-black border-solid sm:text-4xl md:text-5xl">
                        ÉTAPE 1 SUR 3
                        Choisissez le forfait qui vous convient
                    </h2>
                </div>

                <div id="pricing"
                    class="grid grid-cols-1 gap-4 mt-4 leading-7 text-gray-900 border-0 border-gray-200 sm:mt-6 sm:gap-6 md:mt-8 md:gap-0 lg:grid-cols-3">
                    @foreach ($plans as $plan)
                        <div class="relative border-1 border-blue-600 border-solid rounded-lg z-10 flex flex-col items-center max-w-md p-4 mx-auto my-0 lg:-mr-3 sm:my-0 sm:p-6 md:my-8 md:p-8">
                            <h3 class="m-0 text-2xl font-semibold leading-tight tracking-tight text-black border-0 border-gray-200 sm:text-3xl md:text-4xl">
                                {{ $plan->name }}
                            </h3>
                            <div class="flex items-end mt-6 leading-7 text-gray-900 border-0 border-gray-200">
                                <p class="box-border m-0 text-6xl font-semibold leading-none border-solid">
                                    {{ $plan->price }} f
                                </p>
                                <p class="box-border m-0 border-solid">
                                    /{{ $plan->interval }}
                                </p>
                            </div>
                            <ul class="flex-1 p-0 mt-4 ml-5 leading-7 text-gray-900 border-0 border-gray-200">
                                <li class="inline-flex items-center w-full mb-2 ml-5 font-semibold text-left border-solid">
                                    <svg class="w-5 h-5 mr-2 font-semibold leading-7 text-blue-600 sm:h-5 sm:w-5 md:h-6 md:w-6"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7">
                                        </path>
                                    </svg>
                                </li>

                                <li class="inline-flex items-center w-full mb-2 ml-5 font-semibold text-left border-solid">
                                    <svg class="w-5 h-5 mr-2 font-semibold leading-7 text-blue-600 sm:h-5 sm:w-5 md:h-6 md:w-6"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7">
                                        </path>
                                    </svg>
                                    Qualité vidéo et sonore
                                </li>

                                <li class="inline-flex items-center block w-full mb-2 ml-5 font-semibold text-left border-solid">
                                    <svg class="w-5 h-5 mr-2 font-semibold leading-7 text-blue-600 sm:h-5 sm:w-5 md:h-6 md:w-6"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7">
                                        </path>
                                    </svg>
                                    720p (HD)
                                </li>

                            </ul>


                            <form method="POST" action="{{ route('paytech.payment') }}">
                                @csrf
                                <input type="hidden" name="item_name" value="{{ Auth::user()->email }}">
                                <input type="hidden" name="item_price" value="{{ $plan->price }}">
                                <input type="hidden" name="currency" value="XOF">
                                <input type="hidden" name="subscription_plan_id" value="{{ $plan->id }}">
                                <button
                                    class="inline-flex justify-center w-full px-4 py-3 mt-8 font-sans text-sm leading-none text-center text-blue-600 no-underline bg-transparent border border-blue-600 rounded-md cursor-pointer hover:bg-blue-700 hover:border-blue-700 hover:text-white focus-within:bg-blue-700 focus-within:border-blue-700 focus-within:text-white sm:text-base md:text-lg"
                                    type="submit">S'abonner</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </div>

</x-app-layout>

{{-- @endcan --}}
