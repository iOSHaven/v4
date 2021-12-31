<?php

namespace App\Lib\ParseDownExtensions;

use Parsedown;

class YoutubeVideo extends HavenMarkupBase implements IHavenMarkup
{

    function __construct($scope)
    {
        $scope->InlineTypes['{'][]= 'YoutubeEmbed';
        $scope->inlineMarkerList .= '{';
    }

    public function inlineYoutubeEmbed($excerpt)
    {
        return $this->matchSingleTwig("youtube", $excerpt, function ($value) {
            return array(
                'name' => 'div',
                'attributes' => array(
                    'class' => 'video-wrapper'
                ),
                'handler' => 'element',
                'text' => array(
                    'text' => '',
                    'name' => 'iframe',
                    'attributes' => array(
                        'src' => "https://www.youtube.com/embed/$value",
                        'title' => 'YouTube video player',
                        'frameborder'=>'0',
                        'allow'=> implode(';', [
                            "accelerometer",
                            "autoplay",
                            "clipboard-write",
                            "encrypted-media",
                            "gyroscope",
                            "picture-in-picture"
                        ]),
                        "allowfullscreen" => true
                    ),
                )
            );
        });
//        dd([$excerpt]);
//        if (preg_match('/^{%(\s+)?youtube(\s+)?(\w+)(\s+)?%}/', $excerpt['text'], $matches))
//        {
//            dd([$matches, $excerpt]);
//            return array(
//
//                // How many characters to advance the Parsedown's
//                // cursor after being done processing this tag.
//                'extent' => strlen($matches[0]),
//                'element' => array(
//                    'name' => 'span',
//                    'text' => $matches[2],
//                    'attributes' => array(
//                        'style' => 'color: ' . $matches[1],
//                    ),
//                ),
//
//            );
//        }
    }

}