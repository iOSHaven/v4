@extends('layouts.redesign', ["hide_footer" => true])



@section('content')

<div class="fixed flex items-center justify-start relative rounded-full {{ theme('bg-gray-100') }}">
    <i class="far fa-search absolute p-3"></i>
    <input type="text" placeholder="Search" class="border-0 w-full pl-10 py-2 bg-transparent">
</div>


<h1 class="mt-3">Search results</h1>
<ul class="border-t {{ theme('border-gray-200') }}">
    {{-- Search result --}}
    <li href="" class="flex items-center justify-between py-2 border-b {{ theme('border-gray-200') }}">
        <a href="#page" class="flex items-center justify-start overflow-hidden">
            <img class="rounded-lg mr-3" src="https://ioshavenco.s3.us-east-2.amazonaws.com/icons/Zombie+Rollerz.jpg" alt="" height="25" width="25">
            <span class="truncate">Some app title that is longer than most</span>
        </a>
        <div class="flex flex-grow">
            @component('components.button', ["href"=> "#", "bg" => "gray-100", "color" => "blue"]) IPA @endcomponent
            @component('components.button', ["href"=> "#", "bg" => "blue", "color" => "white"]) GET @endcomponent
        </div>
    </li>

    {{-- Search result --}}
    <li href="" class="flex items-center justify-between py-2 border-b {{ theme('border-gray-200') }}">
        <a href="#page" class="flex items-center justify-start overflow-hidden">
            <img class="rounded-lg mr-3" src="https://ioshavenco.s3.us-east-2.amazonaws.com/icons/Zombie+Rollerz.jpg" alt="" height="25" width="25">
            <span class="truncate">Some app title that not quite as long</span>
        </a>
        <div class="flex flex-grow">
            @component('components.button', ["href"=> "#", "bg" => "gray-100", "color" => "blue"]) IPA @endcomponent
            @component('components.button', ["href"=> "#", "bg" => "blue", "color" => "white"]) GET @endcomponent
        </div>
    </li>
    
</ul>

<h1 class="mt-3">Categories</h1>
<div class="flex">
        <div class="pr-1 w-1/2">
            {{-- CARD --}}
            <div class="rounded-lg bg-blue-light px-3 py-2 inline-block w-full text-white-light mt-3">
                <div class="flex items-center justify-between pb-3">
                    <i class="fas fa-layer-group"></i>
                    <i class="fal fa-star"></i>
                </div>
                <div class="pt-4">
                    All apps
                </div>
            </div>
            {{-- CARD --}}
            <div class="rounded-lg bg-blue-light px-3 py-2 inline-block w-full text-white-light mt-3">
                <div class="flex items-center justify-between pb-3">
                    <i class="fas fa-bell"></i>
                    <i class="fal fa-star"></i>
                </div>
                <div class="pt-4">
                    Updated
                </div>
            </div>
            

            {{-- CARD --}}
            <div class="rounded-lg bg-blue-light px-3 py-2 inline-block w-full text-white-light mt-3">
                <div class="flex items-center justify-between pb-3">
                    <i class="fas fa-gift"></i>
                    <i class="fal fa-star"></i>
                </div>
                <div class="pt-4">
                    Free
                </div>
            </div>
        </div>
        <div class="pl-1 w-1/2">
            {{-- CARD --}}
            <div class="rounded-lg bg-blue-light px-3 py-2 inline-block w-full text-white-light mt-3">
                <div class="flex items-center justify-between pb-3">
                    <i class="fas fa-rocket"></i>
                    <i class="fal fa-star"></i>
                </div>
                <div class="pt-4">
                    All games
                </div>
            </div>
            {{-- CARD --}}
            <div class="rounded-lg bg-blue-light px-3 py-2 inline-block w-full text-white-light mt-3">
                <div class="flex items-center justify-between pb-3">
                    <i class="fas fa-user-secret"></i>
                    <i class="fal fa-star"></i>
                </div>
                <div class="pt-4">
                    Hacks
                </div>
            </div>
        </div>
</div>

<h1 class="mt-3">Providers</h1>
<div class="flex">
        <div class="pr-1 w-1/2">
            {{-- CARD --}}
            <div class="rounded-lg bg-blue-light px-3 py-2 inline-block w-full text-white-light mt-3">
                <div class="flex items-center justify-between pb-3">
                    <i class="fab fa-app-store-ios"></i>
                    <i class="fal fa-star"></i>
                </div>
                <div class="pt-4">
                    App Valley
                </div>
            </div>

            {{-- CARD --}}
            <div class="rounded-lg bg-blue-light px-3 py-2 inline-block w-full text-white-light mt-3">
                <div class="flex items-center justify-between pb-3">
                    <i class="fab fa-app-store-ios"></i>
                    <i class="fal fa-star"></i>
                </div>
                <div class="pt-4">
                    Tweakbox
                </div>
            </div>
        </div>
        <div class="pl-1 w-1/2">
            {{-- CARD --}}
            <div class="rounded-lg bg-blue-light px-3 py-2 inline-block w-full text-white-light mt-3">
                <div class="flex items-center justify-between pb-3">
                    <i class="fab fa-app-store-ios"></i>
                    <i class="fal fa-star"></i>
                </div>
                <div class="pt-4">
                    IOS Gods
                </div>
            </div>

        </div>
</div>



@endsection