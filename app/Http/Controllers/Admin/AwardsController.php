<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Award\BulkDestroyAward;
use App\Http\Requests\Admin\Award\DestroyAward;
use App\Http\Requests\Admin\Award\IndexAward;
use App\Http\Requests\Admin\Award\StoreAward;
use App\Http\Requests\Admin\Award\UpdateAward;
use App\Models\Award;
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

class AwardsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAward $request
     * @return array|Factory|View
     */
    public function index(IndexAward $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Award::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'award', 'description', 'image'],

            // set columns to searchIn
            ['id', 'award', 'description', 'image']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.award.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.award.create');

        return view('admin.award.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAward $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAward $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Award
        $award = Award::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/awards'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/awards');
    }

    /**
     * Display the specified resource.
     *
     * @param Award $award
     * @throws AuthorizationException
     * @return void
     */
    public function show(Award $award)
    {
        $this->authorize('admin.award.show', $award);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Award $award
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Award $award)
    {
        $this->authorize('admin.award.edit', $award);


        return view('admin.award.edit', [
            'award' => $award,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAward $request
     * @param Award $award
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAward $request, Award $award)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Award
        $award->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/awards'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/awards');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAward $request
     * @param Award $award
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAward $request, Award $award)
    {
        $award->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAward $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAward $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Award::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
