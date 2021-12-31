<?php

namespace App\Lib\ParseDownExtensions;

class HavenMarkup extends \Parsedown implements IHavenMarkup
{
    use HasRegistry;

    public function __construct()
    {
        $this->setScope($this);
        $this->register(YoutubeVideo::class);
    }

    public function inlineYouTubeEmbed($excerpt)
    {
        return $this->youtubeVideo->inlineYoutubeEmbed($excerpt);
    }
}
