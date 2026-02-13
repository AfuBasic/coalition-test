@if($link)
<a
{{$attributes->merge([
    'class' => "px-5 py-2.5 bg-orange-600 text-white text-sm rounded-lg
           shadow-sm hover:bg-orange-700 hover:shadow-md
           active:scale-95 transition-all duration-150
           focus:outline-none focus:ring-2 focus:ring-orange-400/50 cursor-pointer w-full"
    ])}} >
    {{ $title }}
</a>
@else
<button
type="submit"
{{$attributes->merge([
    'class' => "px-5 py-2.5 bg-orange-600 text-white text-sm rounded-lg
           shadow-sm hover:bg-orange-700 hover:shadow-md
           active:scale-95 transition-all duration-150
           focus:outline-none focus:ring-2 focus:ring-orange-400/50 cursor-pointer w-full"
    ])}} >
    {{ $title }}
</button>
@endif