<?php

namespace App\Services\Category;

use App\Contracts\Dao\Category\CategoryDaoInterface;
use App\Contracts\Services\Category\CategoryServiceInterface;

class CategoryService implements CategoryServiceInterface
{
    /**
     * category dao
     */
    private $categoryDao;
    
    /**
     * Class Constructor
     * @param CategoryDaoInterface
     * @return
     */
    public function __construct(CategoryDaoInterface $categoryDao)
    {
        $this->categoryDao = $categoryDao;
    }

    /**
     * To get category list
     * @return $categoryList
     */
    public function getCategoryList()
    {
        return $this->categoryDao->getCategoryList();
    }

    /**
     * To get category by id
     * @param string $id category id
     * @return Object $category category object
     */
    public function getCategoryById($id)
    {   
        return $this->categoryDao->getCategoryById($id);
    }

    /**
     * To save category
     * @param array $validated validated values from category request
     * @return Object $category saved category
     */
    public function saveCategory($validated)
    {
        return $this->categoryDao->saveCategory($validated);
    }

    /**
     * To update category by id
     * @param array $validated validated values from category request
     * @param string $id category id
     * @return Object $category category object
     */
    public function updateCategoryById($validated, $id)
    {
        return $this->categoryDao->updateCategoryById($validated, $id);
    }

    /**
     * To delete category by id
     * @param string $id category id
     * @param string $deletedCategoryId deleted category id
     */
    public function deleteCategoryById($id)
    {
        return $this->categoryDao->deleteCategoryById($id);
    }
}