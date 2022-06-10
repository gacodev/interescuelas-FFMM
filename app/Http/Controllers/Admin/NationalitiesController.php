<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Nationality\BulkDestroyNationality;
use App\Http\Requests\Admin\Nationality\DestroyNationality;
use App\Http\Requests\Admin\Nationality\IndexNationality;
use App\Http\Requests\Admin\Nationality\StoreNationality;
use App\Http\Requests\Admin\Nationality\UpdateNationality;
use App\Models\Nationality;
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

class NationalitiesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexNationality $request
     * @return array|Factory|View
     */
    public function index(IndexNationality $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Nationality::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nationality', 'flag_image'],

            // set columns to searchIn
            ['id', 'nationality', 'flag_image']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.nationality.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.nationality.create');

        return view('admin.nationality.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreNationality $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreNationality $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Nationality
        $nationality = Nationality::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/nationalities'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/nationalities');
    }

    /**
     * Display the specified resource.
     *
     * @param Nationality $nationality
     * @throws AuthorizationException
     * @return void
     */
    public function show(Nationality $nationality)
    {
        $this->authorize('admin.nationality.show', $nationality);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Nationality $nationality
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Nationality $nationality)
    {
        $this->authorize('admin.nationality.edit', $nationality);


        return view('admin.nationality.edit', [
            'nationality' => $nationality,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateNationality $request
     * @param Nationality $nationality
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateNationality $request, Nationality $nationality)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Nationality
        $nationality->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/nationalities'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/nationalities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyNationality $request
     * @param Nationality $nationality
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyNationality $request, Nationality $nationality)
    {
        $nationality->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyNationality $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyNationality $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Nationality::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
