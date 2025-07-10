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
        // Get all list of user accounts
        $data['users']      = User::get();

        // Get all list of gender
        $data['gender']     = Gender::get();

        // Get all list of salary
        $data['salary']     = Salary::get();

        // Get all list of registered employee
        $data['employees']  = employees::with('Users', 'Gender', 'Salary')
            ->paginate(10);

        return view('modules.employees.employee-list', $data);
    }

    public function addEmployees(Request $request)
    {
        $employee_id        = null;
        $userid             = $request->{'name'};
        $contact_number     = $request->{'contact-number'};
        $gender             = $request->{'gender'};
        $salary             = $request->{'salary'};
        $province           = $request->{'province'};
        $municipality       = $request->{'municipality'};
        $barangay           = $request->{'barangay'};
        $complete_address   = $request->{'complete-address'};
        $action             = 'Create';

        $create_employee    = employees::doEmployee($employee_id, $userid, $contact_number, $gender, $salary, $province, $municipality, $barangay, $complete_address, $action);

        return response()->json($create_employee);
    }

    public function editEmployees(Request $request)
    {


        // Get all list of gender
        $data['gender']     = Gender::get();

        // Get all list of salary
        $data['salary']     = Salary::get();

        $data['employee']   = employees::where('EmployeeID', $request->id)
            ->first();

        return view('modules.employees.modals.edit-employee-modal', $data);
    }

    public function editEmployeesproc(Request $request)
    {

        $employee_id        = $request->{'employee-id'};
        $userid             = null;
        $contact_number     = $request->{'contact-number'};
        $gender             = $request->{'gender'};
        $salary             = $request->{'salary'};
        $province           = $request->{'province'};
        $municipality       = $request->{'municipality'};
        $barangay           = $request->{'barangay'};
        $complete_address   = $request->{'complete-address'};
        $action             = 'Update';

        $edit_employee      = employees::doEmployee($employee_id, $userid, $contact_number, $gender, $salary, $province, $municipality, $barangay, $complete_address, $action);

        return response()->json($edit_employee);
    }
}
