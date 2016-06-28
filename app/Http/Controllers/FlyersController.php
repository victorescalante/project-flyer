<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Photo;
use Illuminate\Http\UploadedFile;
use App\Http\Flash;
use Illuminate\Http\Request;

use App\Http\Requests\FlyerRequest;

class FlyersController extends Controller {

    public function __construct()
    {
        $this->middleware('auth',['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flyers.create');
    }

    /**
     * @param FlyerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FlyerRequest $request, Flash $flash)
    {
        // persist the Flyer

        Flyer::create($request->all());

        flash()->success('Success!', 'Your flyer been created.');

        return redirect()->back();

    }

    /**
     * @param $zip
     * @param $street
     * @return mixed
     */
    public function show($zip, $street)
    {

        $flyer = Flyer::locatedAt($zip, $street);

        //dd(compact('flyer'));
        return view('flyers.show', compact('flyer'));

    }

    /**
     * @param $zip
     * @param $street
     * @param Request $request
     * @return string
     */

    public function addPhoto($zip, $street,Request $request)
    {

        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png,bmp'
        ]);
        
        var_dump($request);

        $photo = $this->makePhoto($request->file('photo'));

        Flyer::locatedAt($zip, $street)->addPhoto($photo);

        return 'Done';
    }

    protected function makePhoto(UploadedFile $file){

        var_dump($file);

        return  Photo::named($file->getClientOriginalName())
            ->move($file);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
