<?php

namespace App\Pages\Backend\Order\Datatable;

use App\Models\Order\Sale;
use App\Models\Order\Order;
use App\Models\Saleact\Supplier;
use App\Http\Common\DataTableComponent;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Http\Common\LaravelLivewireTables\LinkColumn;
use App\Http\Common\LaravelLivewireTables\TextFilter;
use App\Http\Common\LaravelLivewireTables\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class SaleTable extends DataTableComponent
{
    protected $index = 0;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        // $this->setAdditionalSelects(['users.id as id']);
        $this->setSearchPlaceholder('Enter Search Sales');
        $this->setSearchDebounce(1000);
        $this->setTheadAttributes([
            'default' => true,
            'class' => 'custom-dt-thead',
        ]);
    }

    public function builder(): Builder
    {
        return Order::query()
            ->where('type', 1);
    }
    public function filters(): array
    {
        return [

            SelectFilter::make('Status')
                ->options(filterOption('status.common'))
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('orders.status', $value);
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
            Column::make('Paid Amount', 'paid_amount')
            ->format(
                fn ($value, $row, Column $column) => $value ? numberFormat($value, True) : '-'
            )
                ->sortable()
                ->searchable(),
            Column::make('Due Amount', 'due_amount')
            ->format(
                fn ($value, $row, Column $column) => $value ? numberFormat($value, True) : '-'
            )
                ->sortable()
                ->searchable(),

            Column::make('Create BY', 'User.name')
                ->format(
                    fn ($value, $row, Column $column) => $value ? $value : '-'
                )
                ->eagerLoadRelations()
                ->sortable()
                ->searchable()
                ->deselected(),
            Column::make('Payment Status', 'payment_status')
                ->format(
                    fn ($value, $row, Column $column) => $value ? '<span class="badge bg-primary text-primary-800 bg-opacity-25 px-2 pt-5px pb-5px rounded fs-12px d-inline-flex align-items-center"><i
                class="fa fa-circle text-primary fs-9px fa-fw me-5px"></i>' . config("status.delivery_status.{$value}.name") . '</span>' : ''
                )->sortable()->html(),
            // Column::make('Delivery Status', 'delivery_status')
            //     ->format(
            //         fn ($value, $row, Column $column) => $value ? '<span class="badge bg-danger text-danger-800 bg-opacity-25 px-2 pt-5px pb-5px rounded fs-12px d-inline-flex align-items-center"><i
            //     class="fa fa-circle text-danger fs-9px fa-fw me-5px"></i>' . config("status.delivery_status.{$value}.name") . '</span>' : ''
            //     )->sortable()->html(),
            ButtonGroupColumn::make("Actions")
                ->buttons([
                    // LinkColumn::make('Delivery')
                    //     ->title(fn ($row) => 'Delivery')
                    //     ->location(fn ($row) => 'javascript:void(0)')
                    //     ->attributes(function ($row) {
                    //         return [
                    //             'data-id' => $row->id,
                    //             'data-listener' => 'openDeliveryModal,$order->order_id',
                    //             'class' => 'badge bg-info me-1 p-2 ',
                    //             'icon' => 'fa fa-edit',
                    //             'title' => 'Delivery',

                    //         ];
                    //     }),
                    // LinkColumn::make('Payment')
                    // ->title(fn ($row) => 'Payment')
                    // ->location(fn ($row) => 'javascript:void(0)')
                    // ->attributes(function ($row) {
                    //     return [
                    //         'data-id' => $row->id,
                    //         'data-listener' => 'openPaymentModal',
                    //         'class' => 'badge bg-success me-1 p-2 ',
                    //         'icon' => 'fa fa-edit',
                    //         'title' => 'Payment',

                    //     ];
                    // }),
                    LinkColumn::make('Edit')
                        ->title(fn ($row) => 'Edit')
                        ->location(fn ($row) => route('backend.order.sale_details', ['sale_id' => $row->id]))
                        ->attributes(function ($row) {
                            return [
                                'data-id' => $row->id,
                                'class' => 'badge bg-success me-1 p-2 ',
                                'icon' => 'fa fa-edit',
                                'title' => 'Edit',

                            ];
                        }),
                    LinkColumn::make('Print')
                        ->title(fn ($row) => 'Print')
                        ->location(fn ($row) => 'javascript:void(0)')
                        ->attributes(function ($row) {
                            return [
                                'data-id' => $row->id,
                                'data-listener' => 'print',
                                'data-url' => route('invoice.sales', ['id' => $row->id]),
                                'class' => 'badge bg-warning me-1 p-2 ',
                                'icon' => 'fa fa-print',
                                'title' => 'Print',
                                // 'target'=>"_blank",
                            ];
                        }),
                    LinkColumn::make(' Delete')
                        ->title(fn ($row) => 'Delete')
                        ->location(fn ($row) => 'javascript:void(0)')
                        ->attributes(function ($row) {
                            return [
                                'data-id' => $row->id,
                                'data-listener' => 'saleDelete',
                                'class' => 'badge bg-danger me-1 p-2 ',
                                'icon' => 'fa fa-trash',
                                'title' => 'Delete',


                            ];
                        }),
                ]),
        ];
    }
}
