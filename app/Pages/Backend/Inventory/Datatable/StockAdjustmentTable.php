<?php

namespace App\Pages\Backend\Inventory\Datatable;

use App\Models\Order\Coupon;
use App\Models\Couponact\Supplier;
use App\Models\Inventory\StockReceipt;
use App\Http\Common\DataTableComponent;
use App\Models\Inventory\StockAdjustment;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Http\Common\LaravelLivewireTables\LinkColumn;
use App\Http\Common\LaravelLivewireTables\TextFilter;
use App\Http\Common\LaravelLivewireTables\ButtonGroupColumn;

class StockAdjustmentTable extends DataTableComponent
{
    protected $index = 0;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchPlaceholder('Enter Search Biller');
        $this->setSearchDebounce(1000);
    }

    public function builder(): Builder
    {
        return StockReceipt::query();
    }
    public function filters(): array
    {
        return [
            TextFilter::make('Code')
                ->config([
                    'placeholder' => 'Search code',
                    'maxlength' => '25',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('stock_adjustments.stock_adjustment_code', 'like', '%' . $value . '%');
                }),
                TextFilter::make('Status')
                ->config([
                    'placeholder' => 'Search Status',
                    'maxlength' => '25',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('stock_adjustments.stock_adjustment_status', 'like', '%' . $value . '%');
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

                Column::make('Code', 'code')
                ->sortable()
                ->searchable(),

                Column::make('Warehouse', 'warehouse_id')
                ->format(
                    fn($value, $row, Column $column) => $value ? $value : '-'
                )
                ->sortable()
                ->searchable(),
                Column::make('Quantity', 'quantity')
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

            ButtonGroupColumn::make("Actions")
                ->buttons([
                    LinkColumn::make('Edit')
                        ->title(fn($row) => 'Edit')
                        ->location(fn($row) => route('backend.inventory.stock_adjustment_details', ['stockadjustment_id' => $row->id]))
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
                                'data-listener' => 'stockAdjustmentDelete',
                                'class' => 'badge bg-danger me-1 p-2 ',
                                'icon' => 'fa fa-trash',
                                'title' => 'Delete',

                            ];
                        }),
                ]),
        ];

    }

}
