<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class SetupController extends Controller
{
    public function index()
    {
        return view('setup');
    }

    public function store(Request $request)
    {
        $request->validate([
            'db-host' => 'required|string',
            'db-port' => 'required|numeric',
            'db-name' => 'required|string',
            'db-username' => 'required|string',
            'password' => 'nullable|string',
        ]);

        // Update the .env file with new DB credentials and app installed flag
        $this->setEnvironmentValue([
            'DB_HOST' => $request->input('db-host'),
            'DB_PORT' => $request->input('db-port'),
            'DB_DATABASE' => $request->input('db-name'),
            'DB_USERNAME' => $request->input('db-username'),
            'DB_PASSWORD' => $request->input('password') ?? '',
            'APP_INSTALLED' => 'true',
        ]);

        // Clear cached config so Laravel picks up new .env values
        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        // Update runtime config immediately for the current request
        config([
            'database.connections.mysql-no-db' => [
                'driver' => 'mysql',
                'host' => $request->input('db-host'),
                'port' => $request->input('db-port'),
                'database' => null, // NO database selected
                'username' => $request->input('db-username'),
                'password' => $request->input('password') ?? '',
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'strict' => true,
                'engine' => null,
            ],
        ]);

        DB::purge('mysql-no-db');
        DB::reconnect('mysql-no-db');

        try {
            DB::connection('mysql-no-db')->statement("CREATE DATABASE IF NOT EXISTS `" . $request->input('db-name') . "`");
        } catch (\Exception $e) {
            return back()->withErrors(['db_error' => 'Database creation failed: ' . $e->getMessage()]);
        }

        // Run migrations forcefully


        // Redirect to login page
        return redirect()->to('/login');
    }

    protected function setEnvironmentValue(array $values)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        foreach ($values as $envKey => $envValue) {
            $envValue = str_replace('\\', '\\\\', $envValue); // Escape backslashes
            // Don't strip spaces inside passwords or names
            // Wrap value with quotes to preserve spaces
            $envValue = trim($envValue);

            if (preg_match("/^{$envKey}=.*$/m", $str)) {
                // Replace existing entry
                $str = preg_replace("/^{$envKey}=.*$/m", "{$envKey}=\"{$envValue}\"", $str);
            } else {
                // Append new entry
                $str .= "\n{$envKey}=\"{$envValue}\"";
            }
        }

        file_put_contents($envFile, $str);
    }
}
