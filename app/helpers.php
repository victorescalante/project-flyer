<?php

/**
 * @param null $title
 * @param null $message
 * @return \Illuminate\Foundation\Application|mixed
 */
function flash($title = null, $message = null)
{
    $flash = app('App\Http\Flash');

    if (func_num_args() == 0)
    {

        return $flash;
    }

    return $flash->info($title, $message);
}

/**
 * @param Flyer $flyer
 * @return string
 */
function flyer_path(\App\Flyer $flyer)
{
    return $flyer->zip.'/'.str_replace(' ', '-',$flyer->street);
} 