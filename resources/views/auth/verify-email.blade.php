<x-guest-layout>
      <section class="text-gray-600 body-font relative mx-9 my-24 conten-center">
        <div class="container bg-cyan-200 px-5 py-24 mx-auto rounded-2xl shadow-2xl">
          <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-700">
              あなた宛てにメールを送りました
            </h1>
            <p>
              メールボックスへと移動し送られたメールのリンク先へ移動してください
            </p>
            <div class="mb-4 text-sm text-gray-600">
              {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif
          </div>
      <div class="mt-4 flex items-center">
        <div class="basis-1/2 mx-auto">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div class="justify-items-center">
                <button type="submit" class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">
                    {{ __('Resend Verification Email') }}
                <button>
            </div>
        </form>
        </div>
        <div class="basis-1/2 mx-auto">
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">
                {{ __('Log Out') }}
            </button>
        </form>
      </div>
    </div>
      </section>
</x-guest-layout>