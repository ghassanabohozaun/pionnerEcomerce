<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\BrandRepositroy;
use App\Traits\GeneralTrait;
use App\Utils\ImageManager;
use Yajra\DataTables\Facades\DataTables;
use File;
use Illuminate\Support\Facades\Cache;

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
        if (array_key_exists('logo', $data) && $data['logo'] != null) {
            $file_name = $this->imageManager->uploadSingleImage('/', $data['logo'], 'brands');
            $data['logo'] = $file_name;
        }

        //slug
        $data['slug'] = [
            'ar' => slug($data['name']['ar']),
            'en' => slug($data['name']['en']),
        ];

        $brand = $this->brandRepositroy->store($data);
        if (!$brand) {
            return false;
        }
        $this->brandCache();
        return $brand;
    }

    // update brand
    public function update($data)
    {
        $brand = $this->brandRepositroy->getBrand($data['id']);

        if (array_key_exists('logo', $data) && $data['logo'] != null) {
            // remove old logo
            $this->imageManager->removeImageFromLocal($brand->logo, 'brands');
            // upload logo
            $data['logo'] = $this->imageManager->uploadSingleImage('/', $data['logo'], 'brands');
        }

        //slug
        $data['slug'] = [
            'ar' => slug($data['name']['ar']),
            'en' => slug($data['name']['en']),
        ];

        $brand = $this->brandRepositroy->update($brand, $data);
        if (!$brand) {
            return false;
        }
        return $brand;
    }

    // destroy brand
    public function destroy($id)
    {
        $brand = self::getBrand($id);

        // remove old logo
        if (!empty($brand->logo)) {
            $this->imageManager->removeImageFromLocal($brand->logo, 'brands');
        }

        $brand = $this->brandRepositroy->destroy($brand);
        if (!$brand) {
            return false;
        }

        $this->brandCache();
        return $brand;
    }

    // change status
    public function changeStatus($id, $status)
    {
        $brand = self::getBrand($id);

        $brand = $this->brandRepositroy->changeStatus($brand, $status);
        if (!$brand) {
            return false;
        }
        return $brand;
    }

    // brand cache
    public function brandCache()
    {
        Cache::forget('brands_count');
    }
}
