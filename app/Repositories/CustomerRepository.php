<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class CustomerRepository.
 */
class CustomerRepository
{
    /**
     * @return string
     *  Return the model
     */

    public function search(Request $request)
    {
        // dd($request->all());
        $columns = [
            'customers.name' => 'Customer Name',
            'customers.email' => 'Customer Email'
        ];
        // dd($columns);

        $query = DB::table('customers');
        if (!empty($request->search)) {
            $search = $request->search;
            $query->where(function ($subQuery) use ($columns, $search) {
                foreach ($columns as $column => $label) {
                    $subQuery->orWhere($column, 'LIKE', '%' . $search . '%');
                }
            });
        }

        $customerlist = $query
            ->select('customers.*')
            ->paginate(2);
        return view('admin.customers.customerlist', compact('customerlist'));
    }
}
