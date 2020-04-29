<?php

namespace App\Http\Controllers;

use App\DataTables\EquipmentModelDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEquipmentModelRequest;
use App\Http\Requests\UpdateEquipmentModelRequest;
use App\Repositories\EquipmentModelRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\EquipmentBrand;
use Response;

class EquipmentModelController extends AppBaseController
{
    /** @var  EquipmentModelRepository */
    private $equipmentModelRepository;

    public function __construct(EquipmentModelRepository $equipmentModelRepo)
    {
        $this->equipmentModelRepository = $equipmentModelRepo;
    }

    /**
     * Display a listing of the EquipmentModel.
     *
     * @param EquipmentModelDataTable $equipmentModelDataTable
     * @return Response
     */
    public function index(EquipmentModelDataTable $equipmentModelDataTable)
    {
        return $equipmentModelDataTable->render('equipment_models.index');
    }

    /**
     * Show the form for creating a new EquipmentModel.
     *
     * @return Response
     */
    public function create()
    {
        $equipment_brand_list = EquipmentBrand::all()->sortBy('name')->pluck('name', 'id');
        return view('equipment_models.create')->with('equipment_brand_list', $equipment_brand_list);
    }

    /**
     * Store a newly created EquipmentModel in storage.
     *
     * @param CreateEquipmentModelRequest $request
     *
     * @return Response
     */
    public function store(CreateEquipmentModelRequest $request)
    {
        $input = $request->all();

        $equipmentModel = $this->equipmentModelRepository->create($input);

        Flash::success('Equipment Model saved successfully.');

        return redirect(route('equipmentModels.index'));
    }

    /**
     * Display the specified EquipmentModel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $equipmentModel = $this->equipmentModelRepository->find($id);

        if (empty($equipmentModel)) {
            Flash::error('Equipment Model not found');

            return redirect(route('equipmentModels.index'));
        }

        return view('equipment_models.show')->with('equipmentModel', $equipmentModel);
    }

    /**
     * Show the form for editing the specified EquipmentModel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $equipmentModel = $this->equipmentModelRepository->find($id);

        if (empty($equipmentModel)) {
            Flash::error('Equipment Model not found');

            return redirect(route('equipmentModels.index'));
        }
        $equipment_brand_list = EquipmentBrand::all()->sortBy('name')->pluck('name', 'id');
        return view('equipment_models.edit')->with('equipment_brand_list', $equipment_brand_list)->with('equipmentModel', $equipmentModel);
    }

    /**
     * Update the specified EquipmentModel in storage.
     *
     * @param  int              $id
     * @param UpdateEquipmentModelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEquipmentModelRequest $request)
    {
        $equipmentModel = $this->equipmentModelRepository->find($id);

        if (empty($equipmentModel)) {
            Flash::error('Equipment Model not found');

            return redirect(route('equipmentModels.index'));
        }

        $equipmentModel = $this->equipmentModelRepository->update($request->all(), $id);

        Flash::success('Equipment Model updated successfully.');

        return redirect(route('equipmentModels.index'));
    }

    /**
     * Remove the specified EquipmentModel from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $equipmentModel = $this->equipmentModelRepository->find($id);

        if (empty($equipmentModel)) {
            Flash::error('Equipment Model not found');

            return redirect(route('equipmentModels.index'));
        }

        $this->equipmentModelRepository->delete($id);

        Flash::success('Equipment Model deleted successfully.');

        return redirect(route('equipmentModels.index'));
    }
}
