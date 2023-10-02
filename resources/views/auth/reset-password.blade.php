<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
      <section class="text-gray-600 body-font relative mx-9 my-24 conten-center">
        <div class="container bg-lime-500 px-5 py-24 mx-auto rounded-2xl shadow-2xl">
          <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">
              パスワードの再設定
            </h1>
          </div>
          <form method="POST" action="{{ route('password.store') }}">
              @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">


            <div class="lg:w-1/2 md:w-2/3 mx-auto">
              <div class="flex flex-wrap content-center -m-2">
                <div class="basis-5/6 p-2 w-1/2">
                  <div class="relative">
                      <x-input-label for="email" :value="__('Email')" />
                      <x-text-input id="email" 
                             class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"  
                             type="email" 
                             name="email" 
                             :value="old('email', $request->email)" 
                             required autofocus autocomplete="username" />
                      <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>
                </div>

                <div class="p-2 w-1/2">
                  <div class="relative">
                      <x-input-label for="password" :value="__('Password')" />
                      <x-text-input id="password" 
                             class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                             type="password" 
                             name="password" 
                             required autocomplete="new-password" />
                      <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  </div>
                </div>

                <div class="p-2 w-1/2">
                  <div class="relative">
                      <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                      <x-text-input id="password_confirmation" 
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    type="password"
                                    name="password_confirmation" 
                                    required autocomplete="new-password" />
                      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                  </div>
                </div>
                
                <div class="contents content-center">
                    <x-primary-button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                      {{ __('Reset Password') }}
                    </x-primary-button>
                </div>
                </div>
                <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center ">
                    <br>MyShelf
                </div>
              </div>
            </form>
          </div>
        </section>
</x-guest-layout>