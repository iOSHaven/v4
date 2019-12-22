<div class="flex items-center flex-wrap -mt-2">
    {{-- <div class="-mt-2 flex items-center flex-wrap"> --}}
        @if($app->ipas && $ipa = $app->ipas->where('working', true)->first())
        @component('components.ipaOrItmsButton', [
            "model" => $ipa, 
            "class" => "mt-2 mr-2"])
        @endcomponent
    @endif

    @if($app->itms && $itms = $app->itms->first())
        @component('components.ipaOrItmsButton', [
            "model" => $itms, 
            "class" => "mt-2 mr-2"])
        @endcomponent
    @endif

    @admin
        @component('components.button', [
            "href"=> "/nova/resources/apps/$app->id", 
            "bg" => "red", 
            "color" => "white",
            "class" => "mt-2"
            ])
                EDIT 
        @endcomponent
    @endadmin
    {{-- </div> --}}
</div>




{{-- @if($app->unsigned)

@endif
@if($app->signed)
@component('components.button', ["href"=> "/install/$app->uid", "bg" => "blue", "color" => "white"])
GET @endcomponent
@endif
@admin
@component('components.button', ["href"=> "/app/edit/$app->uid", "bg" => "red", "color" => "white"])
EDIT @endcomponent
@endadmin --}}