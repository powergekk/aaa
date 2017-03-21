<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Test;

class TestController extends Controller
{
    public function index()
    {
    	$test = Test::first();
    	$name = $test->name;
    	echo $name;
    }
}
