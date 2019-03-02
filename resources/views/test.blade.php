@extends('layouts.redesign')
@section('content')
    <div class="container pt-3">
        <div class="row">
            <div class="autocomplete">
                <input type="text" class="p-3 autocomplete" id="test" placeholder="search" data-fetch="/apps/getJson" data-template="/tl/app" data-result="result">
                <div class="autocomplete-results" id="result"></div>
            </div>
            
        </div>
    </div>
@endsection

@section('footer')
<script>
    autocomplete('test', function (e, target, json) {
        var j = []
        json.forEach(app => {
            var a = Object.assign({}, app)
            var match = a.name.toLowerCase().indexOf(target.value.toLowerCase()) !== -1
            if (match) {
                a.name = a.name.split(new RegExp(target.value, 'i')).join('<span class="auto-complete-match"> ' + target.value + '</span>')
                j.push(a)
            }
        })
        j.sort((a,b) => {
            if (a.name < b.name)
                return -1;
            if (a.name > b.name)
                return 1;
            return 0;
        })
        return j.slice(0,10)
    })
</script>
@endsection