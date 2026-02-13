<div {{ $attributes->merge([
    'class' => "border rounded-lg px-4 py-3 text-sm shadow-sm {$classes}"
]) }}>
    {{ $slot }}
</div>