@extends('layouts.app')

@section('content')
    <div class="w-full flex justify-center items-center">
        <div class="mt-[4.375rem] w-[80%]">
            <div class="bg-white rounded-xl shadow-xl flex justify-center items-center p-4 flex-col space-y-3">
                <h1 class="text-4xl font-bold mb-6">Welcome to Our Store!</h1>
                <img src="{{ asset('img/logo2.png') }}" alt="Logo" class="h-[500px]">
                <a href="{{ url('/dashboard') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg">
                    Enter the Store
                </a>
            </div>
        </div>
    </div>
@endsection
