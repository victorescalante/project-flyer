<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Created by PhpStorm.
 * User: victor.escalante
 * Date: 27/06/16
 * Time: 5:21 PM
 */
class FlyersControllerTest extends TestCase {

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_one()
    {
        $this->visit('flyers/create');
    }

}