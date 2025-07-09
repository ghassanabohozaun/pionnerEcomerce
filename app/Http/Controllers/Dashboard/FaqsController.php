<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\FaqRequest;
use App\Services\Dashboard\FaqService;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    protected $faqService;
    // __construct
    public function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }

    // index
    public function index()
    {
        $title = __('faqs.faqs');
        return view('dashboard.faqs.index', compact('title'));
    }

    // get all
    public function getAll()
    {
        return $this->faqService->getAll();
    }
    // create
    public function create()
    {
        $title = __('faqs.create_new_faq');
        return view('dashboard.faqs.create', compact('title'));
    }

    // store
    public function store(FaqRequest $request)
    {
        $data = $request->only(['question', 'answer', 'status']);
        $faq = $this->faqService->storeFaq($data);
        if (!$faq) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $faq], 201);
    }

    //  show
    public function show(string $id)
    {
        //
    }

    // edit
    public function edit(string $id)
    {
        $title = __('faqs.update_faq');

        $faq = $this->faqService->getFaq($id);

        if (!$faq) {
            flash()->error(__('general.no_record_found'));
            return redirect()->route('dashboard.faqs.edit');
        }

        return view('dashboard.faqs.edit', compact('title', 'faq'));
    }

    // update
    public function update(FaqRequest $request, string $id)
    {
        $data = $request->only(['id', 'question', 'answer', 'status']);
        $faq = $this->faqService->updateFaq($data);
        if (!$faq) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 200);
    }

    //  destroy
    public function destroy(string $id)
    {
        $faq = $this->faqService->destroyFaq($id);
        if (!$faq) {
            return response()->json(['status' => false]);
        }
        return response()->json(['status' => true]);
    }

    //  change status
    public function changeStatus(Request $request)
    {
        if ($request->json()) {
            $faq = $this->faqService->changeStatus($request->id, $request->statusSwitch);
            if (!$faq) {
                return response()->json(['status' => false]);
            }
            return response()->json(['status' => true]);
        }
    }
}
