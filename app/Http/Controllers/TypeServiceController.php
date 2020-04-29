<?php

namespace App\Http\Controllers;

use App\DataTables\TypeServiceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTypeServiceRequest;
use App\Http\Requests\UpdateTypeServiceRequest;
use App\Repositories\TypeServiceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TypeServiceController extends AppBaseController
{
    /** @var  TypeServiceRepository */
    private $typeServiceRepository;

    public function __construct(TypeServiceRepository $typeServiceRepo)
    {
        $this->typeServiceRepository = $typeServiceRepo;
    }

    /**
     * Display a listing of the TypeService.
     *
     * @param TypeServiceDataTable $typeServiceDataTable
     * @return Response
     */
    public function index(TypeServiceDataTable $typeServiceDataTable)
    {
        return $typeServiceDataTable->render('type_services.index');
    }

    /**
     * Show the form for creating a new TypeService.
     *
     * @return Response
     */
    public function create()
    {
        return view('type_services.create');
    }

    /**
     * Store a newly created TypeService in storage.
     *
     * @param CreateTypeServiceRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeServiceRequest $request)
    {
        $input = $request->all();

        $typeService = $this->typeServiceRepository->create($input);

        Flash::success('Type Service saved successfully.');

        return redirect(route('typeServices.index'));
    }

    /**
     * Display the specified TypeService.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $typeService = $this->typeServiceRepository->find($id);

        if (empty($typeService)) {
            Flash::error('Type Service not found');

            return redirect(route('typeServices.index'));
        }

        return view('type_services.show')->with('typeService', $typeService);
    }

    /**
     * Show the form for editing the specified TypeService.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typeService = $this->typeServiceRepository->find($id);

        if (empty($typeService)) {
            Flash::error('Type Service not found');

            return redirect(route('typeServices.index'));
        }

        return view('type_services.edit')->with('typeService', $typeService);
    }

    /**
     * Update the specified TypeService in storage.
     *
     * @param  int              $id
     * @param UpdateTypeServiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeServiceRequest $request)
    {
        $typeService = $this->typeServiceRepository->find($id);

        if (empty($typeService)) {
            Flash::error('Type Service not found');

            return redirect(route('typeServices.index'));
        }

        $typeService = $this->typeServiceRepository->update($request->all(), $id);

        Flash::success('Type Service updated successfully.');

        return redirect(route('typeServices.index'));
    }

    /**
     * Remove the specified TypeService from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $typeService = $this->typeServiceRepository->find($id);

        if (empty($typeService)) {
            Flash::error('Type Service not found');

            return redirect(route('typeServices.index'));
        }

        $this->typeServiceRepository->delete($id);

        Flash::success('Type Service deleted successfully.');

        return redirect(route('typeServices.index'));
    }

    public function getData()
    {
        $typeService = $this->typeServiceRepository->all();

        return response()->json($typeService);
    }
}
