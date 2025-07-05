<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\CategoryRepository;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;

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
        $categories = $this->categoryRepository->getCategories();

        $DataTables = DataTables::of($categories)
            ->addIndexColumn()
            ->addColumn('name', function ($category) {
                return $category->getTranslation('name', Lang());
            })
            ->addColumn('parentRelation', function ($category) {
                return empty($category->parentRelation->name) ? '-' : $category->parentRelation->name;
            })
            ->addColumn('status', function ($category) {
                return $category->status == 1 ? __('general.active') : __('general.inactive');
            })
            ->addColumn('manage_status', function ($category) {
                return view('dashboard.categories.parts.status', compact('category'));
            })
            ->addColumn('products_count', function ($category) {
                return $category->products_count == 0 ? __('general.not_found') : $category->products_count;
            })
            ->addColumn('actions', function ($category) {
                return view('dashboard.categories.parts.actions', compact('category'));
            })
            ->make(true);

        return $DataTables;
    }

    //  get parent categories
    public function getParentCategories()
    {
        return $this->categoryRepository->getParentCategories();
    }
    // get categories without childern

    public function getCategoreisWithoutChildren($id)
    {
        $category = $this->categoryRepository->getCategoreisWithoutChildren($id);
        return $category;
    }
    // store category
    public function storeCategory($request)
    {
        $category = $this->categoryRepository->storeCategory($request);
        if (!$category) {
            return false;
        }

        $this->categoryCache();
        return $category;
    }

    // update category
    public function updateCategory($request, $id)
    {
        $category = $this->categoryRepository->getCategory($id);

        $category = $this->categoryRepository->updateCategory($request, $id);
        if (!$category) {
            return false;
        }
        return $category;
    }

    // destroy category
    public function destroyCategory($id)
    {
        $category = $this->categoryRepository->getCategory($id);

        $category = $this->categoryRepository->destroyCategory($category);
        if (!$category) {
            return false;
        }
        $this->categoryCache();
        return $category;
    }

    // change status category
    public function changeStatusCategory($id, $status)
    {
        $category = $this->categoryRepository->getCategory($id);

        $category = $this->categoryRepository->changeStatusCategory($category, $status);
        if (!$category) {
            return false;
        }
        return $category;
    }

    // category cache
    public function categoryCache()
    {
        Cache::forget('categories_count');
    }
}
