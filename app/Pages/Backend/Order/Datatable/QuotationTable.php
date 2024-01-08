<?php

namespace App\Pages\Backend\Order\Datatable;

use App\Models\Order\Order;
use App\Http\Common\DataTableComponent;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Http\Common\LaravelLivewireTables\LinkColumn;
use App\Http\Common\LaravelLivewireTables\TextFilter;
use App\Http\Common\LaravelLivewireTables\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class QuotationTable extends DataTableComponent
{
    protected $index = 0;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        // $this->setAdditionalSelects(['users.id as id']);
        $this->setSearchPlaceholder('Enter Search Sales');
        $this->setSearchDebounce(1000);
        $this->setFilterLayoutSlideDown();
        $this->setTheadAttributes([
            'default' => true,
            'class' => 'custom-dt-thead',
          ]);
    }

    public function builder(): Builder
    {
        return Order::query()
        ->where('type',5);
    }
    public function filters(): array
    {
        return [

            SelectFilter::make('Status')
                ->options(filterOption('status.common'))
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('orders.status',$value);
                }),
        ];
    }
    public function columns(): array
    {

        return [
            Column::make('Id', 'id')
            ->format(fn () => ++$this->index +  ($this->getPage() - 1) * $this->perPage)
            ->sortable()
            ->searchable()
            ->excludeFromColumnSelect(),
            Column::make('Purchase Code', 'code')
            ->sortable()
            ->searchable(),

            Column::make('Customer Name', 'contactinfo.name')
            ->format(
                fn ($value, $row, Column $column) => $value ? $value : '-'
            )
            ->sortable()
            ->searchable(),
        Column::make('Contact', 'contactinfo.mobile')
            ->format(
                fn ($value, $row, Column $column) => $value ? $value : '-'
            )
            ->sortable()
            ->searchable(),
            Column::make('Sales Person', 'sales_person')
            ->sortable()
            ->searchable(),

        Column::make('Warehouse', 'Warehouse.name')
            ->format(
                fn ($value, $row, Column $column) => $value ? $value : '-'
            )
            ->sortable()
            ->searchable()
            ->deselected(),
        Column::make('Outlet', 'Outlet.name')
            ->format(
                fn ($value, $row, Column $column) => $value ? $value : '-'
            )
            ->eagerLoadRelations()
            ->sortable()
            ->searchable()
            ->deselected(),
        Column::make('Discount', 'discount')
        ->format(
            fn ($value, $row, Column $column) => $value ? numberFormat($value, True) : '-'
        )
            ->sortable()
            ->searchable()
            ->deselected()
            ->deselected(),
        Column::make('Total Amount', 'net_amount')
        ->format(
            fn ($value, $row, Column $column) => $value ? numberFormat($value, True) : '-'
        )
            ->sortable()
            ->searchable(),
        // Column::make('Paid Amount', 'paid_amount')
        // ->format(
        //     fn ($value, $row, Column $column) => $value ? numberFormat($value, True) : '-'
        // )
        //     ->sortable()
        //     ->searchable(),
        // Column::make('Due Amount', 'due_amount')
        // ->format(
        //     fn ($value, $row, Column $column) => $value ? numberFormat($value, True) : '-'
        // )
        //     ->sortable()
        //     ->searchable(),

        Column::make('Create BY', 'User.name')
            ->format(
                fn ($value, $row, Column $column) => $value ? $value : '-'
            )
            ->eagerLoadRelations()
            ->sortable()
            ->searchable()
            ->deselected(),
            Column::make('Status', 'status')
            ->format(
                fn ($value, $row, Column $column) => $value ? '<span class="badge text-bg-' . config("status.common.{$value}.class") . '">' . config("status.common.{$value}.name") . '</span>' : ''
            )->sortable()->html(),
            ButtonGroupColumn::make("Actions")
                ->buttons([
                    LinkColumn::make('Edit')
                        ->title(fn($row) => 'Edit')
                        ->location(fn($row) => route('backend.order.quotation_details', ['sale_id' => $row->id]))
                        ->attributes(function ($row) {
                            return [
                                'data-id' => $row->id,
                                'class' => 'badge bg-success me-1 p-2 ',
                                'icon' => 'fa fa-edit',
                                'title' => 'Edit',

                            ];
                        }),
                    LinkColumn::make(' Delete')
                        ->title(fn($row) => 'Delete')
                        ->location(fn($row) => 'javascript:void(0)')
                        ->attributes(function ($row) {
                            return [
                                'data-id' => $row->id,
                                'data-listener' => 'quotationDelete',
                                'class' => 'badge bg-danger me-1 p-2 ',
                                'icon' => 'fa fa-trash',
                                'title' => 'Delete',

                            ];
                        }),
                ]),
            ];

    }

}
