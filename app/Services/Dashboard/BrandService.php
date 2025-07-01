<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\BrandRepository;
use App\Traits\GeneralTrait;
use File;
use Yajra\DataTables\Facades\DataTables;

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

    // get all
    public function getAll()
    {
        $brands = $this->brandRepository->getBrands();
        $brands = DataTables::of($brands)
            ->addIndexColumn()
            ->addColumn('name', function ($brand) {
                return $brand->getTranslation('name', Lang());
            })
            ->addColumn('status', function ($brand) {
                return $brand->status == 1 ? __('general.active') : __('general.inactive');
            })
            ->addColumn('logo', function ($brand) {
                return view('dashboard.brands.parts.logo', compact('brand'));
            })
            ->addColumn('actions', function ($brand) {
                return view('dashboard.brands.parts.actions', compact('brand'));
            })
            ->addColumn('manage_status', function ($brand) {
                return view('dashboard.brands.parts.status', compact('brand'));
            })
            ->make(true);
        return $brands;
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
        $logo_path = public_path('assets/dashbaord/uploadImages/brands/') . $brand->logo;
        if (File::exists($logo_path)) {
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
