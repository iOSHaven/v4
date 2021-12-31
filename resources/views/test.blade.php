@php
//     {
//     "short_name": "IOS Haven",
//     "name": "IOS Haven",
//     "theme_color": "#4A90E2",
//     "background_color": "#4A90E2",
//     "display": "standalone",
//     "icons": [
//       {
//         "src": "/favicons/apple-touch-icon-60x60.png",
//         "type": "image/png",
//         "sizes": "60x60"
//       },
//       {
//         "src": "/favicons/apple-touch-icon-72x72.png",
//         "type": "image/png",
//         "sizes": "72x72"
//       },
//       {
//         "src": "/favicons/apple-touch-icon-144x144.png",
//         "type": "image/png",
//         "sizes": "144x144"
//       },
//       {
//         "src": "/favicons/apple-touch-icon-180x180.png",
//         "type": "image/png",
//         "sizes": "180x180"
//       }
//     ],
//     "start_url": "/apps?theme=dark"
//   }
    $manifest = URL::Route('manifest.generate', [
        "short_name" => "IOS Haven 2",
        "name" => "IOS Haven 3",
        "theme_color" => "#4A90E2",
        "background_color" => "#4A90E2",
        "display" => "standalone",
        "start_url" => URL::route('protocol.generate', ['protocol' => 'snapchat'])
    ]);

@endphp


<!DOCTYPE html>
<html lang="english">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="" type="" id="icon">
    <title>testing</title>



  <meta name="application-name" content="testing">
  <meta name="theme-color" content="light">
  <meta name="apple-mobile-web-app-title" content="testing title">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="light" id="status-bar-style">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lz-string/1.4.4/lz-string.min.js" integrity="sha512-qoCTmFwBtCPvFhA+WAqatSOrghwpDhFHxwAGh+cppWonXbHA09nG1z5zi4/NGnp8dUhXiVrzA6EnKgJA+fyrpw==" crossorigin="anonymous"></script>
  {{-- <meta name="apple-mobile-web-app-start_url" content="https://ioshaven.com/apps" > --}}
<link rel="manifest" href="{{ $manifest }}" id="manifest">
</head>
<body>
    <a href="{{ $manifest }}" id="manifest-link">manifest</a>
    <input id="inp" type='file'>
<p id="b64"></p>
<img id="img" height="150">

    <script>

        function readFileInput(el) {
            // return function () {
                return new Promise(function (resolve, reject) {
                    if (el.files && el.files[0]) {
                
                        var FR= new FileReader();
                        
                        FR.addEventListener("load", function(e) {
                            document.getElementById("img").src       = e.target.result;
                            document.getElementById("b64").innerHTML = e.target.result;
                            resolve(e.target.result)
                        }); 
                        
                        FR.readAsDataURL( el.files[0] );
                    } else {
                        reject()
                    }
                })
            // }
        }

        // function readFile(el) {
        //     if (el.files && el.files[0]) {
                
        //         var FR= new FileReader();
                
        //         FR.addEventListener("load", function(e) {
        //         document.getElementById("img").src       = e.target.result;
        //         document.getElementById("b64").innerHTML = e.target.result;
        //         }); 
                
        //         FR.readAsDataURL( el.files[0] );
        //     }
            
        // }

        function fileChanged() {
            readFileInput(this).then(res => {
                var manifestmeta = document.getElementById('manifest')
                var img = document.getElementById("img");
                var link = document.getElementById('manifest-link');
                var icon = document.getElementById('icon');

                console.log(manifestmeta.getAttribute('href'))
                var query = manifestmeta.getAttribute('href').split('?')[1]
                console.log(query)
                const urlParams = new URLSearchParams(query);
                for (let p of urlParams) {
                    console.log(p);
                }

                var imgtype = res.split('data:')[1].split(';')[0]
                icon.href = res
                icon.type = imgtype
                // urlParams.append('icons[0][src]', window.location.origin + '/manifest/image?compressed=' + res)
                // urlParams.append('icons[0][type]', res.split('data:')[1].split(';')[0])
                // urlParams.append('icons[0][sizes]', img.width + 'x' + img.height)

                for (let p of urlParams) {
                    console.log(p);
                }
                const myParam = urlParams.get('myParam');
                console.log(urlParams.toString());
                console.log(res)

                var newlink = window.location.origin + "/generate/manifest?" + urlParams.toString();
                link.href = newlink
                manifestmeta.href = newlink

            })
        }

document.getElementById("inp").addEventListener("change", fileChanged);
    </script>
</body>
</html>