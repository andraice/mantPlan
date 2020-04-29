<?php

namespace App\Http\Controllers;

use App\DataTables\ServiceOrderDetailDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateServiceOrderDetailRequest;
use App\Http\Requests\UpdateServiceOrderDetailRequest;
use App\Repositories\ServiceOrderDetailRepository;
use App\Repositories\ServiceOrderFileRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\ServiceOrder;
use App\Models\ServiceOrderDetail;
use App\Repositories\UserRepository;
use Response;

use Yajra\DataTables\Facades\DataTables;

class ServiceOrderDetailController extends AppBaseController
{
    /** @var  ServiceOrderDetailRepository */
    private $serviceOrderFileRepo;
    private $serviceOrderDetailRepository;
    private $userRepo;

    public function __construct(ServiceOrderFileRepository $serviceOrderFileRepo, ServiceOrderDetailRepository $serviceOrderDetailRepo, UserRepository $userRepo)
    {
        $this->serviceOrderFileRepo = $serviceOrderFileRepo;
        $this->serviceOrderDetailRepository = $serviceOrderDetailRepo;
        $this->userRepo = $userRepo;
    }

    /**
     * Display a listing of the ServiceOrderDetail.
     *
     * @param ServiceOrderDetailDataTable $serviceOrderDetailDataTable
     * @return Response
     */
    public function index(ServiceOrderDetailDataTable $serviceOrderDetailDataTable, $service_order_id)
    {
        return $serviceOrderDetailDataTable->render('service_order_details.index')->with('service_order_id', $service_order_id);
    }

    /**
     * Show the form for creating a new ServiceOrderDetail.
     *
     * @return Response
     */
    public function create($service_order_id)
    {
        return view('service_order_details.create')->with('service_order_id', $service_order_id);
    }

    /**
     * Store a newly created ServiceOrderDetail in storage.
     *
     * @param CreateServiceOrderDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceOrderDetailRequest $request, $service_order_id)
    {
        $input = $request->all();

        if ($request->hasFile('myfiles')) {

            foreach ($request->file('myfiles') as $k => $file) {
                $path = $file->storeAs(
                    env('PATH_SERVICE_DETAIL_IMAGES', 'uploads'),
                    $k . time() . '.' . $file->extension(),
                    'public'
                );
                $file_input[$k] = ['filename' => $path, 'service_order_detail_id' => null];
            }
        }
        $serviceOrderDetail = $this->serviceOrderDetailRepository->create($input);

        if (isset($file_input)) {
            foreach ($file_input as $key => $value) {
                $value['service_order_detail_id'] = $serviceOrderDetail->id;
                $this->serviceOrderFileRepo->create($value);
            }
        }

        return response('Service Order Detail saved successfully.', 200);
    }

    /**
     * Display the specified ServiceOrderDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serviceOrderDetail = $this->serviceOrderDetailRepository->find($id);

        if (empty($serviceOrderDetail)) {
            Flash::error('Service Order Detail not found');

            return redirect(route('serviceOrderDetails.index'));
        }

        return view('service_order_details.show')->with('serviceOrderDetail', $serviceOrderDetail);
    }

    /**
     * Show the form for editing the specified ServiceOrderDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $serviceOrderDetail = $this->serviceOrderDetailRepository->find($id);

        if (empty($serviceOrderDetail)) {
            return response('Service Order Detail not found', 500);
        }

        return view('service_order_details.edit')->with('service_order_id', $serviceOrderDetail->service_order_id)->with('serviceOrderDetail', $serviceOrderDetail);
    }

    /**
     * Update the specified ServiceOrderDetail in storage.
     *
     * @param  int              $id
     * @param UpdateServiceOrderDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceOrderDetailRequest $request)
    {
        $serviceOrderDetail = $this->serviceOrderDetailRepository->find($id);

        if (empty($serviceOrderDetail)) {
            return response('Service Order Detail not found', 500);
        }
        $files_form = $request->get('service_order_file_ids');
        foreach ($serviceOrderDetail->files as $file) {
            if (!in_array($file->id, $files_form) > 0) {
                $this->serviceOrderFileRepo->delete($file->id);
            }
        }

        if ($request->hasFile('myfiles')) {
            foreach ($request->file('myfiles') as $k => $file) {
                $path = $file->storeAs(
                    env('PATH_SERVICE_DETAIL_IMAGES', 'uploads'),
                    $k . time() . '.' . $file->extension(),
                    'public'
                );
                $file_input[$k] = ['filename' => $path, 'service_order_detail_id' => null];
            }
        }

        $serviceOrderDetail = $this->serviceOrderDetailRepository->update($request->all(), $id);

        if (isset($file_input)) {
            foreach ($file_input as $key => $value) {
                $value['service_order_detail_id'] = $serviceOrderDetail->id;
                $this->serviceOrderFileRepo->create($value);
            }
        }

        return response('Service Order Detail saved successfully.', 200);
    }

    /**
     * Remove the specified ServiceOrderDetail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serviceOrderDetail = $this->serviceOrderDetailRepository->find($id);

        if (empty($serviceOrderDetail)) {
            return response('Service Order Detail not found.', 500);
        }

        $this->serviceOrderDetailRepository->delete($id);

        return response('Service Order Detail deleted successfully.', 200);
    }


    public function getData($service_order_id)
    {
        $sod = ServiceOrderDetail::with('user')
            ->select('service_order_detail.*')
            ->where('service_order_id', $service_order_id);

        return DataTables::of($sod)
            ->editColumn('id', function ($m) {
                return $m->sid;
            })
            ->editColumn('created_at', function ($m) {
                return $m->created_at->format('d/m/Y H:m');
            })
            ->addColumn('action', 'service_order_details.datatables_so_actions')
            ->make(true);
    }
}
