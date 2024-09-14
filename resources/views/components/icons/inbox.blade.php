@props(['size' => 5, 'color' => 'currentColor', 'class' => ''])
<svg xmlns="http://www.w3.org/2000/svg" {{ $attributes->merge(['class' => 'h-' . $size . ' w-' . $size . ' ' . $class]) }} viewBox="0 0 20 20" fill="{{ $color }}">
    <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd" />
</svg>
