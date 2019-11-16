<?php $sakura = File::get(public_path('css/app.css'));?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<style media="screen">
{!! $sakura !!}
</style>
</head>
<body>

<h1>{{ $data['title'] }}</h1>

<hr>


  @foreach($data as $key => $value)
    @if($key !== 'type' && $key !== 'title')
      <div>
        <div>{{ $key }}:</div>
        <div>{{ $value }}</div>
      </div>

      <hr>
    @endif
  @endforeach

  <div>
    <div>Username</div>
    <div>{{ Auth::user()->username }}</div>
  </div><hr>
  <div>
    <div>User Email</div>
    <div>{{ Auth::user()->email }}</div>
  </div><hr>


<p class="mt2 has-background-dark has-text-white p1 mb1">This contact request was sent via the official iOS Haven mail bot. If you feel like this was sent in error, then just delete the message.</p>

</body>
</html>
