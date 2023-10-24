@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium cl1 text-sm ']) }}>
    {{ $value ?? $slot }}
</label>
