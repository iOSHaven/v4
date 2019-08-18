@extends('layouts.redesign', ["hide_nav" => true, "hide_ads" => true, "hide_back" => true])

@section("head")

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/framework7-icons@2.3.1/css/framework7-icons.min.css">
@endsection

@section('page')

<div class="mx-auto w-full text-center mt-12 px-3" style="max-width: 700px">
    @if(theme() == "light")
        <img src="/SVG/sun.svg" alt="" class="w-full mx-auto" style="max-width: 200px">
    @else
        <img src="/SVG/moon.svg" alt="" class="w-full mx-auto" style="max-width: 200px">
    @endif
    

    <p>
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
            width="90" height="90"
            viewBox="0 0 172 172"
            class="mx-auto my-10"
            style=" fill:#000000;"><g transform=""><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="{{ theme() == 'light' ? '#000000' : '#ffffff'}}"><path d="M85.91042,5.73333c-1.48937,0.02375 -2.91104,0.62615 -3.96406,1.67969l-22.93333,22.93333c-1.49776,1.43802 -2.1011,3.57339 -1.57732,5.58258c0.52378,2.00919 2.09283,3.57824 4.10202,4.10202c2.00919,0.52378 4.14456,-0.07955 5.58258,-1.57731l13.14636,-13.14635v72.15938c-0.02924,2.06765 1.05709,3.99087 2.843,5.03322c1.78592,1.04236 3.99474,1.04236 5.78066,0c1.78592,-1.04236 2.87225,-2.96558 2.843,-5.03322v-72.15937l13.14636,13.14635c1.43802,1.49776 3.57339,2.1011 5.58258,1.57731c2.00919,-0.52378 3.57824,-2.09283 4.10202,-4.10202c0.52378,-2.00919 -0.07955,-4.14456 -1.57732,-5.58258l-22.93333,-22.93333c-1.09692,-1.09743 -2.59177,-1.70345 -4.14323,-1.67969zM51.6,51.6c-9.43116,0 -17.2,7.76884 -17.2,17.2v68.8c0,9.43116 7.76884,17.2 17.2,17.2h68.8c9.43116,0 17.2,-7.76884 17.2,-17.2v-68.8c0,-9.43116 -7.76884,-17.2 -17.2,-17.2h-11.46667v11.46667h11.46667c3.23951,0 5.73333,2.49383 5.73333,5.73333v68.8c0,3.23951 -2.49383,5.73333 -5.73333,5.73333h-68.8c-3.23951,0 -5.73333,-2.49383 -5.73333,-5.73333v-68.8c0,-3.23951 2.49383,-5.73333 5.73333,-5.73333h11.46667v-11.46667z"></path></g><path d="" fill="none"></path></g></g></svg>
    </p>
    <p>
        Press the save button add IOS Haven to your home page!
    </p>
    <div class="my-10">
        @if(theme() == "light")
            <a href="/install?theme=dark" class='hide-webapp mx-1 mb-16 flex items-center justify-center font-bold rounded-full text-sm px-8 py-5 bg-black-light text-white-light'>
                <i class="fas fa-moon-stars mr-3 fa-4x"></i>
                {{-- INSTALL --}}
            </a>
        @else
            <a href="/install?theme=light" class='hide-webapp mx-1 mb-16 flex items-center justify-center font-bold rounded-full text-sm px-8 py-5 text-black-light bg-yellow-light'>
                <i class="fas fa-sun mr-3 fa-4x"></i>
                {{-- INSTALL --}}
            </a>
        @endif
    </div>
</div>

@endsection