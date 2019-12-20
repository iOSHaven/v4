@if(Auth::check())

<img class="rounded-full mr-3" src="https://storage.ihvn.dev/icons/apps/ioshaven.jpg" alt="" width="30">
<h2>iOS Haven</h2>
{{-- <div>
    <strong>{{ Auth::user()->username }}</strong>
    <div class="leading-none">@admin Admin @else Member @endadmin</div>
</div> --}}

@else
    <img class="rounded-full" src="https://storage.ihvn.dev/icons/apps/ioshaven.jpg" alt="" width="70">
@endif