<?php

namespace App\Http\Controllers;

use App\DataTables\TaskGroupDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTaskGroupRequest;
use App\Http\Requests\UpdateTaskGroupRequest;
use App\Repositories\TaskGroupRepository;
use App\Repositories\TaskRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use App\Models\TypeService;

class TaskGroupController extends AppBaseController
{
    /** @var  TaskGroupRepository */
    private $taskGroupRepository;
    private $taskRepository;

    public function __construct(TaskGroupRepository $taskGroupRepo, TaskRepository $taskRepo)
    {
        $this->taskGroupRepository = $taskGroupRepo;
        $this->taskRepository = $taskRepo;
    }

    /**
     * Display a listing of the TaskGroup.
     *
     * @param TaskGroupDataTable $taskGroupDataTable
     * @return Response
     */
    public function index(TaskGroupDataTable $taskGroupDataTable)
    {
        return $taskGroupDataTable->render('task_groups.index');
    }

    /**
     * Show the form for creating a new TaskGroup.
     *
     * @return Response
     */
    public function create()
    {
        $type_service_list = TypeService::all()->sortBy('name')->pluck('name', 'id');

        return view('task_groups.create')->with('type_service_list', $type_service_list);
    }

    /**
     * Store a newly created TaskGroup in storage.
     *
     * @param CreateTaskGroupRequest $request
     *
     * @return Response
     */
    public function store(CreateTaskGroupRequest $request)
    {
        $input = $request->all();

        $taskGroup = $this->taskGroupRepository->create($input);

        $tasks = $request->get('tasks');

        if (isset($tasks) && isset($taskGroup->id)) {
            $taskGroup->tasks()->delete();
            foreach ($tasks as $task) {
                $taskGroup->tasks()->create($task);
            }
        }

        Flash::success('Task Group saved successfully.');

        return redirect(route('taskGroups.index'));
    }

    /**
     * Display the specified TaskGroup.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $taskGroup = $this->taskGroupRepository->find($id);

        if (empty($taskGroup)) {
            Flash::error('Task Group not found');

            return redirect(route('taskGroups.index'));
        }

        return view('task_groups.show')->with('taskGroup', $taskGroup);
    }

    /**
     * Show the form for editing the specified TaskGroup.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $taskGroup = $this->taskGroupRepository->find($id);

        if (empty($taskGroup)) {
            Flash::error('Task Group not found');

            return redirect(route('taskGroups.index'));
        }

        $type_service_list = TypeService::all()->sortBy('name')->pluck('name', 'id');
        return view('task_groups.edit')->with('taskGroup', $taskGroup)->with('type_service_list', $type_service_list);
    }

    /**
     * Update the specified TaskGroup in storage.
     *
     * @param  int              $id
     * @param UpdateTaskGroupRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTaskGroupRequest $request)
    {
        $taskGroup = $this->taskGroupRepository->find($id);

        if (empty($taskGroup)) {
            Flash::error('Task Group not found');

            return redirect(route('taskGroups.index'));
        }

        $taskGroup = $this->taskGroupRepository->update($request->all(), $id);

        $tasks = $request->get('tasks');

        if (isset($tasks) && isset($taskGroup->id)) {
            $taskGroup->tasks()->delete();
            foreach ($tasks as $task) {
                $taskGroup->tasks()->create($task);
            }
        }

        Flash::success('Task Group updated successfully.');

        return redirect(route('taskGroups.index'));
    }

    /**
     * Remove the specified TaskGroup from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $taskGroup = $this->taskGroupRepository->find($id);

        if (empty($taskGroup)) {
            Flash::error('Task Group not found');

            return redirect(route('taskGroups.index'));
        }

        $this->taskGroupRepository->delete($id);

        Flash::success('Task Group deleted successfully.');

        return redirect(route('taskGroups.index'));
    }
}
