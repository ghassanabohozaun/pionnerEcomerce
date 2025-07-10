<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\SettingRepository;
use App\Utils\ImageManager;

class SettingService
{
    protected $settingRepository, $imageManager;
    //
    public function __construct(SettingRepository $settingRepository, ImageManager $imageManager)
    {
        $this->settingRepository = $settingRepository;
        $this->imageManager = $imageManager;
    }

    // get setting
    public function getSetting($id)
    {
        $setting = $this->settingRepository->getSetting($id);
        if (!$setting) {
            return false;
        }
        return $setting;
    }

    // update settings
    public function updateSettings($data, $id)
    {
        $setting = self::getSetting($id);

        if (array_key_exists('logo', $data) && $data['logo'] != null) {
            $this->imageManager->removeImageFromLocal($setting->logo , 'settings');
            $data['logo'] = $this->imageManager->uploadSingleImage('/', $data['logo'], 'settings');
        }

        if (array_key_exists('favicon', $data) && $data['favicon'] != null) {
            $this->imageManager->removeImageFromLocal($setting->favicon,'settings');
            $data['favicon'] = $this->imageManager->uploadSingleImage('/', $data['favicon'], 'settings');
        }

        $setting = $this->settingRepository->updateSettings($setting, $data);
        if (!$setting) {
            return false;
        }
        return $setting;
    }
}
