<?php

namespace App\Pages\Backend\Accounting\Datatable;


use App\Http\Common\DataTableComponent;
use App\Models\Accounting\LedgerAccount;
use App\Models\Accounting\ChartOfAccount;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Http\Common\LaravelLivewireTables\LinkColumn;
use App\Http\Common\LaravelLivewireTables\TextFilter;
use App\Http\Common\LaravelLivewireTables\ButtonGroupColumn;

class ChartOfAccountTable extends DataTableComponent
{
    protected $index = 0;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchPlaceholder('Enter Search Ledger Account');
        $this->setSearchDebounce(1000);
        $this->setTheadAttributes([
            'default' => true,
            'class' => 'custom-dt-thead',
          ]);
    }

    public function builder(): Builder
    {
        return ChartOfAccount::query();
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
                    $builder->where('chart-of-accounts.ledger_code', 'like', '%' . $value . '%');
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
                Column::make('Name', 'name')
                ->sortable()
                ->searchable(),
                Column::make('Status', 'status')
                ->format(
                    fn($value, $row, Column $column) => $value ? '<span class="badge text-bg-' . config("status.common.{$value}.class") . '">' . config("status.common.{$value}.name") . '</span>' : ''
                )->sortable()->html(),

            Column::make('Create By', 'User.name')
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
                        ->location(fn($row) =>  'javascript:void(0)')
                        ->attributes(function ($row) {
                            return [
                                'data-id' => $row->id,
                                'data-listener' => 'openChartOfAccountModal',
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
                                'data-listener' => 'chartOfAccountDelete',
                                'class' => 'badge bg-danger me-1 p-2 ',
                                'icon' => 'fa fa-trash',
                                'title' => 'Delete',

                            ];
                        }),
                ]),
        ];

    }

}
