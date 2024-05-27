<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Your Model

/**
 * Class StaffRepository.
 */
class StaffRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function search(Request $request)
    {
        // dd($request->all());
        $columns = [
            'staffs.name' => 'Staff Name',
            'staffs.email' => 'Staff Email',
            'roles.name' => 'Role Name'
        ];
        // dd($columns);

        $query = DB::table('staffs')
            ->join('roles', 'roles.id', '=', 'staffs.role_id');

        if (!empty($request->search)) {
            $search = $request->search;
            $query->where(function ($subQuery) use ($columns, $search) {
                foreach ($columns as $column => $label) {
                    $subQuery->orWhere($column, 'LIKE', '%' . $search . '%');
                }
            });
        }

        $stafflist = $query
            ->select('staffs.*', 'roles.name as rolename')
            ->paginate(1);
        return view('admin.staffs.stafflist', compact('stafflist'));
    }
}
