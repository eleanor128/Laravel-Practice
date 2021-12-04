@extends('layouts.app')

@section('title')
    {{ __('Home Page') }}
@endsection

@section('header')

@endsection

@section('content')
    <div class="grid grid-cols-3 gap-4">
        @forelse ($articles as $article)
            <div @class([
                'flex flex-col p-6 shadow-md border border-gray-200 rounded-lg h-full max-h-80',
                'bg-white' => !$article->trashed(),
                'bg-gray-50' => $article->trashed(),
            ])>
                <a href="{{ route('show', ['article' => $article]) }}">
                    <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2">{{ $article->title }}
                    </h5>
                </a>
                {{-- <small>{{ $timecreated }}</small> --}}
                <div class="flex-grow relative overflow-hidden mb-3">
                    <p class="flex-grow font-normal text-gray-700">{!! nl2br($article->content) !!}</p>
                    <div
                        class="absolute top-0 left-0 bottom-0 right-0 bg-gradient-to-b from-transparent via-transparent to-white z-10">
                    </div>
                </div>

                <form>
                    {{-- @csrf --}}

                    <button @class([
                        'self-start text-white focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center',
                        'bg-blue-700 hover:bg-blue-800 focus:ring-blue-300' => !$article->trashed(),
                        'bg-blue-400 focus:ring-blue-100 cursor-default' => $article->trashed(),
                    ]) onclick="event.preventDefault();this.closest('form').submit();"
                        {{ $article->trashed() ? 'disabled' : '' }}>
                        {{ __('Read More') }}
                    </button>
                </form>
                {{-- <a href="#"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center">
                    Read more
                    <svg class="-mr-1 ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a> --}}
            </div>
        @empty
            {{-- <div class="col-span-3 bg-white p-6 shadow-md border border-gray-200 rounded-lg">
                <p class="font-normal text-gray-700 text-center">{{ __('No Record!') }}</p>
            </div> --}}
        @endforelse
    </div>

@endsection
