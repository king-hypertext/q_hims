<?php

namespace App\Http\Controllers\test;

use Exception;
use App\Http\Controllers\Controller;
use App\Models\Patients;
use Illuminate\Support\Facades\Artisan;

class TestController extends Controller
{
    // public function __invoke()
    // {
    //     $test = putenv('APP_NAME=test');
    //     return getenv('APP_ENV');
    // }


    public function runMigrations()
    {
        try {
            // Run the migrations
            Artisan::call('migrate');

            // Return a success message
            return 'Migrations ran successfully.';
        } catch (Exception $e) {
            // Return an error message
            return 'Migrations failed: ' . $e->getMessage();
        }
    }

    public function test()
    {
        // Get the path of the .env file
        $path = base_path('.env');

        // Get the content of the .env file
        $content = file_get_contents($path);
        // Replace the APP_NAME value with the new value
        $content = str_replace(
            'APP_NAME=' . $_ENV['APP_NAME'],
            'APP_NAME=' . 'shell_pos_v1',
            $content
        );

        // Save the content back to the .env file
        file_put_contents($path, $content);
        // return $content;
        return Artisan::call('tinker');
        // Artisan::call('migrate:status');
    }

    function generateOrderedUID()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        function getLastUsedId()
        {
            Patients::last('opd_no');
            return 1;
        }
        // Get the last used ID from the database
        $lastId = getLastUsedId(); // Implement this function to get the last used ID

        if ($lastId == null) {
            // If there's no last used ID, start from the beginning
            $charPart = substr($characters, 0, 3);
            $numPart = substr($numbers, 0, 4);
        } else {
            $charPart = substr($lastId, 0, 3);
            $numPart = substr($lastId, 3, 4);

            // Increment the number part
            $numPart++;
            if ($numPart > 9999) {
                $numPart = 0;

                // If the number part has reached its maximum, increment the character part
                $charIndex = strpos($characters, $charPart);
                $charIndex++;
                if ($charIndex >= strlen($characters)) {
                    // If the character part has reached its maximum, reset to the beginning
                    $charIndex = 0;
                }
                $charPart = substr($characters, $charIndex, 3);
            }
        }

        return $charPart . str_pad($numPart, 4, '0', STR_PAD_LEFT);
    }
}
