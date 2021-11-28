@extends('layouts.app')

@section('title')
    {{ __('About_Me_Page') }}
@endsection

@section('header')

@endsection

@section('content')
    <h1>This page has a lot of About_Me_</h1>
    <div class="flex flex-wrap justify-center">
        <div class="w-6/12 sm:w-4/12 px-10">
            <img src="https://www.creative-tim.com/learning-lab/tailwind-starter-kit/img/team-2-800x800.jpg" alt="..."
                class="shadow rounded-full max-w-full h-auto align-middle border-none" />
        </div>
    </div>
@endsection
