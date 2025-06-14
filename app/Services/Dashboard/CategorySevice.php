<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\CategoryRepository;

class CategorySevice
{
    protected $categoryRepository;
    // __construct
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    // get category
    public function getCategory($id)
    {
        $category = $this->categoryRepository->getCategory($id);
        if (!$category) {
            return false;
        }

        return $category;
    }

    //  get categories
    public function getCategories()
    {
        return $this->categoryRepository->getCategories();
    }

    // store category
    public function storeCategory($request)
    {
        $category = $this->categoryRepository->storeCategory($request);
        if (!$category) {
            return false;
        }

        return $category;
    }

    // update category
    public function updateCategory($request, $id)
    {
        $category = $this->categoryRepository->getCategory($id);
        if (!$category) {
            return false;
        }
        $category = $this->categoryRepository->updateCategory($category, $id);
        if (!$category) {
            return false;
        }
        return $category;
    }

    // destroy category
    public function destroyCategory($id)
    {
        $category = $this->categoryRepository->getCategory($id);
        if (!$category) {
            return false;
        }
        $category = $this->categoryRepository->destroyCategory($category);
        if (!$category) {
            return false;
        }
        return $category;
    }

    // change status category
    public function changeStatusCategory($id , $status) {

        $category = $this->categoryRepository->getCategory($id);
        if (!$category) {
            return false;
        }

          $category = $this->categoryRepository->changeStatusCategory($category , $status);
           if (!$category) {
            return false;
        }
        return $category;
    }
}
