
@php
use Jenssegers\Agent\Agent;
$agent = new Agent();

@endphp

<div class="advert flex justify-center p-4">
    
        @if($agent->isPhone())
            <div class="inline-block relative" style="height: 50px; width: 320px;">
                    <div class="overflow-hidden absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center -z-1 {{ theme('bg-gray-100') }}">
                        <strong>Why did you block ads?</strong>
                    </div>
                    <script type="text/javascript">
                        atOptions = {
                        'key' : 'c6f7fb5590f1872014e017017e09223a',
                        'format' : 'iframe',
                        'height' : 50,
                        'width' : 320,
                        'params' : {}
                        };
                        document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.bcloudhost.com/c6f7fb5590f1872014e017017e09223a/invoke.js"></scr' + 'ipt>');
                    </script>
            </div>
        @else
            <div class="inline-block relative" style="height: 90px; width: 728px;">
                    <div class="overflow-hidden absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center -z-1 {{ theme('bg-gray-100') }}">
                        <strong>Why did you block ads?</strong>
                    </div>
                    <script type="text/javascript">
                        atOptions = {
                            'key' : 'b0aaf1369bd04f516bdcb92a6e540e73',
                            'format' : 'iframe',
                            'height' : 90,
                            'width' : 728,
                            'params' : {}
                        };
                        document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.bcloudhost.com/b0aaf1369bd04f516bdcb92a6e540e73/invoke.js"></scr' + 'ipt>');
                    </script>
            </div>
            
        
        @endif
</div>
