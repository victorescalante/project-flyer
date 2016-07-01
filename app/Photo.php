<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;


class Photo extends Model {

    protected $table = 'flyer_photos';

    protected $file;


    protected $fillable = [
        'path',
        'name',
        'thumbnail_path'
    ];

    public function flyer()

    {

        return $this->belongsTo('App\Flyer');

    }



    public function baseDir()

    {
        return 'images/photos';

    }

    public function setNameAttribute($name)

    {

        $this->attributes['name'] = $name;

        $this->path = $this->baseDir().'/'.$name;

        $this->thumbnail_path = $this->baseDir().'/tn-'.$name;

    }


}
