<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\SliderRepository;
use App\Utils\ImageManager;
use Yajra\DataTables\Facades\DataTables;

class SliderService
{
    protected $sliderRepository, $imageManager;
    //__construct
    public function __construct(SliderRepository $sliderRepository, ImageManager $imageManager)
    {
        $this->sliderRepository = $sliderRepository;
        $this->imageManager = $imageManager;
    }

    // get slider
    public function getSlider($id)
    {
        $slider = $this->sliderRepository->getSlider($id);
        if (!$slider) {
            return false;
        }
        return $slider;
    }

    // get sliders
    public function getSliders()
    {
        return $this->sliderRepository->getSliders();
    }

    //get all
    public function getAll()
    {
        $sliders = self::getSliders();
        return DataTables::of($sliders)
            ->addIndexColumn()
            ->addColumn('title', function ($slider) {
                return $slider->getTranslation('title', Lang());
            })
            ->addColumn('details', function ($slider) {
                return $slider->getTranslation('details', Lang());
            })
            ->addColumn('status', function ($slider) {
                return $slider->status == 1 ? __('general.active') : __('general.inactive');
            })
            ->addColumn('details_status', function ($slider) {
                return $slider->details_status == 1 ? __('general.active') : __('general.inactive');
            })
            ->addColumn('button_status', function ($slider) {
                return $slider->button_status == 1 ? __('general.active') : __('general.inactive');
            })
            ->addColumn('actions', function ($slider) {
                return view('dashboard.sliders.parts.actions', compact('slider'));
            })
            ->addColumn('photo', function ($slider) {
                return view('dashboard.sliders.parts.photo', compact('slider'));
            })
            ->addColumn('manage_status', function ($slider) {
                return view('dashboard.sliders.parts.status', compact('slider'));
            })
            ->make(true);
    }
    // create slider
    public function create($data)
    {
        if (array_key_exists('photo', $data) && $data['photo'] != null) {
            $photo_name = $this->imageManager->uploadSingleImage('/', $data['photo'], 'sliders');
            $data['photo'] = $photo_name;
        }

        $slider = $this->sliderRepository->create($data);
        if (!$slider) {
            return false;
        }
        return $slider;
    }

    // update slider
    public function update($data)
    {
        $slider = self::getSlider($data['id']);

        if (array_key_exists('photo', $data) && $data['photo'] != null) {
            $this->imageManager->removeImageFromLocal($slider->photo, 'sliders');
            $photo_name = $this->imageManager->uploadSingleImage('/', $data['photo'], 'sliders');
            $data['photo'] = $photo_name;
        }

        $slider = $this->sliderRepository->update($slider, $data);
        if (!$slider) {
            return false;
        }
        return $slider;
    }

    // destroy slider
    public function destroy($id)
    {
        $slider = self::getSlider($id);

        if (!empty($slider->photo)) {
            $this->imageManager->removeImageFromLocal($slider->photo, 'sliders');
        }

        $slider = $this->sliderRepository->destroy($slider);
        if (!$slider) {
            return false;
        }
        return $slider;
    }

    // update change status slider
    public function changeStatus($id, $status)
    {
        $slider = self::getSlider($id);
        $slider = $this->sliderRepository->changeStatus($slider, $status);
        if (!$slider) {
            return false;
        }
        return $slider;
    }
}
