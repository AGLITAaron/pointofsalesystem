<?php

namespace App\Http\Controllers\Modules\UserAccounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;

class UserAccountsController extends Controller
{
    public function index()
    {

        $data['users'] = UserModel::paginate(10);

        return view('modules.user.user_accounts', $data);
    }


    public function editUser(Request $request)
    {

        $data['users'] = UserModel::where('UserID', $request->id)
            ->first();

        return view('modules.user.modals.edit-user-modal', $data);
    }
}
