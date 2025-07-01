<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CategoryRequest;
use App\Models\Category;
use App\Services\Dashboard\CategorySevice;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoriesController extends Controller
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
        $title = __('categories.categories');
        $categories = $this->categorySevice->getCategories();
        return view('dashboard.categories.index', compact('title', 'categories'));
    }

    // get all categories
    public function getAll()
    {
        $categories = $this->categorySevice->getCategories();
        return $categories;
    }
    // create
    public function create()
    {
        $title = __('categories.create_new_category');
        $parentCategoires = $this->categorySevice->getParentCategories();
        return view('dashboard.categories.create', compact('title', 'parentCategoires', 'category'));
    }

    // store
    public function store(CategoryRequest $request)
    {
        $category = $this->categorySevice->storeCategory($request);
        if (!$category) {
            flash()->error(__('general.add_error_message'));
            return redirect()->back();
        }
        flash()->success(__('general.add_success_message'));
        return redirect()->back();
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
        $category = $this->categorySevice->updateCategory($request, $id);
        if (!$category) {
            flash()->error(__('general.update_error_message'));
            return redirect()->back();
        }
        flash()->success(__('general.update_success_message'));
        return redirect()->back();
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->json()) {
            $category = $this->categorySevice->destroyCategory($request->id);
            if (!$category) {
                return response()->json(['status' => false]);
            }
            return response()->json(['status' => true]);
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
