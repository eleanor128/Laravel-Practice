@extends('layouts.app')

@section('title')
    {{ __('Create new Article') }}
@endsection

@section('header')

@endsection

@section('content')

    <div class="w-full max-w-screen-md mx-auto bg-white rounded-lg shadow-lg p-3">
        <form action="{{ route('store') }}" method="post" class="space-y-4">
            @csrf

            <div>
                <x-form-label for="title"></x-form-label>
                <x-form-input type="text" name="title" id="title" placeholder="Title" value="{{ old('title') }}" required
                    autocomplete autofocus />

                @error('title')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <x-form-label for="content"></x-form-label>

                <x-form-textarea name="content" id="content" placeholder="Content" value="{{ old('content') }}">
                </x-form-textarea>

                @error('content')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>

            {{-- 上傳圖片 --}}
            {{-- <div class="flex justify-center mt-8">
                <div class="max-w-2xl rounded-lg shadow-xl bg-gray-50">
                    <div class="m-4">
                        <label class="inline-block mb-2 text-gray-500">Upload Image</label>
                        <div class="flex items-center justify-center w-full">
                            <label
                                class="flex flex-col w-full h-32 border-4 border-blue-200 border-dashed hover:bg-gray-100 hover:border-gray-300">
                                <div class="flex flex-col items-center justify-center pt-7">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-8 h-8 text-gray-400 group-hover:text-gray-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                        Attach a file</p>
                                </div>
                                <input type="file" class="opacity-0" />
                            </label>
                        </div>
                    </div>
                    <div class="flex justify-center p-2">
                        <button class="w-full px-4 py-2 text-white bg-blue-500 rounded shadow-xl">Upload</button>
                    </div>
                </div>
            </div> --}}

            <br>
            <div class="flex justify-end">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">{{ __('Create Post') }}</button>
            </div>
        </form>
    </div>

    {{-- <form action="{{ route('store') }}" method="post" class="space-y-4">
        @csrf
        <div class="mb-3 pt-0 max-w-md mx-auto" style="width: 80%">
            <input type="text" placeholder="Title" justify-center
                class="px-3 py-4 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-base border-0 shadow outline-none focus:outline-none focus:ring w-full"
                autofocus />
            <br>
            <br>
            <input type="text" placeholder="Content"
                class="px-3 py-20 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-base border-0 shadow outline-none focus:outline-none focus:ring w-full" />
            <br>
            <br>
            <div class="flex justify-end">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">{{ __('Create Post') }}</button>
            </div>
        </div>
    </form> --}}
@endsection
