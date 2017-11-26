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
<body class=" wrapper markdown-body medium pb9">
<h1>Thank you!</h1>
<p>You're feedback is taken seriously. We will review your submission and get back to you within 3-5 business days. The following information is what we received in our email.</p>
<br>
<a href="/" class="fill--blue p1">Return to ioshaven.co</a>
<br>
<br>
@foreach($data as $key => $value)
@if($key !== 'type')
<h3>{{ $key }}:</h3>
<div class="card">
  {{ $value }}
</div>
@endif
@endforeach



</body>
</html>
