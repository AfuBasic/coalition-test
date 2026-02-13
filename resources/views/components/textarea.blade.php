<div class="space-y-2">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <textarea id="{{ $name }}" name="{{ $name }}" {{ $attributes->merge([
        'class' => 'block p-2 w-full border rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm resize-none'
    ]) }} rows="3">{{ old($name) }}</textarea>
    @error($name)
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>