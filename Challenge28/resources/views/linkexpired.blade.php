<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl text-center align-center mx-auto sm:px-6 lg:px-8">
@if (Session::has('success'))
<div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
    <p class="font-bold">Great!</p>
    <p class="text-sm">{{Session::get('success')}}.</p>
  </div>
@endif
            <p>Your Validation link has expired</p>
            <form action={{ route('resend.link', $email) }} method="POST">
                @csrf
                <x-button>
                    Send New
                </x-button>
            </form>
        </div>
    </div>
</x-guest-layout> 