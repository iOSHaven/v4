<label for="{{ $name }}" class="text-lg">{{ __($label) }}</label>
<div class="flex items-center justify-center mb-2 relative border {{ $type == 'textarea' ? 'rounded-lg' : 'rounded-full' }} ">
    <span class="absolute top-0 left-0 py-3 pl-4">
        <i class="{{ $icon }}"></i>
    </span>
    @if($type == "textarea")
        <textarea rows="5" class="w-full p-3 pl-12 rounded-lg {{ theme('bg-gray-100') }}" placeholder="{{ __($placeholder ?? $label) }}" name="{{ $name }}" id="{{ $name }}" >{{ old($name) }}</textarea>
    @else
        <input  @if($type == "password")
                    value=""  
                @else
                    value="{{ $value ?? old($name)}}" 
                @endif
                class="w-full p-3 pl-12 rounded-full {{ theme('bg-gray-100') }}" 
                type="{{ $type }}"
                @if($type == "password")
                    placeholder="* * * * * * * *" 
                @else
                    placeholder="{{ __($label) }}" 
                @endif
                name="{{ $name }}" 
                id="{{ $name }}">
    @endif
</div>



