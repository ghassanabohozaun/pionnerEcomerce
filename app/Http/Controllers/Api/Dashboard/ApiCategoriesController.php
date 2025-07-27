<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CategoryRequest;
use App\Services\Dashboard\CategorySevice;
use Illuminate\Http\Request;

class ApiCategoriesController extends Controller
{
    protected $categorySevice;
    // __construct
    public function __construct(CategorySevice $categorySevice)
    {
        $this->categorySevice = $categorySevice;
    }

    // index
    public function index()
    {
        $parentCategoires = $this->categorySevice->getParentCategories();
        $categories = $this->categorySevice->getCategories();
        return response()->json([
            'data' => $categories,
            'parentCategoires' => $parentCategoires,
            'message' => 'success',
        ]);
    }

    // create
    public function create()
    {
        $title = __('categories.create_new_category');
        $parentCategoires = $this->categorySevice->getParentCategories();
        return view('dashboard.categories.create', compact('title', 'parentCategoires'));
    }

    // store
    public function store(CategoryRequest $request)
    {
        $data = $request->only(['name', 'status', 'parent', 'icon']);

        $category = $this->categorySevice->storeCategory($data);
        if (!$category) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 201);
    }

    // show
    public function show(string $id) {}

    // edit
    public function edit(string $id)
    {
        $title = __('categories.update_category');

        $category = $this->categorySevice->getCategory($id);
        if (!$category) {
            flash()->error(__('general.no_record_found'));
            return redirect()->route('dashboard.categories.index');
        }

        $parentCategoires = $this->categorySevice->getCategoreisWithoutChildren($id);

        return view('dashboard.categories.edit', compact('title', 'category', 'parentCategoires'));
    }

    // update
    public function update(CategoryRequest $request, string $id)
    {
        $data = $request->only(['id', 'name', 'status', 'parent', 'icon']);
        $category = $this->categorySevice->updateCategory($data);

        if (!$category) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 200);
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->json()) {
            $category = $this->categorySevice->destroyCategory($request->id);
            if (!$category) {
                return response()->json(['status' => false], 500);
            }
            return response()->json(['status' => true], 200);
        }
    }
    // change status
    public function changeStatus(Request $request)
    {
        if ($request->json()) {
            $category = $this->categorySevice->changeStatusCategory($request->id, $request->statusSwitch);
            if (!$category) {
                return response()->json(['status' => false]);
            }
            return response()->json(['status' => true]);
        }
    }
}
