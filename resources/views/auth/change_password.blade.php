@extends('admin.main')

@section('content')

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            Change Password
        </div>

        {!! Form::model($users, array('route'=>array('user.update', $users->id), 'method'=>'PUT')) !!}

        {!! csrf_field() !!}

        @if(Session::get('error'))
            <div class="alert alert-error">
                (!! Session::get('error') !!)
            </div>
        @endif

        @include('common.errors')

        <div class="form-group">
            {!! Form::password('password', array('placeholder'=>'New Password')) !!}
        </div>

        <div class="form-group">
            {!! Form::password('password_confirmation', array('placeholder'=>'New Password Confirmation')) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Password', array('class'=>'btn btn-primary btn-sm', 'style'=>'color: blue')) !!}
        </div>

        <!-- Validation Errors -->
        <!-- <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form> -->
    </x-auth-card>
</x-guest-layout>

@endsection