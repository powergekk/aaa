<?php

namespace App\Admin\Controllers;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Models\Category;

class CategoryController extends Controller
{
    use ModelForm;

	public function index(){
		return Admin::content(function (Content $content) {

			$content->header('header');

            $content->description('description');

            $content->body($this->grid());
        });
	}


	/**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Category::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->cat_name('分类名');
            $grid->parent_id('父分类');
            $grid->sort_order('排序');
            $grid->is_show('显示/隐藏');

        });
    }

}
