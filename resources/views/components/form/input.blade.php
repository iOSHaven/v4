<label for="{{ $name }}" class="text-lg">{{ __($label) }}</label>
<div class="flex items-center justify-center mb-2 relative border rounded-full">
    <span class="absolute top-0 left-0 py-3 pl-5">
        <i class="{{ $icon }}"></i>
    </span>
    <input  @if($type == "password")
                value=""  
            @else
                value="{{ old($name)}}" 
            @endif
            class="w-full p-3 pl-12 rounded-full" 
            type="{{ $type }}"
            @if($type == "password")
                placeholder="* * * * * * * *" 
            @else
                placeholder="{{ __($label) }}" 
            @endif
            name="{{ $name }}" 
            id="{{ $name }}">
</div>