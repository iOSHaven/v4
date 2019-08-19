@extends('layouts.redesign', ["title" => "Cydia Impactor"])
@section('content')

<div class="container">
  <div class="text-4xl">Cydia Impactor</div>
  <p>If you want to sign your own apps for personal use you can use Cydia Impactor. However, you will be unable to share your application with other people unless you have an enterprise certificate. Some apps also require you to sign the app with a developer certificate because they require different permissions than most apps. Finally, if you use a free certificate then you will have to repeat the process every 7 days.</p>
  <p>To get started make sure you have Cydia Impactor downloaded. Then find an app that has a "Download IPA" button. Once the download is complete follow the tutorial to get a basic understanding of Cydia Impactor</p>
  <div class="h3">Downloads</div>
  <ul class="p-0 m-0">
    <li class="flex-sbc text">
      <span><i class="fab fa-apple fa-lg mr-4"></i>Mac OS X</span>
      <span><a href="https://cydia.saurik.com/api/latest/1">Download</a></span>
    </li>
    <li class="flex-sbc text">
        <span><i class="fab fa-windows fa-lg mr-4"></i>Windows</span>
        <span><a href="https://cydia.saurik.com/api/latest/2">Download</a></span>
    </li>
    <li class="flex-sbc text">
        <span><i class="fab fa-linux fa-lg mr-4"></i>Linux (32-bit)</span>
        <span><a href="https://cydia.saurik.com/api/latest/4">Download</a></span>
    </li>
    <li class="flex-sbc text">
        <span><i class="fab fa-linux fa-lg mr-4"></i>Linux (64-bit)</span>
        <span><a href="https://cydia.saurik.com/api/latest/5">Download</a></span>
    </li>
  </ul>

  <div class="h3">How to install IPA File</div>
  <ol class="p-0 m-0">
    <li class="text">Make sure you have the lastest version of iTunes installed on your computer.</li>
    <li class="text">Download the .ipa file of your choice from <a href="/apps">THIS</a> page.</li>
    <li class="text">Download Cydia Impactor from the links above.</li>
    <li class="text">Extract the Impactor ZIP file and run the program labeled 'Impactor'.</li>
    <li class="text">Connect your Apple device to your computer.</li>
    <li class="text">Open Cydia Impactor and drag the .ipa file you downloaded into the window.</li>
    <div class="bg-cornsilk p-3">
      NOTE: Make sure your Apple device is recognized by your computer.
    </div>
    <li class="text">Enter your Apple ID email into the field provided and click 'OK'.</li>
    <li class="text">Enter your Apple ID password into the field provided and click 'OK'.</li>

    

    <li class="text">Wait for Cydia Impactor to sign the .ipa file.</li>
    <div class="bg-cornsilk p-3">
      NOTE: Your Apple ID is only used to generate a certificate from Apple and is not saved anywhere.
    </div>
    
    <li class="text">Unlock your device and go to Settings > General > Profiles and Device Management.</li>
    <div class="bg-cornsilk p-3">
      NOTE: Wait to proceed until you see the 'Complete' message at the bottom of the program.
    </div>
    <li class="text">Open the profile with your Apple ID email on it and click 'Trust' "your@email.com."</li>
    <li class="text">Go back to your homescreen and lauch the app or game that you downloaded.</li>
    
  </ol>
</div>

<!-- <div class="wrapper markdown">

    <h1>
        Cydia Impactor
    </h1>
    <div>
      <p>Welcome to the Cydia Impactor page. Here you can find downloads to the program, how to install a IPA file, and as well as find solutions to your errors. Cydia Impactor allows you to install unsigned apps on your iDevice and all you need is a computer also all the apps with the "Download .ipa" in our IPA library need to be sideloaded with Cydia Impactor so please keep that in mind. Below you can find all the downloads for Cydia Impactor, please install for your correct OS.</p>
    </div>


  <h2>Downloads</h2>
    <ul class="fancy">
      <li>
        <span><i class="fab fa-apple mr5"></i>Mac OS X</span>
        <span><a href="https://cydia.saurik.com/api/latest/1">Download</a></span>
      </li>
      <li>
        <span><i class="fab fa-windows mr5"></i>Windows</span>
        <span><a href="https://cydia.saurik.com/api/latest/2">Download</a></span>
      </li>
      <li>
        <span><i class="fab fa-linux mr5"></i>Linux (32-bit)</span>
        <span><a href="https://cydia.saurik.com/api/latest/4">Download</a></span>
      </li>
      <li>
        <span><i class="fab fa-linux mr5"></i>Linux (64-bit)</span>
        <span><a href="https://cydia.saurik.com/api/latest/5">Download</a></span>
      </li>
    </ul>


    <h2 class="mt2">Install an .IPA File</h2>

    <ol class="neat">
      <li>Make sure you have the lastest version of iTunes installed on your computer.</li>
      <li>Download the .ipa file of your choice from <a href="/apps">THIS</a> page.</li>
      <li>Download Cydia Impactor from the links above.</li>
      <li>Extract the Impactor ZIP file and run the program labeled 'Impactor'.</li>
      <li>Connect your iDevice to your computer.</li>
      <div class="note">
        NOTE: Make sure your iDevice is recognized by your computer.
      </div>
      <li>Open Cydia Impactor and drag the .ipa file you downloaded into the GUI window.</li>
      <li>Enter your Apple ID email into the field provided and click 'OK'.</li>
      <li>Enter your Apple ID password into the field provided and click 'OK'.</li>

      <div class="note">
        NOTE: Your Apple ID is only used to generate a certificate from Apple and is not saved anywhere.
      </div>

      <li>Wait for Cydia Impactor to sign the .ipa file.</li>
      <div class="note">
        NOTE: Wait to proceed until you see the 'Complete' message at the bottom of the program.
      </div>
      <li>Unlock your device and go to Settings > General > Profiles and Device Management.</li>
      <li>Open the profile with your Apple ID email on it and click 'Trust' "your@email.com."</li>
      <li>Go back to your homescreen and lauch the app or game that you downloaded.</li>
      <p>You will have to repeat this process every 7 days unless you get a codesigning service.</p>
    </ol>



    <h2 class="mt2">Common Errors</h2>
    <ul class="fancy">
      <li>
        <a href="http://www.iphonehacks.com/2017/07/fix-provision-cpp168-error-cydia-impactor-yalu-jailbreak-10-2.html">
          Provision.cpp:168
        </a>
      </li>

      <li>
        <a href="http://www.iblogapple.com/2017/03/12/fix-provision-cpp-71-error-cydia-impactor/">
          Provision.cpp:71
        </a>
      </li>

      <li>
        <a href="http://www.iblogapple.com/2017/03/12/fix-provision-cpp-71-error-cydia-impactor/">
          Provision.cpp:81
        </a>
      </li>

      <li>
        <a href="https://techjourney.net/cydia-impactor-provision-cpp6268150-error/">
          Provision.cpp:62.
        </a>
      </li>

      <li>
        <a href="https://techjourney.net/cydia-impactor-provision-cpp6268150-error/">
          Provision.cpp:68
        </a>
      </li>

      <li>
        <a href="https://techjourney.net/cydia-impactor-provision-cpp6268150-error/">
          Provision.cpp:150
        </a>
      </li>

      <li>
        <a href="https://yalujailbreak.net/lockdown-cpp-57-error/">
          Lockdown.cpp:57
        </a>
      </li>

      <li>
        <a href="http://www.iblogapple.com/2017/03/11/cydia-impactor-update-fix-http-win-cpp-158-error/">
          Http-win.cpp:158
        </a>
      </li>

    </ul>
</div> -->
@endsection
