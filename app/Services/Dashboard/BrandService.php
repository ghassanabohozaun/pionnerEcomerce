<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\BrandRepositroy;

class BrandService
{
    protected $brandRepositroy;

    //__construct
    public function __construct(BrandRepositroy $brandRepositroy)
    {
        $this->brandRepositroy = $brandRepositroy;
    }

    // get brand
    public function getBrand($id)
    {
        return $this->brandRepositroy->getBrand($id);
    }

    // get brands
    public function getBrands()
    {
        return $this->brandRepositroy->getBrands();
    }

    // store brand
    public function store($data)
    {
        $brand = $this->brandRepositroy->store($data);
        if (!$brand) {
            return false;
        }
        return $brand;
    }

    // update brand
    public function update($data)
    {
        $brand = $this->brandRepositroy->getBrand($data['id']);
        if (!$brand) {
            return false;
        }
        $brand = $this->brandRepositroy->update($brand, $data);
        if (!$brand) {
            return false;
        }
        return $brand;
    }

    // destroy brand
    public function destroy($id)
    {
        $brand = $this->brandRepositroy->getBrand($id);
        if (!$brand) {
            return false;
        }
        $brand = $this->brandRepositroy->destroy($brand);
        if (!$brand) {
            return false;
        }
        return $brand;
    }

    // change status
    public function changeStatus($id, $status)
    {
        $brand = $this->brandRepositroy->getBrand($id);
        if (!$brand) {
            return false;
        }
        $brand = $this->brandRepositroy->changeStatus($brand, $status);
        if (!$brand) {
            return false;
        }
        return $brand;
    }
}
