<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\BrandRepositroy;
use App\Traits\GeneralTrait;
use App\Utils\ImageManager;
use Yajra\DataTables\Facades\DataTables;
use File;
class BrandService
{
    use GeneralTrait;
    protected $brandRepositroy, $imageManager;

    //__construct
    public function __construct(BrandRepositroy $brandRepositroy, ImageManager $imageManager)
    {
        $this->brandRepositroy = $brandRepositroy;
        $this->imageManager = $imageManager;
    }

    // get brand
    public function getBrand($id)
    {
        $brand = $this->brandRepositroy->getBrand($id);
        if (!$brand) {
            return false;
        }
        return $brand;
    }

    // get brands
    public function getBrands()
    {
        return $this->brandRepositroy->getBrands();
    }

    // get all
    public function getAll()
    {
        $brands = $this->brandRepositroy->getBrands();

        $brands = DataTables::of($brands)
            ->addIndexColumn()
            ->addColumn('logo', function ($brand) {
                return view('dashboard.brands.parts.logo', compact('brand'));
            })
            ->addColumn('name', function ($brand) {
                return $brand->getTranslation('name', Lang());
            })
            ->addColumn('status', function ($brand) {
                return $brand->status == 1 ? __('general.active') : __('general.inactive');
            })
            ->addColumn('manage_status', function ($brand) {
                return view('dashboard.brands.parts.status', compact('brand'));
            })
            ->addColumn('actions', function ($brand) {
                return view('dashboard.brands.parts.actions', compact('brand'));
            })
            ->addColumn('products_count', function ($brand) {
                return $brand->products_count == 0 ? __('general.not_found') : $brand->products_count;
            })
            ->addColumn('created_at', function ($brand) {
                return $brand->created_at;
            })
            ->rawColumns(['actions', 'logo'])
            ->make(true);
        return $brands;
    }

    // store brand
    public function store($data)
    {
        // upload logo
        if ($data['logo'] != null) {
            $file_name = $this->imageManager->uploadSingleImage('/', $data['logo'], 'brands');
            $data['logo'] = $file_name;
        }

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


        //upload logo
        if (!empty($data['logo'])) {
            // remove old logo
            $this->imageManager->removeImageFromDisk('/', $brand->logo, 'brands');

            $file_name = $this->imageManager->uploadSingleImage('/', $data['logo'], 'brands');
            $data['logo'] = $file_name;
        } else {
            if ($brand->logo != null) {
                $data['logo'] = $brand->logo;
            } else {
                $data['logo'] = '';
            }
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

        // remove old logo
        $this->imageManager->removeImageFromDisk('/', $brand->logo, 'brands');

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

        $brand = $this->brandRepositroy->changeStatus($brand, $status);
        if (!$brand) {
            return false;
        }
        return $brand;
    }
}
