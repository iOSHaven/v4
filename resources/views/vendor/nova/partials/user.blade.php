<dropdown-trigger class="h-9" style="min-width: 54px">
    @isset($user->email)
        <img
            width="50"
            height="50"
            src="https://secure.gravatar.com/avatar/{{ md5($user->email) }}?size=512"
            class="rounded-full w-8 h-8 mr-4"
        />
    @endisset

    <span class="text-90">
        {{ $user->username ?? $user->email ?? __('Nova User') }}
    </span>
</dropdown-trigger>

<dropdown-menu slot="menu" width="200" direction="rtl">
    <ul class="list-reset">
        <li>
            <nova-dark-theme-toggle
                label="{{ __('Dark Theme') }}"
            ></nova-dark-theme-toggle>
        </li>
        
        <li>
            <a href="/apps" class="flex justify-between items-center no-underline text-90 hover:bg-30 p-3">
                Website
                <i class="fas fa-globe"></i>
            </a>
        </li>

        <li>
            <a href="{{ route('nova.logout') }}" class="flex justify-between text-danger items-center no-underline text-90 hover:bg-30 p-3">
                {{ __('Logout') }}
                <i class="fas fa-sign-out"></i>
            </a>
        </li>
        
    </ul>
</dropdown-menu>
