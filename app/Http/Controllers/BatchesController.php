<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatchesController extends Controller
{
    public function all()
    {
        $batch = DB::table('batches')
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
