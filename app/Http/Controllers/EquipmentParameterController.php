<?php

namespace App\Http\Controllers;

use App\DataTables\EquipmentParameterDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEquipmentParameterRequest;
use App\Http\Requests\UpdateEquipmentParameterRequest;
use App\Repositories\EquipmentParameterRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EquipmentParameterController extends AppBaseController
{
    /** @var  EquipmentParameterRepository */
    private $equipmentParameterRepository;

    public function __construct(EquipmentParameterRepository $equipmentParameterRepo)
    {
        $this->equipmentParameterRepository = $equipmentParameterRepo;
    }

    /**
     * Display a listing of the EquipmentParameter.
     *
     * @param EquipmentParameterDataTable $equipmentParameterDataTable
     * @return Response
     */
    public function index(EquipmentParameterDataTable $equipmentParameterDataTable)
    {
        return $equipmentParameterDataTable->render('equipment_parameters.index');
    }

    /**
     * Show the form for creating a new EquipmentParameter.
     *
     * @return Response
     */
    public function create()
    {
        return view('equipment_parameters.create');
    }

    /**
     * Store a newly created EquipmentParameter in storage.
     *
     * @param CreateEquipmentParameterRequest $request
     *
     * @return Response
     */
    public function store(CreateEquipmentParameterRequest $request)
    {
        $input = $request->all();

        $equipmentParameter = $this->equipmentParameterRepository->create($input);

        Flash::success('Equipment Parameter saved successfully.');

        return redirect(route('equipmentParameters.index'));
    }

    /**
     * Display the specified EquipmentParameter.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $equipmentParameter = $this->equipmentParameterRepository->find($id);

        if (empty($equipmentParameter)) {
            Flash::error('Equipment Parameter not found');

            return redirect(route('equipmentParameters.index'));
        }

        return view('equipment_parameters.show')->with('equipmentParameter', $equipmentParameter);
    }

    /**
     * Show the form for editing the specified EquipmentParameter.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $equipmentParameter = $this->equipmentParameterRepository->find($id);

        if (empty($equipmentParameter)) {
            Flash::error('Equipment Parameter not found');

            return redirect(route('equipmentParameters.index'));
        }

        return view('equipment_parameters.edit')->with('equipmentParameter', $equipmentParameter);
    }

    /**
     * Update the specified EquipmentParameter in storage.
     *
     * @param  int              $id
     * @param UpdateEquipmentParameterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEquipmentParameterRequest $request)
    {
        $equipmentParameter = $this->equipmentParameterRepository->find($id);

        if (empty($equipmentParameter)) {
            Flash::error('Equipment Parameter not found');

            return redirect(route('equipmentParameters.index'));
        }

        $equipmentParameter = $this->equipmentParameterRepository->update($request->all(), $id);

        Flash::success('Equipment Parameter updated successfully.');

        return redirect(route('equipmentParameters.index'));
    }

    /**
     * Remove the specified EquipmentParameter from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $equipmentParameter = $this->equipmentParameterRepository->find($id);

        if (empty($equipmentParameter)) {
            Flash::error('Equipment Parameter not found');

            return redirect(route('equipmentParameters.index'));
        }

        $this->equipmentParameterRepository->delete($id);

        Flash::success('Equipment Parameter deleted successfully.');

        return redirect(route('equipmentParameters.index'));
    }
}
