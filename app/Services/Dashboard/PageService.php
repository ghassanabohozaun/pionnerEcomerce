<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\PageRepository;
use App\Utils\ImageManager;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class PageService
{
    protected $pageRepository, $imageManager;

    // __construct
    public function __construct(PageRepository $pageRepository, ImageManager $imageManager)
    {
        $this->pageRepository = $pageRepository;
        $this->imageManager = $imageManager;
    }

    // get page
    public function getPage($id)
    {
        $page = $this->pageRepository->getPage($id);
        if (!$page) {
            return false;
        }
        return $page;
    }

    // get pages
    public function getPages()
    {
        return $this->pageRepository->getPages();
    }

    // get all
    public function getAll()
    {
        $pages = $this->pageRepository->getPages();
        return DataTables::of($pages)
            ->addIndexColumn()
            ->addColumn('title', function ($page) {
                return $page->getTranslation('title', Lang());
            })
            ->addColumn('details', function ($page) {
                return view('dashboard.pages.parts.details', compact('page'));
            })
            ->addColumn('status', function ($page) {
                return $page->status == 1 ? __('general.active') : __('general.inactive');
            })
            ->addColumn('photo', function ($page) {
                return view('dashboard.pages.parts.photo', compact('page'));
            })
            ->addColumn('manage_status', function ($page) {
                return view('dashboard.pages.parts.status', compact('page'));
            })
            ->addColumn('actions', function ($page) {
                return view('dashboard.pages.parts.actions', compact('page'));
            })
            ->make(true);
    }

    // store page
    public function store($data)
    {
        if (array_key_exists('photo', $data) && $data['photo'] != null) {
            $file_name = $this->imageManager->uploadSingleImage('/', $data['photo'], 'pages');
            $data['photo'] = $file_name;
        }

        $data['slug'] = [
            'ar' => slug($data['title']['ar']),
            'en' => slug($data['title']['en']),
        ];

        $page = $this->pageRepository->store($data);
        if (!$page) {
            return false;
        }
        return $page;
    }

    // update page
    public function update($data)
    {
        $page = self::getPage($data['id']);

        if (array_key_exists('photo', $data) && $data['photo'] != null) {
            //remove old photo
            $this->imageManager->removeImageFromLocal($page->photo, 'pages');
            $data['photo'] = $this->imageManager->uploadSingleImage('/', $data['photo'], 'pages');
        }

        $data['slug'] = [
            'ar' => slug($data['title']['ar']),
            'en' => slug($data['title']['en']),
        ];

        $page = $this->pageRepository->update($page, $data);
        if (!$page) {
            return false;
        }
        return $page;
    }

    //destroy page
    public function destroy($id)
    {
        $page = self::getPage($id);

        //remove old photo
        if ($page->photo != null) {
            $this->imageManager->removeImageFromLocal($page->photo, 'pages');
        }

        $page = $this->pageRepository->destroy($page);
        if (!$page) {
            return false;
        }
        return $page;
    }

    // change status
    public function changeStatus($id, $status)
    {
        $page = self::getPage($id);
        $page = $this->pageRepository->changeStatus($page, $status);
        if (!$page) {
            return false;
        }
        return $page;
    }

    // delete photo

    public function deletePhoto($id)
    {
        $page = self::getPage($id);
        //remove old photo
        if ($page->photo != null) {
            $this->imageManager->removeImageFromLocal($page->photo, 'pages');
        }

        $page = $this->pageRepository->deletePhoto($page);
        if (!$page) {
            return false;
        }
        return $page;
    }
}
