<?php $app = File::get(public_path('css/app.css'));?>
<?php $bulma = File::get(public_path('css/bulma.css'));?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<style media="screen">
{!! $app !!}
{!! $bulma !!}
</style>
</head>
<body class=" wrapper markdown-body medium">
<div class="is-size-1 has-text-weight-bold mt1">{{ $data['type'] }}</div>
<div class="is-size-3 mb2">{{ $data['title']}}</div>
<hr>

@foreach($data as $key => $value)
@if($key !== 'type' && $key !== 'title')
<div class="is-size-5 has-text-weight-bold mt1">{{ $key }}:</div>
<div class="has-background-white p1">
  {{ $value }}
</div>
<hr>
@endif
@endforeach

<p class="mt2 has-background-dark has-text-white p1 mb1">This contact request was sent via the official iOS Haven mail bot. If you feel like this was sent in error, then just delete the message.</p>

</body>
</html>
