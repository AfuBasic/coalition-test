<div class="space-y-1">

    @isset($label)
        <label class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endisset

    <select
        name="{{ $name }}"
        {{ $attributes->merge([
            'class' => 'w-full rounded-lg border border-gray-300 px-3 py-2 text-sm
                        focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20'
        ]) }}
    >
        @foreach($options as $value => $text)
            <option value="{{ $value }}" @selected($value == $selected)>
                {{ $text }}
            </option>
        @endforeach
    </select>

</div>