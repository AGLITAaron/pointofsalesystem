<?php

namespace App\Http\Controllers\Modules\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employees\employees;
use App\Models\User;
use App\Models\Maintenance\Gender;
use App\models\Maintenance\Salary;


class EmployeesController extends Controller
{
    public function index()
    {
        $data['users']      = User::get();

        $data['gender']     = Gender::get();

        $data['salary']     = Salary::get();

        $data['employees']  = employees::paginate(10);

        return view('modules.employees.employee-list', $data);
    }
}
