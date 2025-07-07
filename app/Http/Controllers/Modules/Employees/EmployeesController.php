<?php

namespace App\Http\Controllers\Modules\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {

        return view('modules.employees.employee-list');
    }
}
