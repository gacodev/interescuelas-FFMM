<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Participant\BulkDestroyParticipant;
use App\Http\Requests\Admin\Participant\DestroyParticipant;
use App\Http\Requests\Admin\Participant\IndexParticipant;
use App\Http\Requests\Admin\Participant\StoreParticipant;
use App\Http\Requests\Admin\Participant\UpdateParticipant;
use App\Models\Participant;
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

class ParticipantsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexParticipant $request
     * @return array|Factory|View
     */
    public function index(IndexParticipant $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Participant::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'number_id', 'name', 'email', 'phone', 'birthday', 'doc_id', 'force_id', 'nationality_id'],

            // set columns to searchIn
            ['id', 'number_id', 'name', 'email', 'phone']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.participant.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.participant.create');

        return view('admin.participant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreParticipant $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreParticipant $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Participant
        $participant = Participant::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/participants'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/participants');
    }

    /**
     * Display the specified resource.
     *
     * @param Participant $participant
     * @throws AuthorizationException
     * @return void
     */
    public function show(Participant $participant)
    {
        $this->authorize('admin.participant.show', $participant);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Participant $participant
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Participant $participant)
    {
        $this->authorize('admin.participant.edit', $participant);


        return view('admin.participant.edit', [
            'participant' => $participant,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateParticipant $request
     * @param Participant $participant
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateParticipant $request, Participant $participant)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Participant
        $participant->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/participants'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/participants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyParticipant $request
     * @param Participant $participant
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyParticipant $request, Participant $participant)
    {
        $participant->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyParticipant $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyParticipant $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Participant::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
