<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\{ActionButton, WithExport};
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridColumns, Responsive};

final class DataTableUsers extends PowerGridComponent
{
    use ActionButton;
    use WithExport;

    public bool $deferLoading = true; // default false
    public string $loadingComponent = 'components.my-custom-loading';



    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            //Responsive::make(),
            Header::make()
            ->withoutLoading()
             ->showToggleColumns(),

            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),

            Footer::make()
                ->showPerPage()
                ->showRecordCount(),

        ];
    }


    public function header(): array
    {
        return [
            Button::add('bulk-delete')
                ->caption(__('Bulk delete'))
                ->class('cursor-pointer block bg-white-200 text-gray-700 border border-gray-300 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-600 dark:border-gray-500 dark:bg-gray-500 2xl:dark:placeholder-gray-300 dark:text-gray-200 dark:text-gray-300')
                ->emit('bulkDelete', []),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\User>
     */
    public function datasource(): Builder
    {
        return User::query()->where('user_type', '!=', '0');
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
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
            ->addColumn('created_at_formatted', fn (User $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
      * PowerGrid Columns.
      *
      * @return array<int, Column>
      */
    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
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

            Column::make('Gender', 'gender')
                ->sortable()
                ->searchable(),

            Column::make('Dob', 'dob_formatted', 'dob')
                ->sortable(),

            Column::make('Address', 'address')
                ->sortable()
                ->searchable(),

        ];
    }

    /**
     * PowerGrid Filters.
     *
     * @return array<int, Filter>
     */
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
           /*  Filter::datetimepicker('created_at'), */
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid User Action Buttons.
     *
     * @return array<int, Button>
     */

    /* public function actions(): array
    {
       return [
            Button::make('edit', 'Edit')
                ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
                ->route('admin.users.update', function(User $user) {
                return ['id' => $user->id];
            }),

           Button::make('destroy', 'delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->method('delete')
        ];
    } */

    /**
     * PowerGrid Dish Action Buttons.
     *
     * @return array<int, Button>
     */
    public function actions(): array
    {

        return [
            Button::make('edit', 'Edit')
                ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
                ->route('admin.users.update', function(User $user) {
                    return ['id' => $user->id];
                }),

            Button::add('destroy')
                ->caption(__('Delete'))
                ->class('bg-red-500 text-white px-3 py-2 m-1 rounded text-sm')
                ->openModal('delete-user', function(User $user) {
                    return ['userId' => $user->id, 'confirmationTitle' => 'Delete user', 'confirmationDescription' => 'Are you sure want to delete this record?'];
                }),
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid User Action Rules.
     *
     * @return array<int, RuleActions>
     */


    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($user) => $user->id === 1)
                ->hide(),

                Rule::button('destroy')
                ->when(fn ($user) => $user->id == 1)
                ->caption('Delete #1'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Event listeners
    |--------------------------------------------------------------------------
    | Add custom events to DishesTable
    |
    */
    protected function getListeners(): array
    {
        return array_merge(
            parent::getListeners(), [
                //'edit-dish' => 'editDish',
                'bulkDelete',
            ]);
    }

     /*
    |--------------------------------------------------------------------------
    |  Bulk delete button
    |--------------------------------------------------------------------------
    */
    public function bulkDelete(): void
    {
        $this->emit('openModal', 'delete-user', [
            'userIds'                 => $this->checkboxValues,
            'confirmationTitle'       => 'Delete user',
            'confirmationDescription' => 'Are you sure want to delete this record?',
        ]);
    }

}
