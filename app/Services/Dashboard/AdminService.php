<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\AdminReporitoy;

class AdminService
{
    /**
     * Create a new class instance.
     */

    protected $adminReporitoy;

    // __construct
    public function __construct(AdminReporitoy $adminReporitoy)
    {
        $this->adminReporitoy = $adminReporitoy;
    }

    // get Admin
    public function getAdmin($id)
    {
        $admin = $this->adminReporitoy->getAdmin($id);
        if (!$admin) {
            //return false;
            abort(404);
        }
        return $admin;
    }

    // get admins
    public function getAdmins()
    {
        return $this->adminReporitoy->getAdmins();
    }

    // store admin
    public function storeAdmin($request)
    {
        $admin = $this->adminReporitoy->storeAdmin($request);
        if (!$admin) {
            return false;
        }
        return $admin;
    }

    //update admin
    public function updateAdmin($request, $id)
    {
        $admin = $this->adminReporitoy->getAdmin($id);
        if (!$admin) {
            abort(404);
        }

        $admin = $this->updateAdmin($request, $admin);
        if (!$admin) {
            return false;
        }
        return $admin;
    }

    // destroy admin
    public function destroyAdmin($id)
    {
        $admin = $this->adminReporitoy->getAdmin($id);
        if (!$admin) {
            abort(404);
        }
        $admin = $this->adminReporitoy->destroyAdmin($admin);
        if (!$admin) {
            return false;
        }
        return $admin;
    }

    // change status admin
    public function changeStatusAdmin($id, $status)
    {
        $admin = $this->adminReporitoy->getAdmin($id);
        if (!$admin) {
            abort(404);
        }
        $admin = $this->adminReporitoy->changeStatusAdmin($admin, $status);
        if (!$admin) {
            return false;
        }
        return $admin;
    }
}
