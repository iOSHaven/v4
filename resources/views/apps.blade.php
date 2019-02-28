@extends('layouts.redesign')
@section('content')


    <ins class="adsbygoogle"
          style="display:block"
          data-ad-client="ca-pub-4649450952406116"
          data-ad-slot="8982247650"
          data-ad-format="auto"
          data-full-width-responsive="true"></ins>

    <div class="container">
      <div class="row">
        <div class="col-12 mt-3">
          <form action="/apps" method="get">
            <input name="q" type="text" value="{{ $q }}" class="p-3" placeholder="Search apps..." aria-label="Search apps...">
          </form>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
          @foreach($apps as $app)
          <div class="col-tablet-portrait-4  p-1">
            <div class="app p-2">
                <img class="border-rounded" src="{{ $app->icon }}" alt="{{ $app->uid }}-icon" height="60" width="60">
                <a class="content ml-3 text-dark" href="/app/{{ $app->uid }}">
                  <div class="h6 m-0"><strong>{{ $app->name }}</strong></div>
                  <div class="description mt-2">{{ $app->short }}</div>
                </a>
                @admin
                <a href="/app/edit/{{ $app->uid }}" class="text-dark">
                  <i class="fas fa-pencil fa-large"></i>
                </a>
                @endadmin
            </div>
          </div>

        @endforeach
      </div>
    </div>



    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>



 

    @if($apps->hasMorePages())
    <div id="loadmoreapps" class="text-center mt-5" style="width: 100%;">
      <button class="btn btn-dark" @click="loadMoreApps">Load more apps...</button>
    </div>
    @endif

    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-4649450952406116"
         data-ad-slot="7479897052"
         data-ad-format="auto"
         data-full-width-responsive="true"></ins>



@endsection
