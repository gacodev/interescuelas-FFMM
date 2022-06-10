<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Competence\BulkDestroyCompetence;
use App\Http\Requests\Admin\Competence\DestroyCompetence;
use App\Http\Requests\Admin\Competence\IndexCompetence;
use App\Http\Requests\Admin\Competence\StoreCompetence;
use App\Http\Requests\Admin\Competence\UpdateCompetence;
use App\Models\Competence;
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

class CompetencesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCompetence $request
     * @return array|Factory|View
     */
    public function index(IndexCompetence $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Competence::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'sport_id', 'categorie_id', 'quantity_of_participants'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.competence.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.competence.create');

        return view('admin.competence.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCompetence $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCompetence $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Competence
        $competence = Competence::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/competences'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/competences');
    }

    /**
     * Display the specified resource.
     *
     * @param Competence $competence
     * @throws AuthorizationException
     * @return void
     */
    public function show(Competence $competence)
    {
        $this->authorize('admin.competence.show', $competence);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Competence $competence
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Competence $competence)
    {
        $this->authorize('admin.competence.edit', $competence);


        return view('admin.competence.edit', [
            'competence' => $competence,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCompetence $request
     * @param Competence $competence
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCompetence $request, Competence $competence)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Competence
        $competence->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/competences'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/competences');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCompetence $request
     * @param Competence $competence
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCompetence $request, Competence $competence)
    {
        $competence->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCompetence $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCompetence $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Competence::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
