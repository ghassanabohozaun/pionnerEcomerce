<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\BrandRepository;
use App\Traits\GeneralTrait;
use File;
class BrandService
{
    use GeneralTrait;
    protected $brandRepository;
    //__construct
    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    // get brand
    public function getBrand($id)
    {
        $brand = $this->brandRepository->getBrand($id);
        if (!$brand) {
            return false;
        }
        return $brand;
    }

    // get brands
    public function getBrands()
    {
        return $this->brandRepository->getBrands();
    }

    // store brand
    public function storeBrand($request)
    {
        if ($request->has('logo')) {
            $file_name = $request->file('logo');
            $public_path = public_path('assets/dashbaord/uploadImages/brands');
            $logo = $this->saveImage($file_name, $public_path);
        }

        $brand = $this->brandRepository->storeBrand($request, $logo);

        if (!$brand) {
            return false;
        }
        return $brand;
    }

    // update brand
    public function updateBrand($request, $id)
    {
        $brand = $this->brandRepository->getBrand($id);
        if (!$brand) {
            return false;
        }

        if ($request->has('logo')) {
            if (!empty($brand->logo)) {
                $old_logo = public_path('assets/dashbaord/uploadImages/brands/') . $brand->logo;
                if (File::exists($old_logo)) {
                    File::delete($old_logo);
                }
                $file_name = $request->file('logo');
                $public_path = public_path('assets/dashbaord/uploadImages/brands');
                $logo = $this->saveImage($file_name, $public_path);
            } else {
                $file_name = $request->file('logo');
                $public_path = public_path('assets/dashbaord/uploadImages/brands');
                $logo = $this->saveImage($file_name, $public_path);
            }
        } else {
            if (!empty($brand->logo)) {
                $logo = $brand->logo;
            } else {
                $logo = '';
            }
        }

        $brand = $this->brandRepository->updateBrand($request, $id, $logo);
        if (!$brand) {
            return false;
        }
        return $brand;
    }

    // destory brand
    public function destroyBrand($id)
    {
        $brand = $this->brandRepository->getBrand($id);
        if (!$brand) {
            return false;
        }

        // delete old logo
        $logo_path = public_path('assets/dashbaord/uploadImages/brands/').$brand->logo;
         if(File::exists($logo_path)){
            File::delete($logo_path);
         }


        $brand = $this->brandRepository->destroyBrand($brand);
        if (!$brand) {
            return false;
        }
        return $brand;
    }

    // brand change status
    public function changeStatusBrand($id, $status)
    {
        $brand = $this->brandRepository->getBrand($id);
        if (!$brand) {
            return false;
        }
        $brand = $this->brandRepository->changeStatusBrand($brand, $status);
        if (!$brand) {
            return false;
        }
        return $brand;
    }
}
