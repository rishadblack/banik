<?php

namespace App\Pages\Backend\Order\Datatable;

use App\Models\Order\Order;
use App\Models\Order\Purchase;
use App\Models\Contact\Supplier;
use App\Http\Common\DataTableComponent;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Http\Common\LaravelLivewireTables\LinkColumn;
use App\Http\Common\LaravelLivewireTables\TextFilter;
use App\Http\Common\LaravelLivewireTables\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class PurchaseTable extends DataTableComponent
{
    protected $index = 0;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        // $this->setAdditionalSelects(['users.id as id']);
        $this->setSearchPlaceholder('Enter Search Biller');
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
            ->where('type', 3);
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
                    $builder->where('orders.code', 'like', '%' . $value . '%');
                }),

            SelectFilter::make('Status')
                ->options(filterOption('status.common'))
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('brands.status',$value);
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

            Column::make('Warehouse', 'Warehouse.name')
                ->format(
                    fn ($value, $row, Column $column) => $value ? $value : '-'
                )
                ->sortable()
                ->searchable(),
            Column::make('outlet', 'Outlet.name')
                ->format(
                    fn ($value, $row, Column $column) => $value ? $value : '-'
                )
                ->eagerLoadRelations()
                ->sortable()
                ->searchable(),
            Column::make('Discount', 'discount_amount')
            ->format(
                fn ($value, $row, Column $column) => $value ? numberFormat($value, True) : '-'
            )
                ->sortable()
                ->searchable()
                ->deselected(),
            // Column::make('Quantity', 'OrderItem.quantity')

            //     ->sortable()
            //     ->searchable()
            //     ->deselected(),
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
            Column::make('Delivery Status', 'delivery_status')
                ->format(
                    fn ($value, $row, Column $column) => $value ? '<span class="badge bg-danger text-danger-800 bg-opacity-25 px-2 pt-5px pb-5px rounded fs-12px d-inline-flex align-items-center"><i
                    class="fa fa-circle text-danger fs-9px fa-fw me-5px"></i>' . config("status.delivery_status.{$value}.name") . '</span>' : ''
                )->sortable()->html(),
            ButtonGroupColumn::make("Actions")
                ->buttons([
                    LinkColumn::make('Edit')
                        ->title(fn ($row) => 'Edit')
                        ->location(fn ($row) => route('backend.order.purchase_details', ['purchase_id' => $row->id]))
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
                        ->location(fn ($row) => route('invoice.purchase',['id' => $row->id]))
                        ->attributes(function ($row) {
                            return [
                                'data-id' => $row->id,
                                'class' => 'badge bg-warning me-1 p-2 ',
                                'icon' => 'fa fa-print',
                                'title' => 'Print',

                            ];
                        }),
                    LinkColumn::make(' Delete')
                        ->title(fn ($row) => 'Delete')
                        ->location(fn ($row) => 'javascript:void(0)')
                        ->attributes(function ($row) {
                            return [
                                'data-id' => $row->id,
                                'data-listener' => 'purchaseDelete',
                                'class' => 'badge bg-danger me-1 p-2 ',
                                'icon' => 'fa fa-trash',
                                'title' => 'Delete',

                            ];
                        }),
                ]),
        ];
    }
}
