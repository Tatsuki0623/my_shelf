<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<div class="bg-lime-50 pb-6 sm:pb-8 lg:pb-12 rounded-xl shadow-xl mx-10 my-24">
  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <head class="mb-4 flex items-center justify-between py-4 md:py-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <p class="inline-flex items-center gap-2.5 text-2xl font-bold text-black md:text-3xl" aria-label="logo"> MyShelf </p>
    </head>
    <body>
        <section class="min-h-96 relative flex flex-1 shrink-0 items-center justify-center overflow-hidden rounded-lg bg-gray-100 py-16 shadow-2xl md:py-20 xl:py-48">
            <div class="absolute inset-0 bg-lime-500 mix-blend-multiply"></div>
            <div class="relative flex flex-col items-center p-4 sm:max-w-xl">
                <p class="mb-4 text-center text-lg text-indigo-200 sm:text-xl md:mb-8"></p>
                <h1 class="mb-8 text-center text-4xl font-bold text-white sm:text-5xl md:mb-12 md:text-6xl">あなただけの本棚を</h1>
            
                <div class="flex w-full flex-col gap-2.5 sm:flex-row sm:justify-center">
                    @if (Route::has('login'))
                        <div>
                            @auth
                                <a href=" {{url('/mypage/users/')}}/{{Auth::user()->id}} " class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white shadow-2xl outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">マイページへ</a>
                            @else
                                <a href="{{ route('login') }}" class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white shadow-2xl outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">ログイン</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="inline-block rounded-lg bg-gray-200 px-8 py-3 text-center text-sm font-semibold text-gray-500 shadow-2xl outline-none ring-indigo-300 transition duration-100 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base">アカウントの作成</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
    </section>
</body>
</div>
</div>
</html>
