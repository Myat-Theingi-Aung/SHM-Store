<?php

namespace App\Contracts\Dao\Category;

interface CategoryDaoInterface
{
    /**
     * To get category list
     * @return $categoryList
     */
    public function getCategoryList();

    /**
     * To get category by id
     * @param string $id category id
     * @return Object $category category object
     */
    public function getCategoryById($id);

    /**
     * To save category
     * @param array $validated validated values from category request
     * @return Object $category saved category
     */
    public function saveCategory($validated);

    /**
     * To update category by id
     * @param array $validated validated values from category request
     * @param string $id category id
     * @return Object $category category object
     */
    public function updateCategoryById($validated, $id);

    /**
     * To delete category by id
     * @param string $id category id
     * @param string $deletedCategoryId deleted category id
     */
    public function deleteCategoryById($id);
}