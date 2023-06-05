{{--<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
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
Register </h4>
<div role="form" class="wpcf7" id="wpcf7-f437-o1" lang="en-US" dir="ltr">
<div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul></div>
<form action="{{route('register')}}" method="POST" class="wpcf7-form init"  novalidate="novalidate" data-status="init">
    @csrf
<div style="display: none;">
 
</div>

<div class="main_section">
<div class="row">
<div class="col-md-12 col-sm-12">
<div class="contact-title ">
Name *
</div>
<div class="contact-form">
<span class="wpcf7-form-control-wrap sub_title"><input type="text" name="name" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Name"></span>
<x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
</div>
</div>



<div class="col-md-12 col-sm-12">
<div class="contact-title ">
Email *
</div>
<div class="contact-form">
<span class="wpcf7-form-control-wrap sub_title"><input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Email"></span>
<x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
</div>
</div>


<div class="col-md-12 col-sm-12">
<div class="contact-title ">
Password *
</div>
<div class="contact-form">
<span class="wpcf7-form-control-wrap sub_title"><input type="password" name="password" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Password"></span><x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
</div>
</div>


<div class="col-md-12 col-sm-12">
<div class="contact-title ">
Confirm Password *
</div>
<div class="contact-form">
<span class="wpcf7-form-control-wrap sub_title"><input type="password" name="password_confirmation" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Confirm Password"></span>
<x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
</div>
</div>
</div>
 
 
 
 
<div class="row">
<div class="col-md-12">
<div class="contact-btn">
<input type="submit" value="Register Now" class="wpcf7-form-control has-spinner wpcf7-submit"><span class="wpcf7-spinner"></span>
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
