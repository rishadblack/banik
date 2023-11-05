<?php

namespace App\Pages\Backend\Order\Datatable;


use App\Models\Order\Order;
use App\Models\order\SaleReturn;
use App\Http\Common\DataTableComponent;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Http\Common\LaravelLivewireTables\LinkColumn;
use App\Http\Common\LaravelLivewireTables\TextFilter;
use App\Http\Common\LaravelLivewireTables\ButtonGroupColumn;

class SalesReturnTable extends DataTableComponent
{
    protected $index = 0;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        // $this->setAdditionalSelects(['users.id as id']);
        $this->setSearchPlaceholder('Enter Search Biller');
        $this->setSearchDebounce(1000);
    }

    public function builder(): Builder
    {
        return Order::query()
        ->where('type',2);
    }
    public function filters(): array
    {
        return [
            TextFilter::make('Code')
                ->config([
                    'placeholder' => 'Search Code',
                    'maxlength' => '25',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('orders.name', 'like', '%' . $value . '%');
                }),
        ];
    }

    public function columns(): array
    {

        return [
            Column::make('Id', 'id')
                ->format(fn() => ++$this->index +  ($this->getPage() - 1) * $this->perPage)
                ->sortable()
                ->searchable()
                ->excludeFromColumnSelect(),
                Column::make('Purchase Code', 'code')
                ->sortable()
                ->searchable(),

                Column::make('Warehouse', 'warehouse_id')
                ->format(
                    fn($value, $row, Column $column) => $value ? $value : '-'
                )
                ->sortable()
                ->searchable(),
                Column::make('outlet', 'outlet_id')
                ->format(
                    fn($value, $row, Column $column) => $value ? $value : '-'
                )
                ->sortable()
                ->searchable(),
                Column::make('Discount', 'discount_amount')

                ->sortable()
                ->searchable()
                ->deselected(),
            Column::make('Create BY', 'User.name')
                ->format(
                    fn($value, $row, Column $column) => $value ? $value : '-'
                )
                ->eagerLoadRelations()
                ->sortable()
                ->searchable()
                ->deselected(),
           Column::make('Payment Status', 'payment_status')
                ->format(
                    fn($value, $row, Column $column) => $value ? '<span class="badge bg-primary text-primary-800 bg-opacity-25 px-2 pt-5px pb-5px rounded fs-12px d-inline-flex align-items-center">' . config("status.delivery_status.{$value}.name") . '</span>' : ''
                )->sortable()->html(),
           Column::make('Delivery Status', 'delivery_status')
                ->format(
                    fn($value, $row, Column $column) => $value ? '<span class="badge bg-danger text-danger-800 bg-opacity-25 px-2 pt-5px pb-5px rounded fs-12px d-inline-flex align-items-center">' . config("status.delivery_status.{$value}.name") . '</span>' : ''
                )->sortable()->html(),
            ButtonGroupColumn::make("Actions")
                ->buttons([
                    LinkColumn::make('Edit')
                        ->title(fn($row) => 'Edit')
                        ->location(fn($row) => route('backend.order.salesreturn_details', ['sale_id' => $row->id]))
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
                                'data-listener' => 'salereturnDelete',
                                'class' => 'badge bg-danger me-1 p-2 ',
                                'icon' => 'fa fa-trash',
                                'title' => 'Delete',

                            ];
                        }),
                ]),
            ];

    }

}
