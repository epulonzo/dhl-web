@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-200 focus:border-dhl-red focus:ring-dhl-red rounded-xl shadow-sm']) !!}>
