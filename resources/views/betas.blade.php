@extends('layouts.redesign', ["title" => "Betas"])


@section('content')

<section>
  <div class="container">
    <p>As of right now, you can download betas directly from Apple.</p>
    <ul class="list-disc list-inside">
      <li><a href="https://beta.apple.com/sp/betaprogram/redemption#macos" class="{{ theme('text-blue') }}">macOS</a></li>
      <li><a href="https://beta.apple.com/sp/betaprogram/redemption#ios" class="{{ theme('text-blue') }}">iOS</a></li>
      <li><a href="https://beta.apple.com/sp/betaprogram/redemption#ipados" class="{{ theme('text-blue') }}">iPadOS</a></li>
      <li><a href="https://beta.apple.com/sp/betaprogram/redemption#tvos" class="{{ theme('text-blue') }}">tvOS</a></li>
    </ul>

    <p>
      You can also download specific versions from the following website.
    </p>
    <ul class="list-disc list-inside">
      <li><a href="http://ipsw.me/otas" class="{{ theme('text-blue') }}">IPSW Downloads</a></li>
    </ul>
  </div>
</section>

@endsection
