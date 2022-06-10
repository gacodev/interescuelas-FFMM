<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Force\BulkDestroyForce;
use App\Http\Requests\Admin\Force\DestroyForce;
use App\Http\Requests\Admin\Force\IndexForce;
use App\Http\Requests\Admin\Force\StoreForce;
use App\Http\Requests\Admin\Force\UpdateForce;
use App\Models\Force;
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

class ForcesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexForce $request
     * @return array|Factory|View
     */
    public function index(IndexForce $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Force::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'force', 'description', 'image'],

            // set columns to searchIn
            ['id', 'force', 'description', 'image']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.force.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.force.create');

        return view('admin.force.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreForce $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreForce $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Force
        $force = Force::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/forces'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/forces');
    }

    /**
     * Display the specified resource.
     *
     * @param Force $force
     * @throws AuthorizationException
     * @return void
     */
    public function show(Force $force)
    {
        $this->authorize('admin.force.show', $force);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Force $force
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Force $force)
    {
        $this->authorize('admin.force.edit', $force);


        return view('admin.force.edit', [
            'force' => $force,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateForce $request
     * @param Force $force
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateForce $request, Force $force)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Force
        $force->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/forces'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/forces');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyForce $request
     * @param Force $force
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyForce $request, Force $force)
    {
        $force->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyForce $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyForce $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Force::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
