<?php

namespace App\Admin\Controllers;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Models\Category;
use Encore\Admin\Widgets\Collapse;
use Encore\Admin\Widgets\Table;

class CategoryController extends Controller
{
    use ModelForm;

	public function index(){
		$categoryRepo = app('category');
		$categoryList = $categoryRepo->getCategoryTree();
		
		return Admin::content(function (Content $content) use ($categoryList) {
			$view = view('admin.category',compact('categoryList'));
			$content->header('分类管理');
			$content->description('分类列表');
            $content->body($view);
        });
	}

}
