@extends('layouts.app')

@section('title')
    {{ __('Show Article') }}
@endsection

@section('header')

@endsection

@section('content')
    <h1>This page shows article</h1>

    <div class="p-6 bg-white shadow-md border border-gray-200 rounded-lg w-full max-w-2xl space-y-4 mx-auto">
        <div class="flex justify-between space-x-2">
            <div>
                <h1 class="mb-2 text-5xl text-gray-700">{{ $article }}</h1>
                <p class="text-gray-900 font-bold text-2xl tracking-tight mb-2"><b>{{ $article->title }}</b></p>
                <p class="font-normal text-gray-700 mb-3">{{ $article->content }}</p>
            </div>
            <div class="flex space-x-2">
                <div>
                    <a href="{{ route('edit', ['article' => $article->id]) }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-block">{{ __('Edit') }}</a>
                </div>

                <form action="{{ route('destroy', ['article' => $article->id]) }}" method="post">
                    @csrf
                    @method("DELETE")

                    <button type="submit"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center">{{ __('Delete') }}</button>
                </form>

            </div>
        </div>
        {{-- <p>{!! $course->description !!}</p> --}}
    </div>
@endsection
