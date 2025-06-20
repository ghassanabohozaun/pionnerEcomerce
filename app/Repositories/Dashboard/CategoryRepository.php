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
        return Category::orderByDesc('created_at')->select('id', 'name', 'slug', 'status', 'parent')->paginate(5);
    }

    // get parent category
    public function getParentCategories(){

        return Category::orderByDesc('created_at')->whereNull('parent')->select('id','name')->get();
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
            'slug' => [
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
