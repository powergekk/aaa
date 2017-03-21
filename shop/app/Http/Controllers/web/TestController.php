<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index()
    {
    	//实例化仓库
    	$testRepo = app('test');

    	$testOne = $testRepo->getOneTest();
    	echo $testOne->name;
    }
}
