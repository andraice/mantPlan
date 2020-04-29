<?php

namespace App\DataTables;

use App\Models\ServiceOrder;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ServiceOrderDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        $dataTable->addColumn('id', function ($model) {
            return $model->sid;
        });
        return $dataTable->addColumn('action', 'service_orders.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ServiceOrder $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ServiceOrder $model)
    {
        return $model::with('technicalSupport')
            ->with('requestor')
            ->with('company')
            ->with('equipment')
            ->with('user');
        /*
        return $model->newQuery()
        ->with('technicalSupport')
        ->with('requestor')
        ->with('company')
        ->with('equipment')
        ->with('user');*/
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'responsive' =>true,
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'priority',
            'technical_support.name',
            'equipment.name',
            'status',
            'requestor.name',
            'company.name',
            'user.name'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'service_ordersdatatable_' . time();
    }
}
