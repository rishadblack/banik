<?php

namespace App\Pages\Backend\Accounting\Datatable;


use App\Models\Accounting\MakePayment;
use App\Http\Common\DataTableComponent;
use App\Models\Inventory\StockAdjustment;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Http\Common\LaravelLivewireTables\LinkColumn;
use App\Http\Common\LaravelLivewireTables\TextFilter;
use App\Http\Common\LaravelLivewireTables\ButtonGroupColumn;

class PaymentTable extends DataTableComponent
{
    protected $index = 0;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchPlaceholder('Enter Search Payment');
        $this->setSearchDebounce(1000);
    }

    public function builder(): Builder
    {
        return MakePayment::query();
    }
    public function filters(): array
    {
        return [
            TextFilter::make('Name')
                ->config([
                    'placeholder' => 'Search Name',
                    'maxlength' => '25',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('make-payments.name', 'like', '%' . $value . '%');
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

                Column::make('Code', 'payment_code')
                ->sortable()
                ->searchable(),
                Column::make('Particular', 'particular')
                ->sortable()
                ->searchable(),
                Column::make('Amount', 'cost_price')
                ->sortable()
                ->searchable(),
                Column::make('Outlet', 'outlet')
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
            Column::make('Status', 'stock_adjustment_status')
                ->format(
                    fn($value, $row, Column $column) => $value ? '<span class="badge text-bg-' . config("status.delivery_status.{$value}.class") . '">' . config("status.delivery_status.{$value}.name") . '</span>' : ''
                )->sortable()->html(),
            ButtonGroupColumn::make("Actions")
                ->buttons([
                    LinkColumn::make('Edit')
                        ->title(fn($row) => 'Edit')
                        ->location(fn($row) => route('backend.accounting.new_payment', ['payment_id' => $row->id]))
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
                                'data-listener' => 'paymentDelete',
                                'class' => 'badge bg-danger me-1 p-2 ',
                                'icon' => 'fa fa-trash',
                                'title' => 'Delete',

                            ];
                        }),
                ]),
        ];

    }

}
