<?php

namespace App\Http\Controllers\Authenticate;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index()
    {
        try {
            // Run migrations forcefully
            $exitCode = Artisan::call('migrate', ['--force' => true]);

            if ($exitCode !== 0) {
                // Migration failed, get the output for more info
                $output = Artisan::output();
                Log::error('Migration failed with exit code ' . $exitCode . ': ' . $output);

                // Instead of return back() which may fail, you can return a view with error
                return view('authenticate.login');
            }
        } catch (\Exception $e) {
            Log::error('Migration Exception: ' . $e->getMessage());
            return view('authenticate.login');
        }

        // Migration succeeded, show login view
        return view('authenticate.login');
    }

    public function authenticate(Request $request)
    {
        $username       = $request->{'username'};
        $password       = $request->{'password'};
        $currentDateTime    = Carbon::now();

        $login = UserModel::where('Username', $username)->first();

        if ($login && Hash::check($password, $login->Password)) {
            if ($login->AcountStatus == 0) { // If accpount is in active
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Your account is not active yet. Kindly please wait.'
                ]);
            } else {

                if ($login->PasswordExpiration <  $currentDateTime) { // If password is expired
                    return response()->json([
                        'status' => 'warning',
                        'message' => 'Your password is expired. Kindly update your password.'
                    ]);
                }
            }

            Auth::login($login);
            return response()->json([
                'status' => 'success',
                'intendedUrl' => route('dashboard')
            ]);
        }

        return response()->json([
            'status' => 'warning',
            'message' => 'Unknown credentials.'
        ]);
    }

    public function forgotPassword()
    {
        return view("authenticate.forgot_password");
    }

    public function resetPassword(Request $request)
    {
        $action                 = 1; // forgot password action
        $username               = $request->{'username'};
        $current_password       = $request->{'current-passowrd'};
        $new_password           = Hash::make($request->{'new-password'});

        $forgot_password = UserModel::userAccounts(
            null,
            $username,
            $current_password,
            $new_password,
            null,
            null,
            null,
            null,
            null,
            $action
        );

        return response()->json($forgot_password);
    }

    public function registration()
    {
        return view("authenticate.registration");
    }

    public function registereUser(Request $request)
    {
        $username       = $request->{'username'};
        $password       = Hash::make($request->{'password'});
        $fname          = $request->{'firstname'};
        $mname          = $request->{'middlename'};
        $lname          = $request->{'lastname'};
        $birthday       = $request->{'birthday'};
        $cellphone      = "+63" . $request->{'cellphone-number'};
        $action         = 0;

        $registerUser = UserModel::userAccounts(null, $username, $password, null, $fname, $mname, $lname, $birthday, $cellphone, $action);

        return response()->json($registerUser);
    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
