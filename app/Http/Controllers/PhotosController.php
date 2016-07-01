<?php

namespace App\Http\Controllers;


use App\Http\Requests\addPhotoRequest;
use App\AddPhotoToFlyer;
use App\Http\Requests;
use App\Flyer;


class PhotosController extends Controller
{

    /**
     * @param $zip
     * @param $street
     * @param addPhotoRequest $request
     * @return string
     */

    public function store($zip, $street, addPhotoRequest $request)
    {


        $flyer = Flyer::locatedAt($zip, $street);
        $photo = $request->file('photo');
        var_dump($flyer);
        var_dump($photo);
        (new AddPhotoToFlyer($flyer,$photo))->save();

        return 'Done';
    }
}