<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$user->name}}の本棚＿統計情報
        </h2>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
            var books_data = @json($books);
        </script>
    </x-slot>
    <div class="bg-green-100">      
        <section class="text-gray-600 body-font">
            <div class="container mx-auto py-24">


                <div class="bg-yellow-50 py-10 rounded-xl shadow-xl"> 
                    <div class="flex flex-wrap mx-32 mb-20 flex-col items-center text-center bg-yellow-100 rounded-xl shadow-xl">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">本の統計情報</h1>
                        <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">基本情報</p>
                    </div>


                    <div class="grid grid-cols-2 gap-20">
                        <div class="mx-20">
                            <div class="border border-gray-500 p-6 bg-white rounded-lg shadow-xl text-center">
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">本棚登録数（全て）</h2>
                                <p class="leading-relaxed text-base">{{$books['all_register_books']}}　冊</p>
                            </div>
                        </div>

                        <div class="mx-20">
                            <div class="border border-gray-500 p-6 bg-white rounded-lg shadow-xl text-center">
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">本の冊数（全て）</h2>
                                <p class="leading-relaxed text-base">{{$books['total_books']}}　冊</p>
                            </div>
                        </div>


                        <div class="mx-20">
                            <div class="border border-gray-500 p-6 bg-white rounded-lg shadow-xl text-center">
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">本棚登録数（漫画のみ）</h2>
                                <p class="leading-relaxed text-base">{{$books['comics']}}　冊</p>
                            </div>
                        </div>


                        <div class="mx-20">
                            <div class="border border-gray-500 p-6 bg-white rounded-lg shadow-xl text-center">
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">本の冊数（漫画のみ）</h2>
                                <p class="leading-relaxed text-base">{{$books['total_comics']}}　冊</p>
                            </div>
                        </div>

                  
                        <div class="mx-20">
                             <div class="border border-gray-500 p-6 bg-white rounded-lg shadow-xl text-center">
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">本棚登録数（小説のみ）</h2>
                                <p class="leading-relaxed text-base">{{$books['novels']}}　冊</p>
                            </div>
                        </div>


                        <div class="mx-20">
                            <div class="border border-gray-500 p-6 bg-white rounded-lg shadow-xl text-center">
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">本の冊数（小説のみ）</h2>                     
                                <p class="leading-relaxed text-base">{{$books['total_novels']}}　冊</p>
                            </div>
                        </div>

                      </div>

                        <div class="grid grid-cols-2 gap-10 pt-10 mx-10">
                            <div>
                                <div class="border border-gray-500 p-6 bg-white rounded-lg shadow-xl text-center">
                                    <canvas id="info-register"></canvas>
                                    <div class="bg-lime-100 rounded-xl shadow-lg">
                                        <p id="comics-ratio"></p>
                                        <p id="novels-ratio"></p>
                                    </div>
                              </div>
                            </div>
                            <div>
                                <div class="border border-gray-500 p-6 bg-white rounded-lg shadow-xl text-center">
                                    <canvas id="info-total"></canvas>
                                    <div class="bg-lime-100 rounded-xl shadow-lg">
                                        <p id="comics-total-ratio"></p>
                                        <p id="novels-total-ratio"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                    
                    <div class="back text-center pt-10">
                        [<a class="hover:text-blue-500" href="javascript:history.back()">back</a>]
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>