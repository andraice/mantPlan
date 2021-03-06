<?php

namespace App\Http\Controllers;


use App\Models\CompanyType;
use App\DataTables\CompanyDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Repositories\CompanyRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CompanyController extends AppBaseController
{
    /** @var  CompanyRepository */
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepo)
    {
        $this->companyRepository = $companyRepo;
    }

    /**
     * Display a listing of the Company.
     *
     * @param CompanyDataTable $companyDataTable
     * @return Response
     */
    public function index(CompanyDataTable $companyDataTable)
    {
        return $companyDataTable->render('company.index');
    }

    /**
     * Show the form for creating a new Company.
     *
     * @return Response
     */
    public function create()
    {
        $company_type_list = CompanyType::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');
        return view('company.create')->with('company_type_list', $company_type_list);
    }

    /**
     * Store a newly created Company in storage.
     *
     * @param CreateCompanyRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->storeAs(
                env('PATH_COMPANY_IMAGES', 'uploads'),
                time() . '.' . $request->file('image')->extension(),
                'public'
            );
            $input['image'] = $path;
        }

        $company = $this->companyRepository->create($input);

        Flash::success('Company saved successfully.');

        return redirect(route('company.index'));
    }

    /**
     * Display the specified Company.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $company = $this->companyRepository->find($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('company.index'));
        }

        return view('company.show')->with('company', $company);
    }

    /**
     * Show the form for editing the specified Company.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $company = $this->companyRepository->find($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('company.index'));
        }

        $company_type_list = CompanyType::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');

        return view('company.edit')->with('company', $company)->with('company_type_list', $company_type_list);
    }

    /**
     * Update the specified Company in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyRequest $request)
    {
        $company = $this->companyRepository->find($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('company.index'));
        }

        $input = $request->all();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->storeAs(
                env('PATH_COMPANY_IMAGES', 'uploads'),
                time() . '.' . $request->file('image')->extension(),
                'public'
            );
            $input['image'] = $path;
        }

        $company = $this->companyRepository->update($input, $id);

        Flash::success('Company updated successfully.');

        return redirect(route('company.index'));
    }

    /**
     * Remove the specified Company from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $company = $this->companyRepository->find($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('company.index'));
        }

        $this->companyRepository->delete($id);

        Flash::success('Company deleted successfully.');

        return redirect(route('company.index'));
    }
}
