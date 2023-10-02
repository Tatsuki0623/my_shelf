<x-guest-layout>
      <section class="text-gray-600 body-font relative mx-9 my-24 conten-center">
        <div class="container bg-lime-500 px-5 py-24 mx-auto rounded-2xl shadow-2xl">
          <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">
              ログイン
            </h1>
          </div>
          <form method="POST" action="{{ route('login') }}">
              @csrf
          <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <div class="flex flex-wrap content-center -m-2">
              <div class="p-2 w-1/2">
                <div class="relative">
                    <x-input-label for="email" :value="__('Email')" class="leading-7 text-sm text-gray-600" />
                    <x-text-input id="email" 
                                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" 
                                  type="email" 
                                  name="email" 
                                  :value="old('email')" 
                                  required autofocus autocomplete="username" 
                                  placeholder="xxxxx@sample" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
              </div>
              <div class="p-2 w-1/2">
                <div class="relative">
                    <x-input-label for="password" :value="__('Password')" class="leading-7 text-sm text-gray-600" />
                    <x-text-input id="password" 
                                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" 
                                  type="password" 
                                  name="password" 
                                  required autocomplete="current-password"
                                  placeholder="8文字以上で入力してください" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
              </div>
              <div class="pt-10 mx-auto">
                <div class="pt-2 mx-auto">
                    <x-primary-button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg text-center item-center">
                      ログイン
                    </x-primary-button>
                </div>
                <div class="block pt-2">
                  <label for="remember_me" class="inline-flex">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">
                      {{ __('Remember me') }}
                    </span>
                  </label>
                </div>
              </div>
              <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center ">
                  <p class="pr-24">
                    @if (Route::has('password.request'))
                      <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 px-10" href="{{ route('password.request') }}">
                          パスワードをお忘れですか？
                      </a>

                      <a href="{{ route('register') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        アカウント作成
                      </a>
                    @endif

                    </p>
                  <br>MyShelf
                </p>
                </div>
              </div>
            </div>
          </form>
        </div>
      </section>
</x-guest-layout>