<?php

namespace App;

use Image;

Class Thumbnail {

    public function make($src,$destination,$size=280)

    {
        Image::make($src)

            ->fit($size)

            ->save($destination);
    }

}