<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class UsersExport implements FromCollection, WithHeadings
{
    public $usersId;
    //protected $request;

    public function __construct($usersId)
    {
        //$this->request = $request;
        $this->usersId = $usersId;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return
            User::select(
                'id',
                'first_name',
                'last_name',
                'email',
                'mobile_no',
                DB::raw('(CASE WHEN gender = "' . config('constants.user.gender_enum.0') . '" THEN "' . config('constants.user.gender.0') . '" ELSE "' . config('constants.user.gender.1') . '"  END) AS gender'),
                'dob',
                DB::raw('(SELECT name from countries WHERE id = users.country_id) AS country_name'),
                DB::raw('(SELECT name from states WHERE id = users.state_id) AS state_name'),
                DB::raw('(SELECT name from cities WHERE id = users.city_id) AS city_name'),
                'address',
                DB::raw('(CASE WHEN status = "' . config('constants.user.status_enum.0') . '" THEN "' . config('constants.user.status.0') . '" ELSE "' . config('constants.user.status.1') . '"  END) AS status')
            )->whereIn('id', $this->usersId)->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'First Name',
            'Last Name',
            'Email',
            'Mobile No',
            'Gender',
            'Date of Birth',
            'Country',
            'State',
            'City',
            'Address',
            'Status',
        ];
    }
}
