<?php

namespace App\Http\Controllers;

use App\DataTables\ServiceOrderFileDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateServiceOrderFileRequest;
use App\Http\Requests\UpdateServiceOrderFileRequest;
use App\Repositories\ServiceOrderFileRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ServiceOrderFileController extends AppBaseController
{
    /** @var  ServiceOrderFileRepository */
    private $serviceOrderFileRepository;

    public function __construct(ServiceOrderFileRepository $serviceOrderFileRepo)
    {
        $this->serviceOrderFileRepository = $serviceOrderFileRepo;
    }

    /**
     * Display a listing of the ServiceOrderFile.
     *
     * @param ServiceOrderFileDataTable $serviceOrderFileDataTable
     * @return Response
     */
    public function index(ServiceOrderFileDataTable $serviceOrderFileDataTable)
    {
        return $serviceOrderFileDataTable->render('service_order_files.index');
    }

    /**
     * Show the form for creating a new ServiceOrderFile.
     *
     * @return Response
     */
    public function create()
    {
        return view('service_order_files.create');
    }

    /**
     * Store a newly created ServiceOrderFile in storage.
     *
     * @param CreateServiceOrderFileRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceOrderFileRequest $request)
    {
        $input = $request->all();

        $serviceOrderFile = $this->serviceOrderFileRepository->create($input);

        Flash::success('Service Order File saved successfully.');

        return redirect(route('serviceOrderFiles.index'));
    }

    /**
     * Display the specified ServiceOrderFile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serviceOrderFile = $this->serviceOrderFileRepository->find($id);

        if (empty($serviceOrderFile)) {
            Flash::error('Service Order File not found');

            return redirect(route('serviceOrderFiles.index'));
        }

        return view('service_order_files.show')->with('serviceOrderFile', $serviceOrderFile);
    }

    /**
     * Show the form for editing the specified ServiceOrderFile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $serviceOrderFile = $this->serviceOrderFileRepository->find($id);

        if (empty($serviceOrderFile)) {
            Flash::error('Service Order File not found');

            return redirect(route('serviceOrderFiles.index'));
        }

        return view('service_order_files.edit')->with('serviceOrderFile', $serviceOrderFile);
    }

    /**
     * Update the specified ServiceOrderFile in storage.
     *
     * @param  int              $id
     * @param UpdateServiceOrderFileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceOrderFileRequest $request)
    {
        $serviceOrderFile = $this->serviceOrderFileRepository->find($id);

        if (empty($serviceOrderFile)) {
            Flash::error('Service Order File not found');

            return redirect(route('serviceOrderFiles.index'));
        }

        $serviceOrderFile = $this->serviceOrderFileRepository->update($request->all(), $id);

        Flash::success('Service Order File updated successfully.');

        return redirect(route('serviceOrderFiles.index'));
    }

    /**
     * Remove the specified ServiceOrderFile from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serviceOrderFile = $this->serviceOrderFileRepository->find($id);

        if (empty($serviceOrderFile)) {
            Flash::error('Service Order File not found');

            return redirect(route('serviceOrderFiles.index'));
        }

        $this->serviceOrderFileRepository->delete($id);

        Flash::success('Service Order File deleted successfully.');

        return redirect(route('serviceOrderFiles.index'));
    }
}
