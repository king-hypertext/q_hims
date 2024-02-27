<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

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
        return view('hims.add_patient');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(generateOrderedUID());
        // $request->dd();
        Patients::insert([
            "opd_no" => $request->pid,
            "first_name" => $request->fname,
            "last_name" => $request->lname,
            "date_of_birth" => $request->dob,
            "phone" => $request->phone,
            "email" => $request->email ?? "N/A",
            "resident_address" => $request->resident_address,
            "em_cont_first_name" => $request->em_cont_firstname,
            "em_cont_last_name" => $request->em_cont_lastname,
            "em_cont_phone" => $request->em_cont_phone,
            "em_cont_relation" => $request->em_cont_relation,
            "em_cont_resident_address" => $request->em_cont_address,
            "staff_id" => $request->staff_id ?? "N/A",
            "is_staff" => $request->is_staff ?? 0,
            "user" => auth()->user()->firstname ?? "N/A",
            "created_at" => now()->format('Y-m-d H:i:s')
        ]);
        return "success";
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $patient = Patients::where('opd_no', "LIKE", "%$id")->get();
        return count($patient) > 0 ? Response::json(['succces' => true, 'data' => $patient]) : Response::json(['failed' => true, 'data' => "Empty Results"]);
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
    public function  fetchID()
    {
        $id = generatePatientID();
        return Response::json(['success' => true, 'data' => $id]);
    }
    public function SearchByPhone($phone)
    {
        $patient = Patients::where('phone', "LIKE", "%$phone%")->get();
        return count($patient) > 0 ? Response::json(['succces' => true, 'data' => $patient]) : Response::json(['failed' => true, 'data' => "Empty Results"]);
    }
    public function SearchByName($name)
    {
        $patient = Patients::where('first_name', "LIKE", "$name%")->orWhere('last_name', "LIKE", "$name%")->get();
        return count($patient) > 0 ? Response::json(['succces' => true, 'data' => $patient]) : Response::json(['failed' => true, 'data' => "Empty Results"]);
    }
}
