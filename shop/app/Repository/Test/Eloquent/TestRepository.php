<?php
namespace App\Repository\Test\Eloquent;

use App\Models\Test;
use App\Repository\Test\Contracts\TestRepositoryInterface;

class TestRepository implements TestRepositoryInterface
{
	public function getOneTest(){
		$testOne = Test::first();
		return $testOne;
	}
}
