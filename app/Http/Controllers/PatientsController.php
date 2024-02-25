<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(Patients::get('opd_no')->last());
        function generateOrderedUID()
        {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $numbers = '0123456789';
            function getLastUsedId()
            {
                // Patients::last('opd_no');
                return 'AAA0000';
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
        // dd(generateOrderedUID());
        $request->dd();
        Patients::create([]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Patients $patients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patients $patients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patients $patients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patients $patients)
    {
        //
    }
}
