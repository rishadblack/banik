<?php

namespace App\Pages\Backend\Contact\Datatable;


use App\Models\Contact\Group;
use App\Models\Contact\ContactGroup;
use App\Http\Common\DataTableComponent;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Http\Common\LaravelLivewireTables\LinkColumn;
use App\Http\Common\LaravelLivewireTables\TextFilter;
use App\Http\Common\LaravelLivewireTables\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class GroupTable extends DataTableComponent
{
    protected $index = 0;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        // $this->setAdditionalSelects(['users.id as id']);
        $this->setSearchPlaceholder('Enter Search Group');
        $this->setSearchDebounce(1000);
        $this->setTheadAttributes([
            'default' => true,
            'class' => 'custom-dt-thead',
          ]);
    }

    public function builder(): Builder
    {
        return ContactGroup::query();
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
                    $builder->where('groups.name', 'like', '%' . $value . '%');
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

            Column::make('Name', 'name')
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
            Column::make('Status', 'status')
                ->format(
                    fn ($value, $row, Column $column) => $value ? '<span class="badge text-bg-' . config("status.common.{$value}.class") . '">' . config("status.common.{$value}.name") . '</span>' : ''
                )->html(),
            ButtonGroupColumn::make("Actions")
                ->buttons([
                    LinkColumn::make('Edit')
                        ->title(fn ($row) => 'Edit')
                        ->location(fn ($row) => route('backend.contact.group_details', ['group_id' => $row->id]))
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
                                'data-listener' => 'groupDelete',
                                'class' => 'badge bg-danger me-1 p-2 ',
                                'icon' => 'fa fa-trash',
                                'title' => 'Delete',

                            ];
                        }),
                ]),
            ];
    }
}
