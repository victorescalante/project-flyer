<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Photo;
use App\Http\Flash;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\AutorizesUsers;
use App\Http\Requests\FlyerRequest;

class FlyersController extends Controller {

    use AutorizesUsers;

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);

        parent::__construct();
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
    public function store(FlyerRequest $request)
    {
        $flyer = $this->user->publish(
          new Flyer($request->all())
        );

        flash()->success('Success!', 'Your flyer been created.');

        return redirect(flyer_path($flyer));

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
