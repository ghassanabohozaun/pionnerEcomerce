<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\Website\PageService;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    protected $pageService;
    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    // get dynamic page
    public function getDaymamicPage(string $slug)
    {
        if (!$slug) {
            flash()->error('general.page_not_found');
            return redirect()->route('website.index');
        }

        $page = $this->pageService->getDaynamincPage($slug);

        if (!$page) {
            flash()->error(__('general.page_not_found'));
            return redirect()->route('website.index');
            // abort(404);
        }

        return view('website.dynamic-page', compact('page'));
    }
}
