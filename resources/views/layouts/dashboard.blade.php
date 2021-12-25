<!DOCTYPE html>
<html lang="english">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard</title>

  <!-- === F O N T S === -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:900i|Amiko:400" rel="stylesheet" />

  <!-- === S T Y L E S === -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" rel="stylesheet">
  <link href="{{ mix('/css/redesign.min.css') }}" rel="stylesheet">


</head>
<body class="bg-gray-100 h-screen">
  <main id="dashboard">
    
    <div id="content" v-show="!loading">
        <div class="flex items-center justify-center overflow-hidden h-screen">
            <aside class="bg-black-light h-full overflow-auto text-white-light border-r border-gray-900">
                <ul style="width: 250px">
                  <li class="p-3 border-b text-center border-b border-gray-800">
                    <img class="rounded-full border mb-3 mx-auto border-b border-gray-800" src="/avatar/zeb" alt=""
                      width="70">
                    <strong>{{ Auth::user()->username }}</strong>
                    <div class="leading-none">@admin Admin @else Member @endadmin</div>
                  </li>
                  <a href="#apps" class="p-3 flex items-center bg-black-light justify-between border-b border-gray-800">
                    <span>
                        <i class="fas fa-info-circle mr-2"></i>
                        Info
                    </span>
                    <i class="fas fa-circle text-blue-500"></i>
                  </a>
                  <a href="#apps" class="p-3 flex items-center bg-black-light justify-between border-b border-gray-800">
                    <span>
                        <i class="fas fa-magnet mr-2"></i>
                        Mirrors
                    </span>
                  </a>
              </ul>
            </aside>
            <div class="h-full overflow-auto flex-grow text-white-light relative" style="background-color: rgba(255,255,255,0.1)">
                <nav class="absolute left-0 right-0 flex items-center justify-start bg-white-light text-black-light">
                    <a href="#apps" class="p-3 flex items-center justify-between border-blue-dark border-b-4 bg-gray-100 -mb-1">
                      <span>
                          <i class="fas fa-layer-group mr-2"></i>
                          Apps
                      </span>
                    </a>
                    <a href="#apps" class="p-3 flex items-center justify-between border-blue-dark">
                      <span>
                          <i class="fab fa-app-store-ios mr-2"></i>
                          Providers
                      </span>
                    </a>
                </nav>
                <div class="h-full " style="padding-top: 48px">
                    <div class="p-3 text-gray-600">
                        @yield('content')
                    </div>
                    
                </div>
                
            </div>
            
        </div>
    </div>
      
  </main>
  

  {{-- <script src="{{ asset('/js/app.js') }}"></script> --}}
  {{-- <script src="{{ asset('/js/dashboard.js') }}"></script> --}}
</body>
</html>