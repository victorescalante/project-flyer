<?php

namespace App\Http\Controllers\Traits;

use App\Flyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


/**
 * Created by PhpStorm.
 * User: victor.escalante
 * Date: 29/06/16
 * Time: 1:48 PM
 */
trait AutorizesUsers {

    protected function userCreatedFlyer(Request $request)
    {

        

    }

    protected function unauthorized(Request $request)
    {
        if ($request->ajax())
        {

            return Response::json([
                'error' => 'User not Authorized',
                'code' => 403
            ], 403);
        }

        flash('No way.');

        return redirect('/');
    }
    
    
    
}