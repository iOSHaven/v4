@extends('layouts.default')

@section('content')
<div class="wrapper mobile">
    @admin
    <div class="card">
      <div class="field">
        You're an admin!
      </div>
    </div>
    @endadmin
    <form action="{{ route('logout') }}" class="card" method="POST">
      {{ csrf_field() }}
      <div class="field">
          Would you like to logout?
      </div>
      <div class="field">
        <button type="submit" class="big blue">Yes, logout.</button>
      </div>
    </form>
</div>
@endsection
