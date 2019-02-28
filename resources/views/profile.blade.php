@extends('layouts.redesign')

@section('content')
<div class="container p-3">
    @admin
    <div class="border-thin-light p-3">
        You're an admin!
    </div>
    @endadmin

    <form action="/profile/color" class="border-thin-light p-3 mt-1" method="POST">
      {{ csrf_field() }}
      <div class="pb-3">
          Change navigation color.
      </div>

        <select class="p-3 col-12 mb-3" name="color" required>
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

        <button type="submit" class="btn btn-blue p-3">Save Changes.</button>
    </form>

    <form action="{{ route('logout') }}" class="border-thin-light p-3 mt-1" method="POST">
      {{ csrf_field() }}
      <div class="pb-3">
          Would you like to logout?
      </div>
        <button type="submit" class="btn btn-blue p-3">Yes, logout.</button>
    </form>
</div>
@endsection
