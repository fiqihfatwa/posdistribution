<?php

namespace App\DataTables;

use App\Models\License;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Support\Facades\Auth;

use Request;

class MyLicenseDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'my_license.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\License $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(License $model)
    {
        if(Request::route()->getName() == 'mylicense.sold')
            return $model->newQuery()->where('user_id', Auth::user()->id)->where('sold_in', '!=', 0);
        else
            return $model->newQuery()->where('user_id', Auth::user()->id)->where('sold_in', 0);
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
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    // ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
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
        if(Request::route()->getName() == 'mylicense.sold') {
            return [
                'license_key',
                'sold_in' => ['data' => 'transaction.transaction_number'],
            ];
        }
        else {
            return [
                'license_key',
            ];
        }

    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'licensesdatatable_' . time();
    }
}
