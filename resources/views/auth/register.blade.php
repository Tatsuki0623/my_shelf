<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
      <section class="text-gray-600 body-font relative mx-10 my-24 content-center">
        <div class="container bg-lime-500 px-5 py-24 mx-auto rounded-2xl shadow-2xl">
          <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">
              ユーザー登録
            </h1>
          </div>
          <form method="POST" action="{{ route('register') }}">
              @csrf
          <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <div class="grid gap-4 grid-cols-2 justify-items-center">


              <div class="p-2 w-1/2">
                <div class="relative">
                    <x-input-label for="name" :value="__('Name')" class="leading-7 text-sm text-gray-600"/>
                    <x-text-input id="name" 
                                  class="w-auto bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"  
                                  type="text" 
                                  name="name" 
                                  :value="old('name')" 
                                  required autofocus autocomplete="name" 
                                  placeholder="ユーザーネームを入力してください" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
              </div>


              <div class="p-2 w-1/2">
                <div class="relative">
                    <x-input-label for="email" :value="__('Email')" class="leading-7 text-sm text-gray-600" />
                    <x-text-input id="email" 
                                  class="w-auto bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" 
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
                                  class="w-auto bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" 
                                  type="password" 
                                  name="password" 
                                  required autocomplete="current-password"
                                  placeholder="8文字以上で入力してください" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
              </div>


              <div class="p-2 w-1/2">
                <div class="relative">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="leading-7 text-sm text-gray-600" />
                  <x-text-input id="password_confirmation" 
                                class="w-auto bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" 
                                type="password"
                                name="password_confirmation" 
                                required autocomplete="new-password" 
                                placeholder="もう一度入力してください" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
              </div>
           
            </div>
                
            <div class="text-center">
                <div class="mx-auto pt-9">
                  <x-primary-button class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mx-auto">
                        {{ __('Register') }}
                  </x-primary-button>
                </div>
            </div>
            
            <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
              <p class="pr-24">
                <div class="flex mt-4 justify-center">
                  <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                  </a>
                </div>
              </p>
              <br>MyShelf
            </div>
            </div>
          </form>
        </div>
      </section>
</x-guest-layout>
