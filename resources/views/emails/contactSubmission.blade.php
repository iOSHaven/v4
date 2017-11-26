<?php $app = File::get(public_path('css/app.css'));?>
<?php $uid = File::get(public_path('css/uid.css'));?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<style media="screen">
{!! $app !!}
{!! $uid !!}
</style>
</head>
<body class=" wrapper markdown-body medium">
<h1>{{ $data['type'] }}</h1>
<p>Please make sure you contact the person back before deleting or archiving the message.</p>

@foreach($data as $key => $value)
@if($key !== 'type')
<h3>{{ $key }}:</h3>
<div class="card">
  {{ $value }}
</div>
@endif
@endforeach


<p>This contact request was sent via the official iOS Haven mail bot. If you feel like this was sent in error, then just delete the message.</p>

</body>
</html>
