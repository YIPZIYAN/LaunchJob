<?php

namespace App\Livewire\Table;

use App\Models\JobPost;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class JobPostTable extends PowerGridComponent
{
    public bool $showFilters = true;
    public bool $multiSort = true;
    public int $perPage = 10;
    public array $perPageValues = [0, 5, 10, 20, 50];
    use WithExport;

    public function setUp(): array
    {
//        $this->showCheckBox();

        return [
            Header::make()
                ->showSearchInput()
                ->showToggleColumns(),
            Footer::make()
                ->showPerPage($this->perPage, $this->perPageValues)
                ->showRecordCount(),

        ];
    }

    public function datasource(): Builder
    {
        return JobPost::query()
            ->where('company_id', '=', auth()->user()->company_id)
            ->join('job_types', 'job_posts.job_type_id', '=', 'job_types.id')
            ->select([
                'job_posts.id',
                'job_posts.name',
                'job_posts.location',
                'job_posts.period',
                'job_posts.mode',
                'job_posts.created_at',
                'job_types.name as job_type_name',
            ]);
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('location')
            ->add('period')
            ->add('type')
            ->add('mode')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable(),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),
            Column::make('Location', 'location')
                ->sortable()
                ->searchable(),
            Column::make('Mode', 'mode')
                ->sortable(),
            Column::make('Type', 'job_type_name')
                ->sortable(),
            Column::make('Period', 'period')
                ->sortable(),
            Column::make('Created at', 'created_at')
                ->sortable(),
            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(JobPost $row): array
    {
        return [
            Button::add('view')
                //->slot('Edit: ' . $row->id)
                ->slot('View')
                ->class('mr-2 pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->route('management.job-post.show', ['job_post' => $row]),
            Button::add('edit')
                //->slot('Edit: ' . $row->id)
                ->slot('Edit')
                ->class('mr-2 pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->route('management.job-post.edit', ['job_post' => $row]),
            Button::add('export')
                //->slot('Edit: ' . $row->id)
                ->slot('Export')
                ->class('mr-2 pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->route('management.download-job-xml', ['job_post' => $row]),

        ];
    }
}
