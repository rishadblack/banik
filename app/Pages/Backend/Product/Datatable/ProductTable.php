<?php

namespace App\Pages\Backend\Product\Datatable;

use App\Models\Product\Product;
use App\Http\Common\DataTableComponent;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Http\Common\LaravelLivewireTables\LinkColumn;
use App\Http\Common\LaravelLivewireTables\TextFilter;
use App\Http\Common\LaravelLivewireTables\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class ProductTable extends DataTableComponent
{
    protected $index = 0;
    public $alwaysShowBulkActions = true;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setAdditionalSelects(['products.id as id']);
        $this->setSearchPlaceholder('Enter Search Product');
        $this->setSearchDebounce(1000);
        $this->setFilterLayoutSlideDown();
        $this->setTheadAttributes([
            'default' => true,
            'class' => 'custom-dt-thead',
          ]);
    }

    public array $bulkActions = [
        'export' => 'Excel',
        'export("pdf")' => 'PDF',
    ];

    public function exportConfigure(): void
    {
        $exportHeaders = [];
        // if($this->getAppliedFilterWithValue('districts')) {
        //     $exportHeaders = array_merge($exportHeaders, [
        //         'District : ' . District::find($this->getAppliedFilterWithValue('districts'))->name,
        //     ]);
        // }

        $this->setExportHeaders($exportHeaders);
        $this->setExportTitle('Product List');
        $this->setExportPrimaryKey('products.id');
        // $this->setExportPdfLocation('core::vesselinfo_pdf');
    }

    public function builder(): Builder
    {
        return Product::query();
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
                    $builder->where('products.name', 'like', '%' . $value . '%');
                }),
            SelectFilter::make('Status')
                ->options(filterOption('status.common'))
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('products.status',$value);
                }),
        ];
    }
    public function columns(): array
    {
        return [
            Column::make('SN', 'id')
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

            Column::make('Create BY', 'User.name')
                ->format(
                    fn($value, $row, Column $column) => $value ? $value : '-'
                )
                ->eagerLoadRelations()
                ->sortable()
                ->searchable()
                ->deselected(),
            Column::make('Product Brand', 'Brand.name')
                ->sortable()
                ->searchable(),
            Column::make('Product Category', 'Category.name')
                ->sortable()
                ->searchable(),
            Column::make('Product Unit', 'Unit.name')
                ->sortable()
                ->searchable(),
            Column::make('Profit Margin', 'profit_margin')
                ->sortable()
                ->searchable()
                ->deselected(),
                Column::make('Status', 'status')
                ->format(
                    fn($value, $row, Column $column) => $value ? '<span class="badge text-bg-' . config("status.common.{$value}.class") . '">' . config("status.common.{$value}.name") . '</span>' : ''
                )->sortable()->html(),
            ButtonGroupColumn::make("Actions")
                ->buttons([
                    LinkColumn::make('Edit')
                        ->title(fn($row) => 'Edit')
                        ->location(fn($row) => route('backend.product.product_details', ['product_id' => $row->id]))
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
                                'data-listener' => 'productDelete',
                                'class' => 'badge bg-danger me-1 p-2 ',
                                'icon' => 'fa fa-trash',
                                'title' => 'Delete',

                            ];
                        }),
                ]),
        ];
    }
}
