@extends('layouts.app')

@section('title')
    {{ $article->title }}
@endsection

@section('header')

@endsection

@section('content')
    <div class="w-full max-w-2xl mx-auto">
        <div class="p-6 bg-white shadow-md border border-gray-200 rounded-lg w-full max-w-2xl space-y-4 mx-auto">
            {{-- @forelse ($article as $article) --}}
            <div class="flex justify-between space-x-2">
                <div>
                    {{-- <h1 class="mb-2 text-5xl text-gray-700">{{ $article }}</h1> --}}
                    <p class="text-gray-900 font-bold text-2xl tracking-tight mb-2">
                        {{ $article->title }}
                    </p>
                    {{-- <small>{{ $article->pivot->create_at }}</small> --}}
                    <p class="font-normal text-gray-700 mb-3">{{ $article->content }}</p>

                </div>
                <div class="flex space-x-2">
                    @if (!$article->trashed())
                        <div>
                            <a href="{{ route('edit', ['article' => $article]) }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-block">{{ __('Edit') }}</a>
                        </div>
                        <form action="{{ route('destroy', ['article' => $article]) }}" method="post">
                            @csrf
                            @method("DELETE")

                            <button type="submit"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center">{{ __('Delete') }}</button>
                        </form>
                    @else
                        <form action="{{ route('article.restore', ['article' => $article]) }}" method="post">
                            @csrf
                            @method("PUT")

                            <button type="submit"
                                class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 text-center">{{ __('Restore') }}</button>
                        </form>
                    @endif
                </div>
                {{-- <div class="flex space-x-2">
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

            </div> --}}
            </div>
            {{-- @empty
        @endforelse --}}
            <p>{!! nl2br($article->content) !!}</p>
        </div>
    </div>
@endsection
