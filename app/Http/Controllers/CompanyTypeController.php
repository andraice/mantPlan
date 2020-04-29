<?php

namespace App\Http\Controllers;

use App\DataTables\CompanyTypeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCompanyTypeRequest;
use App\Http\Requests\UpdateCompanyTypeRequest;
use App\Repositories\CompanyTypeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CompanyTypeController extends AppBaseController
{
    /** @var  CompanyTypeRepository */
    private $companyTypeRepository;

    public function __construct(CompanyTypeRepository $companyTypeRepo)
    {
        $this->companyTypeRepository = $companyTypeRepo;
    }

    /**
     * Display a listing of the CompanyType.
     *
     * @param CompanyTypeDataTable $companyTypeDataTable
     * @return Response
     */
    public function index(CompanyTypeDataTable $companyTypeDataTable)
    {
        return $companyTypeDataTable->render('company_types.index');
    }

    /**
     * Show the form for creating a new CompanyType.
     *
     * @return Response
     */
    public function create()
    {
        return view('company_types.create');
    }

    /**
     * Store a newly created CompanyType in storage.
     *
     * @param CreateCompanyTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyTypeRequest $request)
    {
        $input = $request->all();

        $companyType = $this->companyTypeRepository->create($input);

        Flash::success('Company Type saved successfully.');

        return redirect(route('companyTypes.index'));
    }

    /**
     * Display the specified CompanyType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyType = $this->companyTypeRepository->find($id);

        if (empty($companyType)) {
            Flash::error('Company Type not found');

            return redirect(route('companyTypes.index'));
        }

        return view('company_types.show')->with('companyType', $companyType);
    }

    /**
     * Show the form for editing the specified CompanyType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyType = $this->companyTypeRepository->find($id);

        if (empty($companyType)) {
            Flash::error('Company Type not found');

            return redirect(route('companyTypes.index'));
        }

        return view('company_types.edit')->with('companyType', $companyType);
    }

    /**
     * Update the specified CompanyType in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyTypeRequest $request)
    {
        $companyType = $this->companyTypeRepository->find($id);

        if (empty($companyType)) {
            Flash::error('Company Type not found');

            return redirect(route('companyTypes.index'));
        }

        $companyType = $this->companyTypeRepository->update($request->all(), $id);

        Flash::success('Company Type updated successfully.');

        return redirect(route('companyTypes.index'));
    }

    /**
     * Remove the specified CompanyType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyType = $this->companyTypeRepository->find($id);

        if (empty($companyType)) {
            Flash::error('Company Type not found');

            return redirect(route('companyTypes.index'));
        }

        $this->companyTypeRepository->delete($id);

        Flash::success('Company Type deleted successfully.');

        return redirect(route('companyTypes.index'));
    }
}
