<?php

namespace App\Http\Controllers;

use App\DataTables\CompanyLocationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCompanyLocationRequest;
use App\Http\Requests\UpdateCompanyLocationRequest;
use App\Repositories\CompanyLocationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Company;
use App\User;
use Response;

class CompanyLocationController extends AppBaseController
{
    /** @var  CompanyLocationRepository */
    private $companyLocationRepository;

    public function __construct(CompanyLocationRepository $companyLocationRepo)
    {
        $this->companyLocationRepository = $companyLocationRepo;
    }

    /**
     * Display a listing of the CompanyLocation.
     *
     * @param CompanyLocationDataTable $companyLocationDataTable
     * @return Response
     */
    public function index(CompanyLocationDataTable $companyLocationDataTable)
    {
        return $companyLocationDataTable->render('company_locations.index');
    }

    /**
     * Show the form for creating a new CompanyLocation.
     *
     * @return Response
     */
    public function create()
    {
        $company_list = Company::all()->sortBy('name')->pluck('name', 'id');
        $manager_list = User::role('manager')->get()->pluck('name', 'id');
        return view('company_locations.create')->with('company_list', $company_list)->with('manager_list', $manager_list);
    }

    /**
     * Store a newly created CompanyLocation in storage.
     *
     * @param CreateCompanyLocationRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyLocationRequest $request)
    {
        $input = $request->all();

        $companyLocation = $this->companyLocationRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/companyLocations.singular')]));

        return redirect(route('companyLocations.index'));
    }

    /**
     * Display the specified CompanyLocation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyLocation = $this->companyLocationRepository->find($id);

        if (empty($companyLocation)) {
            Flash::error(__('models/companyLocations.singular') . ' ' . __('messages.not_found'));

            return redirect(route('companyLocations.index'));
        }

        return view('company_locations.show')->with('companyLocation', $companyLocation);
    }

    /**
     * Show the form for editing the specified CompanyLocation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyLocation = $this->companyLocationRepository->find($id);

        if (empty($companyLocation)) {
            Flash::error(__('messages.not_found', ['model' => __('models/companyLocations.singular')]));

            return redirect(route('companyLocations.index'));
        }
        $company_list = Company::all()->sortBy('name')->pluck('name', 'id');
        $manager_list = User::role('manager')->get()->pluck('name', 'id');

        return view('company_locations.edit')->with('companyLocation', $companyLocation)->with('company_list', $company_list)->with('manager_list', $manager_list);
    }

    /**
     * Update the specified CompanyLocation in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyLocationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyLocationRequest $request)
    {
        $companyLocation = $this->companyLocationRepository->find($id);

        if (empty($companyLocation)) {
            Flash::error(__('messages.not_found', ['model' => __('models/companyLocations.singular')]));

            return redirect(route('companyLocations.index'));
        }

        $companyLocation = $this->companyLocationRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/companyLocations.singular')]));

        return redirect(route('companyLocations.index'));
    }

    /**
     * Remove the specified CompanyLocation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyLocation = $this->companyLocationRepository->find($id);

        if (empty($companyLocation)) {
            Flash::error(__('messages.not_found', ['model' => __('models/companyLocations.singular')]));

            return redirect(route('companyLocations.index'));
        }

        $this->companyLocationRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/companyLocations.singular')]));

        return redirect(route('companyLocations.index'));
    }
}
