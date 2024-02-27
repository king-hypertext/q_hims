<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Patients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BookAppointmentController extends Controller
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
    public function create(Request $request)
    {
        $patient = Patients::where('opd_no', $request->opd_no)->firstOrFail();
        return view('hims.book_appointment', ['patient' => $patient]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->dd();
        return Response::json(["success" => true, "url" => route(
            'book_appointment.create',
            ['opd_no' => $request->opd_number, 'app_time' => $request->time, 'app_date' => $request->date, 'visit_no' => $request->visit_no]
        )]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointments $appointments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointments $appointments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointments $appointments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointments $appointments)
    {
        //
    }
}
