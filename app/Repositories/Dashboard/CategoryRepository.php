<?php

namespace App\Repositories\Dashboard;

use App\Models\Category;

class CategoryRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    // get category
    public function getCategory($id)
    {
        return Category::find($id);
    }

    //  get categories
    public function getCategories()
    {
        return Category::withCount('products')->with('parentRelation')->latest()->get();
    }

    // get parent category
    public function getParentCategories()
    {
        return Category::orderByDesc('created_at')->whereNull('parent')->select('id', 'name')->get();
    }
    // get categories without childern
    public function getCategoreisWithoutChildren($id)
    {
        return Category::orderByDesc('created_at')->where('id', '!=', $id)->whereNull('parent')->select('id', 'name')->get();
    }

    // store category
    public function storeCategory($data)
    {
        return Category::create($data);
    }

    // update category
    public function updateCategory($category, $data)
    {
        return $category->update($data);
    }

    // destroy category
    public function destroyCategory($category)
    {
        return $category->forceDelete();
    }

    // change status category
    public function changeStatusCategory($brand, $status)
    {
        $brand = $brand->update([
            'status' => $status,
        ]);
        return $brand;
    }
}
