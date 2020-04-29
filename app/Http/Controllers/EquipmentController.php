<?php

namespace App\Http\Controllers;

use App\Models\EquipmentModel;
use App\Models\EquipmentType;
use App\DataTables\EquipmentDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Repositories\EquipmentRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EquipmentController extends AppBaseController
{
    /** @var  EquipmentRepository */
    private $equipmentRepository;

    public function __construct(EquipmentRepository $equipmentRepo)
    {
        $this->equipmentRepository = $equipmentRepo;
    }

    /**
     * Display a listing of the Equipment.
     *
     * @param EquipmentDataTable $equipmentDataTable
     * @return Response
     */
    public function index(EquipmentDataTable $equipmentDataTable)
    {
        return $equipmentDataTable->render('equipment.index');
    }

    /**
     * Show the form for creating a new Equipment.
     *
     * @return Response
     */
    public function create()
    {
        $equipment_model_list = EquipmentModel::all()->sortBy('name')->pluck('name', 'id');
        $equipment_type_list = EquipmentType::all()->sortBy('name')->pluck('name', 'id');
        return view('equipment.create')->with('equipment_model_list', $equipment_model_list)->with('equipment_type_list', $equipment_type_list);
    }

    /**
     * Store a newly created Equipment in storage.
     *
     * @param CreateEquipmentRequest $request
     *
     * @return Response
     */
    public function store(CreateEquipmentRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->storeAs(
                env('PATH_EQUIPMENT_IMAGES', 'uploads'),
                time() . '.' . $request->file('image')->extension(),
                'public'
            );
            $input['image'] = $path;
        }

        $equipment = $this->equipmentRepository->create($input);

        Flash::success('Equipment deleted successfully.');

        return redirect(route('equipment.index'));
    }

    /**
     * Display the specified Equipment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $equipment = $this->equipmentRepository->find($id);

        if (empty($equipment)) {
            Flash::error(__('Equipment not found'));

            return redirect(route('equipment.index'));
        }

        return view('equipment.show')->with('equipment', $equipment);
    }

    /**
     * Show the form for editing the specified Equipment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $equipment = $this->equipmentRepository->find($id);

        if (empty($equipment)) {
            Flash::error(__('Equipment not found'));

            return redirect(route('equipment.index'));
        }

        $equipment_model_list = EquipmentModel::all()->sortBy('name')->pluck('name', 'id');
        $equipment_type_list = EquipmentType::all()->sortBy('name')->pluck('name', 'id');

        return view('equipment.edit')->with('equipment', $equipment)->with('equipment_model_list', $equipment_model_list)->with('equipment_type_list', $equipment_type_list);
    }

    /**
     * Update the specified Equipment in storage.
     *
     * @param  int              $id
     * @param UpdateEquipmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEquipmentRequest $request)
    {
        $equipment = $this->equipmentRepository->find($id);

        if (empty($equipment)) {
            Flash::error(__('Equipment not found'));

            return redirect(route('equipment.index'));
        }

        $input = $request->all();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->storeAs(
                env('PATH_EQUIPMENT_IMAGES', 'uploads'),
                time() . '.' . $request->file('image')->extension(),
                'public'
            );
            $input['image'] = $path;
        }

        $equipment = $this->equipmentRepository->update($input, $id);

        Flash::success(__('Equipment updated successfully.'));

        return redirect(route('equipment.index'));
    }

    /**
     * Remove the specified Equipment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $equipment = $this->equipmentRepository->find($id);

        if (empty($equipment)) {
            Flash::error('Equipment not found');

            return redirect(route('equipment.index'));
        }

        $this->equipmentRepository->delete($id);

        Flash::success('Equipment deleted successfully.');

        return redirect(route('equipment.index'));
    }
}
