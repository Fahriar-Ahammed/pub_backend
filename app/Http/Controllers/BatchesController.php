<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatchesController extends Controller
{
    public function all($id)
    {
        $batch = DB::table('batches')
            ->where('department_id',$id)
            ->latest()->get();

        return response()->json($batch);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
    }

    public function show(Batch $batch)
    {
    }

    public function edit(Batch $batch)
    {
    }

    public function update(Request $request, Batch $batch)
    {
    }

    public function destroy(Batch $batch)
    {
    }
}
