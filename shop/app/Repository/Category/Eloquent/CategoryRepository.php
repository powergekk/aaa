<?php
namespace App\Repository\Category\Eloquent;

use App\Models\Category;
use App\Repository\Category\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{

    /**
     * 全部分类树
     */
    public function getCategoryTree()
    {
        $categoryData = $this->_getAllCategory(); //查询所有分类
        $categoryTree = $this->_buildCategoryTree($categoryData); //读取并创建分类树
        return $categoryTree;
    }

    /**
     * 获取全部分类列表
     */
    private function _getAllCategory()
    {
        $allCategory = Category::get()->toArray();
        return $allCategory;
    }

    /**
     * 读取并创建分类树
     * @param $categoryData 全部分类
     * @param int $cat_id 顶级分类id
     * @return array|null
     */
    private function _buildCategoryTree($categoryData, $cat_id = 0)
    {
        $category = array();
        foreach ($categoryData as $k => $v) {
            if ($v['parent_id'] == $cat_id) {
                $category[] = $v;
            }
        }
        if (empty($category)) {
            return null;
        }
        foreach ($category as $k => $v) {
            $rescurTree = $this->_buildCategoryTree($categoryData, $v['id']);
            if (null != $rescurTree) {
                $category[$k]['childs'] = $rescurTree;
            }
        }

        return $category;
    }
}
