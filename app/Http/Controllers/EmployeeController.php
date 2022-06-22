<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Skill;
use App\Models\SeniorityRating;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $employees = Employee::with('skills.seniority_rating')->get();

        return response(json_encode($employees), 200);
    }

    /**
     * Display a listing of Seniority Ratings.
     *
     * @return Response
     */
    public function seniorityRatings(): Response
    {
        $seniorityRatings = SeniorityRating::all();

        return response(json_encode($seniorityRatings), 200);
    }



    /**
     * Display a single item of the resource.
     *
     * @return Response
     */
    public function show($id) {
        $employee = Employee::find($id);

        return response(json_encode($employee));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'contact_number' => ['required'],
            'email_address' => ['required'],
            'date_of_birth' => ['required'],
            'street_address' => ['required'],
            'city' => ['required'],
            'postal_code' => ['required'],
            'country' => ['required']
        ]);

        $employee = Employee::create($request->all());

        foreach($request->all()['skills'] as $skillData) {
            $skillData['employee_id'] = $employee->id;
            $skill = Skill::create($skillData);
            $skill->seniority_rating_id = intval($skillData['seniority_rating_id']);
            $skill->save();
        }

        return response(json_encode([
            'Entry created successfully.'
        ]), 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'contact_number' => ['required'],
            'email_address' => ['required'],
            'date_of_birth' => ['required'],
            'street_address' => ['required'],
            'city' => ['required'],
            'postal_code' => ['required'],
            'country' => ['required']
        ]);

        Employee::find($id)->update($request->all());

        foreach ($request->all()['skills'] as $skillData) {
            Skill::find($skillData['id'])->update($skillData);
        }

        return response(json_encode([
            'Entry updated successfully.'
        ]), 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        $skills = Employee::find($id)->with('skills')->get();

        if (sizeof($skills) > 0) {
            foreach ($skills as $skill) {
                Skill::where('id', $skill['id'])->firstorfail()->delete();
            }
        }

        Employee::where('id', $id)->firstorfail()->delete();

        return response(json_encode([
            'Entry deleted successfully.'
        ]), 201);
    }
}
