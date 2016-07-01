<?php

namespace App;

use Image;
use Illuminate\Http\UploadedFile;


class AddPhotoToFlyer {

    protected $flyer;
    protected $file;
    protected $thumbnail;

    public function __construct(Flyer $flyer, UploadedFile $file, Thumbnail $thumbnail = null)
    {
        $this->flyer = $flyer;
        $this->file = $file;
        $this->thumbnail = $thumbnail ?: new Thumbnail;
    }


    public function save()
    {
        var_dump("entro al save2");
        //dd($this->flyer);
        //attach the photo to the flyer
        $photo = $this->flyer->addPhoto($this->makePhoto());

        //Move the photo to the image folder
        $this->file->move($photo->baseDir(), $photo->name);

        //generate a thumbnail
        $this->thumbnail->make($photo->path,$photo->thumbnail_path);
    }

    protected function makePhoto()
    {
        return new Photo([
           'name' =>  $this->makeFileName()
        ]);
    }


    protected function makeFileName()
    {
        $name = sha1(
            time().$this->file->getClientOriginalName()
        );

        $extension = $this->file->getClientOriginalExtension();

        return "{$name}.{$extension}";
    }

}