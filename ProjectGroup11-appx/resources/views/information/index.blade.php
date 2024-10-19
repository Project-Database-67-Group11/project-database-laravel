@extends('layouts.app')

@section('content')
    <div class="w-full flex justify-center items-center">
        <div class="mt-[4.375rem] w-[80%] grid grid-cols-4 gap-6">
            <div class="bg-white shadow-md p-10 rounded-xl ">
              <div>
                {{ Auth::user()->name }}
              </div>
            </div>
            
            <div class="bg-white shadow-md col-span-3 rounded-xl p-10 space-y-10">
                
            </div>
        </div>
@endsection