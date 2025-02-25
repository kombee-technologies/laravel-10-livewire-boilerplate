<?php

namespace App\Livewire;

use App\Livewire\User\Delete;
use App\Models\User;
use App\Traits\RefreshDataTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;
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
    use WithExport, RefreshDataTable;

    public string $sortField = 'id';
    public string $sortDirection = 'desc';

    public function header(): array
    {
        return [
            Button::add('create-user')
                ->render(function () {
                    return Blade::render(<<<HTML
                          <a href="/users/create"  class="btn btn-outline btn-light-primary" wire:navigate><i class="las la-plus fs-2 me-2"></i></a>
                    HTML);
                }),

            Button::add('bulk-delete')
                ->slot(__('<i class="las la-trash fs-2 me-2"></i> (<span x-text="window.pgBulkActions.count(\'' . $this->tableName . '\')"></span>)'))
                ->class('btn btn-outline btn-light-danger')
                ->dispatch('bulkDelete', []),
        ];
    }

    public function setUp(): array
    {
        $this->showCheckBox();
        Responsive::make();

        return [

            Exportable::make('export')
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),

            Header::make()->showSearchInput()
                ->showToggleColumns(),

            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return User::query()->where('user_type', '!=', '0');
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
            ->addColumn('first_name_lower', fn(User $model) => strtolower(e($model->first_name)))
            ->addColumn('last_name')
            ->addColumn('email')
            ->addColumn('mobile_no')
            ->addColumn('user_type')
            ->addColumn('gender_label', fn ($user) => User::genderText()->firstWhere('gender', $user->gender)['label'])
            ->addColumn('gender')
            ->addColumn('dob_formatted', fn(User $model) => Carbon::parse($model->dob)->format('d/m/Y'))
            ->addColumn('address')
            ->addColumn('country_id')
            ->addColumn('state_id')
            ->addColumn('city_id')
            ->addColumn('status', function (User $model) {
                return ($model->status ? 'Active' : 'Inactive');
            })
            ->addColumn('created_at_formatted', fn(User $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->hidden(true, false),
            Column::make('First name', 'first_name')
                ->sortable()
                ->searchable()
                ->visibleInExport(true),

            Column::make('Last name', 'last_name')
                ->sortable()
                ->searchable()
                ->visibleInExport(true),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable()
                ->visibleInExport(true),

            Column::make('Mobile no', 'mobile_no')
            //->sortable()
                ->searchable()
                ->visibleInExport(true),

            Column::add()
                ->title('Gender')
                ->field('gender_label', 'gender')
                ->visibleInExport(true),

            Column::make('Dob', 'dob_formatted', 'dob')
                ->visibleInExport(true),
            //->sortable(),

            Column::make('Address', 'address')
            //->sortable()
            //->searchable()
                ->hidden(true, false)
                ->visibleInExport(true),

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

            Column::action('Action'),
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('first_name')->operators(['contains']),
            Filter::inputText('last_name')->operators(['contains']),
            Filter::inputText('email')->operators(['contains']),
            Filter::inputText('mobile_no')->operators(['contains']),
            Filter::select('gender', 'gender')
                ->dataSource(User::genderText())
                ->optionValue('gender')
                ->optionLabel('label'),
            //Filter::datepicker('dob'),
            //Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId)
    {
        return $this->redirect('users/' . $rowId . '/edit', navigate: true); // redirect to edit component
    }

    public function actions(\App\Models\User $row): array
    {
        return [
            Button::add('edit')
                ->slot('<i class="las la-edit fs-2 me-2"></i>')
                ->id()
                ->class('btn btn-icon btn-light-warning')
                ->dispatch('edit', ['rowId' => $row->id]),

            Button::add('delete-user')
                ->slot('<i class="las la-trash fs-2 me-2"></i>')
                ->class('btn btn-icon btn-light-danger')
                ->dispatchTo('user.delete', 'delete-confirmation', ['id' => $row->id]),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Bulk delete button
    |--------------------------------------------------------------------------
     */
    public function bulkDelete(): void
    {

        if (count($this->checkboxValues) == 0) {
            $this->dispatch('showAlert', type: 'warning', message: __('You must select at least one item!'), buttonColor: 'btn btn-warning');
            return;
        }
        
        $ids = implode(',', $this->checkboxValues);
        $this->dispatch('delete-confirmation', $ids)->to(Delete::class);

    }

    public function actionRules($row): array
    {
        return [];
    }
}
