<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminRequest;
use App\Services\Dashboard\AdminService;
use App\Services\Dashboard\RoleService;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    protected $adminService, $roleService;
    //  __construct
    public function __construct(AdminService $adminService, RoleService $roleService)
    {
        $this->adminService = $adminService;
        $this->roleService = $roleService;
    }

    //  admin index
    public function index()
    {
        $title = __('admins.admins');
        $admins = $this->adminService->getAdmins();
        return view('dashboard.admins.index', compact('title', 'admins'));
    }

    //  admin create
    public function create()
    {
        $title = __('admins.create_new_admin');
        $roles = $this->roleService->getRoles();
        return view('dashboard.admins.create', compact('title', 'roles'));
    }

    //  admin store
    public function store(AdminRequest $request)
    {
        $data = $request->only(['name', 'email', 'password', 'role_id']);
        $admin = $this->adminService->storeAdmin($request);
        if (!$admin) {
            flash()->error(__('general.add_error_message'));
            return redirect()->back();
        }

        flash()->success(__('general.add_success_message'));
        return redirect()->back();
    }

    //  admin show
    public function show(string $id)
    {
        //
    }

    //  admin edit
    public function edit(string $id)
    {
        //
    }

    //  admin update
    public function update(Request $request, string $id)
    {
        //
    }

    //  admin destroy
    public function destroy(string $id)
    {
        //
    }

    // admin change status
    public function changeStatus($id) {}
}
