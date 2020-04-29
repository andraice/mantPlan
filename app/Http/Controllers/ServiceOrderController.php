<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Equipment;
use App\Models\TypeService;
use App\Models\TaskGroup;

use App\Repositories\CompanyRepository;

use Spatie\Permission\Models\Role;

use App\DataTables\ServiceOrderDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateServiceOrderRequest;
use App\Http\Requests\UpdateServiceOrderRequest;
use App\Repositories\ServiceOrderRepository;
use App\Repositories\UserRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Repositories\TaskGroupRepository;
use Response;

class ServiceOrderController extends AppBaseController
{
    /** @var  ServiceOrderRepository */
    private $serviceOrderRepository;
    /** @var  TaskGroupRepository */
    private $taskGroupRepository;
    /** @var  UserRepository */
    private $userRepo;

    public function __construct(ServiceOrderRepository $serviceOrderRepo, UserRepository $userRepo, TaskGroupRepository $taskGroupRepository)
    {
        $this->serviceOrderRepository = $serviceOrderRepo;
        $this->taskGroupRepository = $taskGroupRepository;
        $this->userRepo = $userRepo;
    }

    /**
     * Display a listing of the ServiceOrder.
     *
     * @param ServiceOrderDataTable $serviceOrderDataTable
     * @return Response
     */
    public function index(ServiceOrderDataTable $serviceOrderDataTable)
    {
        return $serviceOrderDataTable->render('service_orders.index');
    }

    /**
     * Show the form for creating a new ServiceOrder.
     *
     * @return Response
     */
    public function create(CompanyRepository $companyRepository)
    {
        $equipment_list = Equipment::all()->sortBy('name_sn')->pluck('name_sn', 'id');
        $type_service_list = TypeService::all()->sortBy('name')->pluck('name', 'id');
        $company_list = $companyRepository->allActive()->pluck('name', 'id');
        $requestor_list = $this->userRepo->getRequestor()->pluck('name', 'id');
        $technical_support_list = $this->userRepo->getTechnicalOperator()->pluck('name', 'id');

        return view('service_orders.create')->with('equipment_list', $equipment_list)->with('type_service_list', $type_service_list)->with('requestor_list', $requestor_list)->with('company_list', $company_list)->with('technical_support_list', $technical_support_list);
    }

    /**
     * Store a newly created ServiceOrder in storage.
     *
     * @param CreateServiceOrderRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceOrderRequest $request)
    {
        $input = $request->all();

        $serviceOrder = $this->serviceOrderRepository->create($input);

        Flash::success('Service Order saved successfully.');

        return redirect(route('serviceOrders.index'));
    }

    /**
     * Display the specified ServiceOrder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serviceOrder = $this->serviceOrderRepository->find($id);

        if (empty($serviceOrder)) {
            Flash::error('Service Order not found');

            return redirect(route('serviceOrders.index'));
        }

        return view('service_orders.show')->with('serviceOrder', $serviceOrder);
    }

    /**
     * Show the form for editing the specified ServiceOrder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, CompanyRepository $companyRepository)
    {
        $serviceOrder = $this->serviceOrderRepository->find($id);

        if (empty($serviceOrder)) {
            Flash::error('Service Order not found');

            return redirect(route('serviceOrders.index'));
        }

        if ($serviceOrder->status != 'required') {
            Flash::error('Service Order is ' . $serviceOrder->status);

            return redirect(route('serviceOrders.index'));
        }

        $equipment_list = Equipment::all()->sortBy('name_sn')->pluck('name_sn', 'id');
        $type_service_list = TypeService::all()->sortBy('name')->pluck('name', 'id');
        $company_list = $companyRepository->allActive()->pluck('name', 'id');
        $requestor_list = $this->userRepo->getRequestor()->pluck('name', 'id');
        $technical_support_list = $this->userRepo->getTechnicalOperator()->pluck('name', 'id');

        return view('service_orders.edit')->with('serviceOrder', $serviceOrder)->with('equipment_list', $equipment_list)->with('type_service_list', $type_service_list)->with('requestor_list', $requestor_list)->with('company_list', $company_list)->with('technical_support_list', $technical_support_list);
    }

    /**
     * Update the specified ServiceOrder in storage.
     *
     * @param  int              $id
     * @param UpdateServiceOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceOrderRequest $request)
    {
        $serviceOrder = $this->serviceOrderRepository->find($id);

        if (empty($serviceOrder)) {
            Flash::error('Service Order not found');

            return redirect(route('serviceOrders.index'));
        }

        if ($serviceOrder->status != 'required') {
            Flash::error('Service Order is ' . $serviceOrder->status);

            return redirect(route('serviceOrders.index'));
        }

        $serviceOrder = $this->serviceOrderRepository->update($request->all(), $id);

        Flash::success('Service Order updated successfully.');

        return redirect(route('serviceOrders.index'));
    }

    /**
     * Remove the specified ServiceOrder from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serviceOrder = $this->serviceOrderRepository->find($id);

        if (empty($serviceOrder)) {
            Flash::error('Service Order not found');

            return redirect(route('serviceOrders.index'));
        }

        if ($serviceOrder->status != 'required') {
            Flash::error('Service Order is ' . $serviceOrder->status);

            return redirect(route('serviceOrders.index'));
        }

        $this->serviceOrderRepository->delete($id);

        Flash::success('Service Order deleted successfully.');

        return redirect(route('serviceOrders.index'));
    }

    /**
     * Show the form for open the specified ServiceOrder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function formOpen($id)
    {
        $serviceOrder = $this->serviceOrderRepository->find($id);

        if (empty($serviceOrder)) {
            Flash::error('Service Order not found');

            return redirect(route('serviceOrders.index'));
        }

        $task_group_list = TaskGroup::all()->sortBy('name')->pluck('name', 'id')->prepend(' - sin plantilla - ', '');

        return view('service_orders.edit_open')->with('serviceOrder', $serviceOrder)->with('task_group_list', $task_group_list);
    }

    /**
     * Show the form for close the specified ServiceOrder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function formClose($id)
    {
        $serviceOrder = $this->serviceOrderRepository->find($id);

        if (empty($serviceOrder)) {
            Flash::error('Service Order not found');

            return redirect(route('serviceOrders.index'));
        }

        $technical_operator_list = $this->userRepo->getTechnicalOperator()->pluck('name', 'id');

        return view('service_orders.edit_close')->with('serviceOrder', $serviceOrder)->with('technical_operator_list', $technical_operator_list);
    }

    /**
     * Update the status ServiceOrder in storage.
     *
     * @param  int              $id
     * @param UpdateServiceOrderRequest $request
     *
     * @return Response
     */
    public function statusUpdate($id, UpdateServiceOrderRequest $request)
    {
        $serviceOrder = $this->serviceOrderRepository->find($id);

        if (empty($serviceOrder)) {
            Flash::error('Service Order not found');

            return redirect(route('serviceOrders.index'));
        }

        $serviceOrder = $this->serviceOrderRepository->update($request->all(), $id);

        $task_group_id = $request->get('task_group');
        if (isset($task_group_id) && $serviceOrder != '') {
            $serviceOrder->details()->delete();
            $tasks = $this->taskGroupRepository->find($task_group_id)->tasks()->get();
            foreach ($tasks as $task) {
                $serviceOrder->details()->create(
                    [
                        'start' => '2020-01-01 00:00:00',
                        'end' => '2020-01-01 00:00:00',
                        'tiempo' => '0',
                        'revision_status' => '',
                        'work_status' => '',
                        'description' => $task->description,
                        'tech_support_comments' => '',
                        'technical_operator_id' => 1
                    ]
                );
            }
        }

        Flash::success('Service Order updated successfully.');

        return redirect(route('serviceOrders.show', $id));
    }
}
