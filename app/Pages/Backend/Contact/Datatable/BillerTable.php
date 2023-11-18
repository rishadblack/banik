<?php

namespace App\Pages\Backend\Contact\Datatable;


use App\Models\Contact\Contact;
use App\Http\Common\DataTableComponent;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Http\Common\LaravelLivewireTables\LinkColumn;
use App\Http\Common\LaravelLivewireTables\TextFilter;
use App\Http\Common\LaravelLivewireTables\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class BillerTable extends DataTableComponent
{
    protected $index = 0;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
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
        return Contact::query()
            ->where('type', 3);
    }
    public function filters(): array
    {
        return [
            TextFilter::make('Company Name')
                ->config([
                    'placeholder' => 'Search Company Name',
                    'maxlength' => '25',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('contacts.company_name', 'like', '%' . $value . '%');
                }),
            SelectFilter::make('Status')
                ->options(filterOption('status.common'))
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('contacts.status', $value);
                }),
        ];
    }
    public function columns(): array
    {
        return [
            Column::make('SN', 'id')
                ->format(fn () => ++$this->index +  ($this->getPage() - 1) * $this->perPage)
                ->sortable()
                ->searchable()
                ->excludeFromColumnSelect(),
            Column::make('Code', 'code')
                ->sortable()
                ->searchable(),
                Column::make('Biller Name', 'ContactInfo.name')
                ->eagerLoadRelations()
                ->sortable()
                ->searchable(),
            Column::make('Mobile', 'mobile')
                ->sortable()
                ->searchable()
                ->deselected(),
            Column::make('Address', 'address')
                ->sortable()
                ->searchable(),
            Column::make('Opening Balance', 'opening_balance')
                ->format(
                    fn ($value, $row, Column $column) => $value ? numberFormat($value, True) : '-'
                )
                ->sortable()
                ->searchable()
                ->deselected(),
            Column::make('Create BY', 'User.name')
                ->format(
                    fn ($value, $row, Column $column) => $value ? $value : '-'
                )
                ->eagerLoadRelations()
                ->sortable()
                ->searchable(),
            Column::make('Status', 'status')
                ->format(
                    fn ($value, $row, Column $column) => $value ? '<span class="badge text-bg-' . config("status.common.{$value}.class") . '">' . config("status.common.{$value}.name") . '</span>' : ''
                )->sortable()->html(),
            ButtonGroupColumn::make("Actions")
                ->buttons([
                    LinkColumn::make('Edit')
                        ->title(fn ($row) => 'Edit')
                        ->location(fn ($row) => route('backend.contact.biller_details', ['biller_id' => $row->id]))
                        ->attributes(function ($row) {
                            return [
                                'data-id' => $row->id,
                                'class' => 'badge bg-success me-1 p-2 ',
                                'icon' => 'fa fa-edit',
                                'title' => 'Edit',

                            ];
                        }),
                    LinkColumn::make(' Delete')
                        ->title(fn ($row) => 'Delete')
                        ->location(fn ($row) => 'javascript:void(0)')
                        ->attributes(function ($row) {
                            return [
                                'data-id' => $row->id,
                                'data-listener' => 'billerDelete',
                                'class' => 'badge bg-danger me-1 p-2 ',
                                'icon' => 'fa fa-trash',
                                'title' => 'Delete',

                            ];
                        }),
                ]),
        ];
    }
}
