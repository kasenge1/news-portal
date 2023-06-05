{{--<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>--}}

@extends('frontend.frontend_master')
@section('main')

<div class="container">

<div class="row">
<div class="col-lg-6 col-md-12">
<div class="contact-wrpp">
<h4 class="contactAddess-title text-center">
Login </h4>

@if(session('status'))

<div class="aler alert-danger">{{session('status')}}</div>

@endif
<div role="form" class="wpcf7" id="wpcf7-f437-o1" lang="en-US" dir="ltr">
<div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul></div>
<form action="{{route('login')}}" method="POST" class="wpcf7-form init" novalidate="novalidate" data-status="init">
    @csrf
<div style="display: none;">
 
</div>

<div class="main_section">
<div class="row">
 



<div class="col-md-12 col-sm-12">
<div class="contact-title ">
Email *
</div>
<div class="contact-form">
<span class="wpcf7-form-control-wrap sub_title"><input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text @error('email') is-invalid @enderror" aria-invalid="false" placeholder="Email"></span>
    @error('password')<span class="text-danger">{{$message}}</span>@enderror
</div>
</div>


<div class="col-md-12 col-sm-12">
<div class="contact-title ">
Password *
</div>
<div class="contact-form">
<span class="wpcf7-form-control-wrap sub_title"><input type="password" name="password" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Password"></span>
    @error('password')<span class="text-danger">{{$message}}</span>@enderror
</div>
</div>


 
</div>
 
 
 
 
<div class="row">
<div class="col-md-12">
<div class="contact-btn">
<input type="submit" value="Login Now" class="wpcf7-form-control has-spinner wpcf7-submit"><span class="wpcf7-spinner"></span>
</div>
</div>
</div>
</div>
<div class="wpcf7-response-output" aria-hidden="true"></div></form></div>
</div>
</div>
</div>
</div>

@endsection
