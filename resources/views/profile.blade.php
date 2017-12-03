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

    <form action="/profile/color" class="card" method="POST">
      {{ csrf_field() }}
      <div class="field">
          Change navigation color.
      </div>

      <div class="field">
        <select class="fancy" name="color" required>
          <option value="" disabled="disabled" selected>--Select Color--</option>
          <option value="#D81159">Ruby</option>
          <option value="#8B0000">Dark Red</option>
          <option value="#FFA500">Orange</option>
          <option value="#E4572E">Flame</option>
          <option value="#FFD700">Gold</option>
          <option value="#001F54">Oxford Blue</option>
          <option value="#1E87F0">Light Blue</option>
          <option value="#06D6A0">Carribean Green</option>
          <option value="#48BF84">Ocean Green</option>
          <option value="#F51AA4">Pink</option>
          <option value="#E899DC">Plum</option>
          <option value="#673ab7">Purple</option>
          <option value="#9c27b0">Magenta</option>
          <option value="#AF7A6D">Copper</option>
          <option value="#000000">Black</option>
          <option value="#141a1d">Space</option>
        </select>
      </div>

      <div class="field">
        <button type="submit" class="big blue">Save Changes.</button>
      </div>
    </form>

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
