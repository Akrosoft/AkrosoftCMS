<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function index() {
        return view('configuration.welcome');
    }

    public function initialConfiguration(Request $request) {
        if ($request->ajax()) {
       
            changeEnvironmentVariable('DB_CONNECTION', $request->formData['connection']);
            changeEnvironmentVariable('DB_HOST', $request->formData['host']);
            changeEnvironmentVariable('DB_PORT', $request->formData['port']);
            changeEnvironmentVariable('DB_DATABASE', $request->formData['database']);
            changeEnvironmentVariable('DB_USERNAME', $request->formData['db_admin']);
            changeEnvironmentVariable('DB_PASSWORD', $request->formData['db_password']);

            /*
            Need to find a way to restart application to update app environment data...
            */
            return response()->json([
                'status' => true
            ]);
        }
    }

    public function testDBConnection(Request $request) {
        if ($request->ajax()) {
            $config = [
                'host' => $request->formData['host'],
                'username' => $request->formData['username'],
                'password' => $request->formData['password'],
                'database' => $request->formData['database']
            ];
            return testDBConnectivity($config);
        }
    }

    public static function getDatabaseServerInstallationStatus() {
        return false;
    }

    public static function getDotEnvFileStatus() {
        return false;
    }

    public static function getSiteFileStatus() {
        return false;
    }

    public static function getOSInformation() {
        return false;
    }

    public static function getOSCommand($OSType) {

        $OSCommandSet = null;

        switch($OSType) {
            case 'Windows':
                $OSCommandSet = 'Windows';
                break;
            
            case 'Linux':
                $OSCommandSet = 'Linux';
                break;

            case 'Mac':
                $OSCommandSet = 'Mac OS';
                break; 

            default:
                $OSCommandSet = null;
        }

        return $OSCommandSet;
    }
}
