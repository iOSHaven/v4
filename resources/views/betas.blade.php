@extends('layouts.redesign', ["title" => "Betas"])


@section('content')

<section>
  <div class="container">
    <p>As of right now, you can download betas directly from Apple.</p>
    <ul class="list-disc list-inside">
      <li><a href="https://beta.apple.com/sp/betaprogram/redemption#macos" class="text-blue-500">macOS</a></li>
      <li><a href="https://beta.apple.com/sp/betaprogram/redemption#ios" class="text-blue-500">iOS</a></li>
      <li><a href="https://beta.apple.com/sp/betaprogram/redemption#ipados" class="text-blue-500">iPadOS</a></li>
      <li><a href="https://beta.apple.com/sp/betaprogram/redemption#tvos" class="text-blue-500">tvOS</a></li>
    </ul>

    <p>
      You can also download specific versions from the following website.
    </p>
    <ul class="list-disc list-inside">
      <li><a href="http://ipsw.me/otas" class="text-blue-500">IPSW Downloads</a></li>
    </ul>
  </div>
</section>

@endsection
