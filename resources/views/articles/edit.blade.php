@extends('layouts.app')

@section('title')
    {{ __('Edit Article') }}
@endsection

@section('header')
    {{ __('Edit Article') }}
@endsection

@section('content')
    <div class="w-full max-w-md mx-auto bg-white rounded-lg shadow-lg p-6">
        <form action="{{ route('articles.update', ['article' => $article]) }}" method="post" class="space-y-4">
            @csrf
            @method("PUT")

            <div>
                <label for="title" @class([
                    'text-sm font-medium block mb-2',
                    'text-gray-900' => !$errors->has('title'),
                    'text-red-600' => $errors->has('title'),
                ])>{{ __('Title') }}</label>
                <input type="text" name="title" id="title" @class([
                    'bg-gray-50 border text-gray-900 sm:text-sm rounded-lg block w-full p-2.5',
                    'border-gray-300 focus:ring-blue-500 focus:border-blue-500' => !$errors->has(
                        'title',
                    ),
                    'border-red-600 focus:ring-red-500 focus:border-red-500' => $errors->has(
                        'title',
                    ),
                ])
                    value="{{ old('title') ?? $article->title }}" required autocomplete autofocus>

                @error('title')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label for="description" @class([
                    'text-sm font-medium block mb-2',
                    'text-gray-900' => !$errors->has('content'),
                    'text-red-600' => $errors->has('content'),
                ])>{{ __('Content') }}</label>
                <textarea name="description" id="description" @class([
                    'bg-gray-50 border text-gray-900 sm:text-sm rounded-lg block w-full p-2.5',
                    'border-gray-300 focus:ring-blue-500 focus:border-blue-500' => !$errors->has(
                        'content',
                    ),
                    'border-red-600 focus:ring-red-500 focus:border-red-500' => $errors->has(
                        'content',
                    ),
                ]) required
                    autocomplete>{{ old('content') ?? $article->content }}</textarea>

                @error('description')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">{{ __('Confirm') }}</button>
            </div>
        </form>
    </div>
@endsection
