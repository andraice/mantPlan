<?php

namespace App\Http\Controllers;

use App\DataTables\EquipmentBrandDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEquipmentBrandRequest;
use App\Http\Requests\UpdateEquipmentBrandRequest;
use App\Repositories\EquipmentBrandRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EquipmentBrandController extends AppBaseController
{
    /** @var  EquipmentBrandRepository */
    private $equipmentBrandRepository;

    public function __construct(EquipmentBrandRepository $equipmentBrandRepo)
    {
        $this->equipmentBrandRepository = $equipmentBrandRepo;
    }

    /**
     * Display a listing of the EquipmentBrand.
     *
     * @param EquipmentBrandDataTable $equipmentBrandDataTable
     * @return Response
     */
    public function index(EquipmentBrandDataTable $equipmentBrandDataTable)
    {
        return $equipmentBrandDataTable->render('equipment_brands.index');
    }

    /**
     * Show the form for creating a new EquipmentBrand.
     *
     * @return Response
     */
    public function create()
    {
        return view('equipment_brands.create');
    }

    /**
     * Store a newly created EquipmentBrand in storage.
     *
     * @param CreateEquipmentBrandRequest $request
     *
     * @return Response
     */
    public function store(CreateEquipmentBrandRequest $request)
    {
        $input = $request->all();

        $equipmentBrand = $this->equipmentBrandRepository->create($input);

        Flash::success('Equipment Brand saved successfully.');

        return redirect(route('equipmentBrands.index'));
    }

    /**
     * Display the specified EquipmentBrand.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $equipmentBrand = $this->equipmentBrandRepository->find($id);

        if (empty($equipmentBrand)) {
            Flash::error('Equipment Brand not found');

            return redirect(route('equipmentBrands.index'));
        }

        return view('equipment_brands.show')->with('equipmentBrand', $equipmentBrand);
    }

    /**
     * Show the form for editing the specified EquipmentBrand.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $equipmentBrand = $this->equipmentBrandRepository->find($id);

        if (empty($equipmentBrand)) {
            Flash::error('Equipment Brand not found');

            return redirect(route('equipmentBrands.index'));
        }

        return view('equipment_brands.edit')->with('equipmentBrand', $equipmentBrand);
    }

    /**
     * Update the specified EquipmentBrand in storage.
     *
     * @param  int              $id
     * @param UpdateEquipmentBrandRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEquipmentBrandRequest $request)
    {
        $equipmentBrand = $this->equipmentBrandRepository->find($id);

        if (empty($equipmentBrand)) {
            Flash::error('Equipment Brand not found');

            return redirect(route('equipmentBrands.index'));
        }

        $equipmentBrand = $this->equipmentBrandRepository->update($request->all(), $id);

        Flash::success('Equipment Brand updated successfully.');

        return redirect(route('equipmentBrands.index'));
    }

    /**
     * Remove the specified EquipmentBrand from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $equipmentBrand = $this->equipmentBrandRepository->find($id);

        if (empty($equipmentBrand)) {
            Flash::error('Equipment Brand not found');

            return redirect(route('equipmentBrands.index'));
        }

        $this->equipmentBrandRepository->delete($id);

        Flash::success('Equipment Brand deleted successfully.');

        return redirect(route('equipmentBrands.index'));
    }
}
