<?php

namespace App\Http\Controllers\Modules\Maintenance\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRole;

class UserRolesController extends Controller
{
    public function index()
    {
        $data['roles'] = UserRole::paginate(10);

        return view('modules.maintenance.roles.user_roles', $data);
    }

    public function addRole(Request $request)
    {
        $role_id        = null;
        $role           = $request->{'role'};
        $action         = 'Create';

        $add_user_role = UserRole::UserRole($role_id, $role, $action);

        return response()->json($add_user_role);
    }

    public function editRole(Request $request)
    {
        $data['role'] = UserRole::where('RoleID', $request->id)
            ->first();

        return view('modules.maintenance.roles.modals.edit-role-modal', $data);
    }

    public function editRoleProc(Request $request)
    {
        $role_id        = $request->{'role-id'};
        $role           = $request->{'edit-role'};
        $action         = 'Update';

        $edit_user_role = UserRole::UserRole($role_id, $role, $action);

        return response()->json($edit_user_role);
    }

    public function deleteRole(Request $request)
    {
        $data['role'] = UserRole::where('RoleID', $request->id)
            ->first();

        return view('modules.maintenance.roles.modals.delete-role-modal', $data);
    }

    public function deleteRoleProc(Request $request)
    {
        $role_id        = $request->{'role-id'};
        $role           = null;
        $action         = 'Delete';

        $delete_user_role = UserRole::UserRole($role_id, $role, $action);

        return response()->json($delete_user_role);
    }
}
