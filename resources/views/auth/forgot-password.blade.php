<x-guest-layout>
      <section class="text-gray-600 body-font relative mx-9 my-24 conten-center">
        <div class="container bg-lime-500 px-5 py-24 mx-auto rounded-2xl shadow-2xl">
          <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">
              パスワードの再設定
            </h1>
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            <x-auth-session-status class="mb-4" :status="session('status')" />
          </div>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <div class="flex flex-wrap content-center -m-2">
              <div class="p-2 w-1/2">
                <div class="relative">
                  <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" 
                                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"  
                                  type="email" name="email" 
                                  :value="old('email')" 
                                  required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>
                </div>
              </div>
              <div class="pt-10 mx-auto">
                    <x-primary-button class="right-0 flex text-white bg-indigo-500 border-0 mx-auto focus:outline-none hover:bg-indigo-600 rounded text-lg">
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
            </div>
            </div>
            </div>
          </form>
          <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center ">
                  <br>MyShelf
          </div>
        </div>
      </section>
</x-guest-layout>
