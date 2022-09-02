<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentsController extends Controller
{
    public function all()
    {
        $department = Department::select('id','name')
            ->latest()->get();

        return response()->json($department);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Department $department)
    {
    }

    public function edit(Department $department)
    {
    }

    public function update(Request $request, Department $department)
    {
    }

    public function destroy(Department $department)
    {
    }
}
