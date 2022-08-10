@extends('layouts.redesign', ["hide_ads" => true, "hide_footer" => true, "hide_meta" => true])
@section('content')

<form action="/providers/update" method="post">
    @csrf
    <div id="vuescope">
        <dynamic-input text="Add Provider" :start="{{ $providers->last() ? $providers->last()->id : 0 }}">
            <template v-slot:template>
                    @component('components.providerField', [ "id" => "==REPLACE=="])@endcomponent
            </template>
            <template v-slot:content>
                @foreach($providers as $provider)
                    @component('components.providerField', [ 
                        "id" => $provider->id,
                        "name" => $provider->name,
                        "twitter" => $provider->twitter,
                        "revoked" => $provider->revoked,
                        "removable" => true
                        ])@endcomponent
                @endforeach
                {{-- @component('Components.providerField', [ "id" => 1])@endcomponent
                @component('Components.providerField', [ "id" => 2])@endcomponent
                @component('Components.providerField', [ "id" => 3])@endcomponent --}}
            </template>
        </dynamic-input>
        
    </div>

    @component('components.form.submit', [
        "icon" => "fas fa-save",
        "text" => "Save"
    ])@endcomponent
</form>
@endsection


@section('footer')
<script src="{{ mix('/js/app.min.js') }}"></script>
@endsection