@props(['message' => ''])
<div {{ $attributes->merge(['class' => 'flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50']) }} role="alert">
    <div>
        <span class="font-medium">{{$message}}.</span>
    </div>
</div>
