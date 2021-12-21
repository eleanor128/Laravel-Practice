<form method="{{ $method }}" {{ $attributes }}>
    @csrf



    {{ $slot }} {{-- 留空格塞東西 --}}
</form>
