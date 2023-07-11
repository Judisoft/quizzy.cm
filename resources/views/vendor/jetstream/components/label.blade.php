@props(['value'])

<label {{ $attributes->merge(['class' => 'block py-2 font-bold text-md text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
