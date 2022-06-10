<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Sport\BulkDestroySport;
use App\Http\Requests\Admin\Sport\DestroySport;
use App\Http\Requests\Admin\Sport\IndexSport;
use App\Http\Requests\Admin\Sport\StoreSport;
use App\Http\Requests\Admin\Sport\UpdateSport;
use App\Models\Sport;
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

class SportsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSport $request
     * @return array|Factory|View
     */
    public function index(IndexSport $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Sport::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'sport', 'description', 'image'],

            // set columns to searchIn
            ['id', 'sport', 'description', 'image']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.sport.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.sport.create');

        return view('admin.sport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSport $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSport $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Sport
        $sport = Sport::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/sports'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/sports');
    }

    /**
     * Display the specified resource.
     *
     * @param Sport $sport
     * @throws AuthorizationException
     * @return void
     */
    public function show(Sport $sport)
    {
        $this->authorize('admin.sport.show', $sport);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Sport $sport
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Sport $sport)
    {
        $this->authorize('admin.sport.edit', $sport);


        return view('admin.sport.edit', [
            'sport' => $sport,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSport $request
     * @param Sport $sport
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSport $request, Sport $sport)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Sport
        $sport->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/sports'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/sports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySport $request
     * @param Sport $sport
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySport $request, Sport $sport)
    {
        $sport->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySport $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySport $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Sport::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
