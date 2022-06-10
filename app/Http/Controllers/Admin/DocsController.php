<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Doc\BulkDestroyDoc;
use App\Http\Requests\Admin\Doc\DestroyDoc;
use App\Http\Requests\Admin\Doc\IndexDoc;
use App\Http\Requests\Admin\Doc\StoreDoc;
use App\Http\Requests\Admin\Doc\UpdateDoc;
use App\Models\Doc;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DocsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDoc $request
     * @return array|Factory|View
     */
    public function index(IndexDoc $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Doc::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'doc_type'],

            // set columns to searchIn
            ['id', 'doc_type']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.doc.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.doc.create');

        return view('admin.doc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDoc $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDoc $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Doc
        $doc = Doc::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/docs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/docs');
    }

    /**
     * Display the specified resource.
     *
     * @param Doc $doc
     * @throws AuthorizationException
     * @return void
     */
    public function show(Doc $doc)
    {
        $this->authorize('admin.doc.show', $doc);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Doc $doc
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Doc $doc)
    {
        $this->authorize('admin.doc.edit', $doc);


        return view('admin.doc.edit', [
            'doc' => $doc,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDoc $request
     * @param Doc $doc
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDoc $request, Doc $doc)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Doc
        $doc->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/docs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/docs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDoc $request
     * @param Doc $doc
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDoc $request, Doc $doc)
    {
        $doc->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyDoc $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyDoc $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Doc::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
