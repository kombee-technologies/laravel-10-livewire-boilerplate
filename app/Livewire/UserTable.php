<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Responsive;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class UserTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();
        Responsive::make();

        return [

            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),

            Header::make()->showSearchInput()
                ->showToggleColumns()
                //->withoutLoading()
                ->includeViewOnTop('components.datatable.header-top'),

            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return User::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('first_name')

           /** Example of custom column using a closure **/
            ->addColumn('first_name_lower', fn (User $model) => strtolower(e($model->first_name)))

            ->addColumn('last_name')
            ->addColumn('email')
            ->addColumn('mobile_no')
            ->addColumn('user_type')
            ->addColumn('gender')
            ->addColumn('dob_formatted', fn (User $model) => Carbon::parse($model->dob)->format('d/m/Y'))
            ->addColumn('address')
            ->addColumn('country_id')
            ->addColumn('state_id')
            ->addColumn('city_id')
            ->addColumn('status')
            ->addColumn('created_at_formatted', fn (User $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->hidden(true, false),
            Column::make('First name', 'first_name')
                ->sortable()
                ->searchable(),

            Column::make('Last name', 'last_name')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Mobile no', 'mobile_no')
                ->sortable()
                ->searchable(),

            Column::make('User type', 'user_type')
                ->sortable()
                ->searchable()
                ->hidden(true, false),

            Column::make('Gender', 'gender')
                ->sortable()
                ->searchable(),

            Column::make('Dob', 'dob_formatted', 'dob')
                ->sortable(),

            Column::make('Address', 'address')
                ->sortable()
                ->searchable()
                ->hidden(true, false),

            Column::make('Country id', 'country_id')
                ->hidden(true, false),
            Column::make('State id', 'state_id')
                ->hidden(true, false),
            Column::make('City id', 'city_id')
                ->hidden(true, false),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('first_name')->operators(['contains']),
            Filter::inputText('last_name')->operators(['contains']),
            Filter::inputText('email')->operators(['contains']),
            Filter::inputText('mobile_no')->operators(['contains']),
            Filter::inputText('user_type')->operators(['contains']),
            Filter::inputText('gender')->operators(['contains']),
            Filter::datepicker('dob'),
            Filter::inputText('address')->operators(['contains']),
            Filter::inputText('status')->operators(['contains']),
            Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(\App\Models\User $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: '.$row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
