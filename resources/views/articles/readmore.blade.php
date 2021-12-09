@extends('layouts.app')

@section('title')
    {{ $article->title }}
@endsection

@section('header')

@endsection

@section('content')
    <div class="w-full max-w-2xl mx-auto">
        <div class="p-6 bg-white shadow-md border border-gray-200 rounded-lg w-full max-w-2xl space-y-4 mx-auto">

            <div class="flex justify-between space-x-2">
                <div>
                    <p class="text-gray-900 font-bold text-2xl tracking-tight mb-2">
                        {{ $article->title }}
                    </p>
                    <p class="font-normal text-gray-700 mb-3">{{ $article->content }}</p>
                </div>
            </div>

            <p>{!! nl2br($article->content) !!}</p>
        </div>
    </div>
@endsection
