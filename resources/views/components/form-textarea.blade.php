<textarea name="{{ $name }}"
    {{ $attributes->class(['bg-gray-50 border text-gray-900 sm:text-sm rounded-lg block w-full p-2.5', 'border-gray-300 focus:ring-blue-500 focus:border-blue-500' => !$errors->has('content'), 'border-red-600 focus:ring-red-500 focus:border-red-500' => $errors->has('content')]) }}></textarea>
