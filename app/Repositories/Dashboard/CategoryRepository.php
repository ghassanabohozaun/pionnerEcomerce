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
        return Category::orderByDesc('created_at')->select('id', 'name', 'slug', 'status', 'parent')->get();
    }

    // store category
    public function storeCategory($request)
    {
        $category = Category::create([
            'name' => [
                'en' => $request->name['en'],
                'ar' => $request->name['ar'],
            ],
            'slug' => [
                'en' => $request->slug['en'],
                'ar' => $request->slug['ar'],
            ],
            'status' => $request->status,
            'parent' => $request->parent,
        ]);

        return $category;
    }

    // update category
    public function updateCategory($category, $id)
    {
        $category = self::getCategory($id);
        $category = $category->update([
            'name' => [
                'en' => $category->name['en'],
                'ar' => $category->name['ar'],
            ],
            'slug' => [
                'en' => $category->slug['en'],
                'ar' => $category->slug['ar'],
            ],
            'status' => $category->status,
            'parent' => $category->parent,
        ]);

        return $category;
    }

    // destroy category
    public function destroyCategory($category)
    {
        return $category->delete();
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
