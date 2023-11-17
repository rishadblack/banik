<?php

namespace App\Pages\Backend\Order\Datatable;


use App\Models\Accounting\Transaction;
use App\Http\Common\DataTableComponent;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Http\Common\LaravelLivewireTables\LinkColumn;
use App\Http\Common\LaravelLivewireTables\TextFilter;
use App\Http\Common\LaravelLivewireTables\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class SalesPaymentTable extends DataTableComponent
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
        return Transaction::query();
    }
    public function filters(): array
    {
        return [

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
            Column::make('SL', 'id')
                ->format(fn () => ++$this->index +  ($this->getPage() - 1) * $this->perPage)
                ->sortable()
                ->searchable()
                ->excludeFromColumnSelect(),

            Column::make('Patment Method', 'PaymentMethod.name')
                ->format(
                    fn ($value, $row, Column $column) => $value ? $value : '-'
                )
                ->sortable()
                ->searchable(),
            Column::make('Amount', 'net_amount')
                ->format(
                    fn ($value, $row, Column $column) => $value ? $value : '-'
                )
                ->sortable()
                ->searchable(),
            Column::make('Charge', 'charge')

                ->sortable()
                ->searchable()
                ->deselected(),
            Column::make('Date', 'txn_date')

                ->sortable()
                ->searchable(),
            Column::make('Create By', 'User.name')
                ->format(
                    fn ($value, $row, Column $column) => $value ? $value : '-'
                )
                ->eagerLoadRelations()
                ->sortable()
                ->searchable()
                ->deselected(),

            ButtonGroupColumn::make("Actions")
                ->buttons([

                    LinkColumn::make(' Delete')
                        ->title(fn ($row) => 'Delete')
                        ->location(fn ($row) => 'javascript:void(0)')
                        ->attributes(function ($row) {
                            return [
                                'data-id' => $row->id,
                                'data-listener' => 'salesPaymentDelete',
                                'class' => 'badge bg-danger me-1 p-2 ',
                                'icon' => 'fa fa-trash',
                                'title' => 'Delete',

                            ];
                        }),
                ]),
        ];
    }
}
