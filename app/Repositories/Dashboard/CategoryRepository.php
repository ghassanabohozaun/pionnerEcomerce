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
        return Category::with('parentRelation')->get();
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
    public function storeCategory($request)
    {
        $category = Category::create([
            'name' => [
                'en' => $request->name['en'],
                'ar' => $request->name['ar'],
            ],
            'status' => $request->has('status') ? 1 : 0,
            'parent' => $request->parent,
        ]);

        return $category;
    }

    // update category
    public function updateCategory($request, $id)
    {
        $category = self::getCategory($id);
        $category = $category->update([
            'name' => [
                'en' => $request->name['en'],
                'ar' => $request->name['ar'],
            ],
            'status' => $request->has('status') ? 1 : 0,
            'parent' => $request->parent,
        ]);

        return $category;
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
