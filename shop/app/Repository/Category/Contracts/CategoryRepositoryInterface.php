<?php
namespace App\Repository\Category\Contracts;

interface CategoryRepositoryInterface
{
	/**
	 * 获取全部分类树
	 */
    public function getCategoryTree();
}