<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoticesController extends Controller
{
    public function index()
    {
        $notice = DB::table('notices')->latest()->get();

        return response()->json($notice);
    }

    public function create(Request $request)
    {
        $notice = new Notice();
        $notice->title = $request->title;
        $notice->details = $request->details;
        $notice->date = $request->date;
        $notice->save();

        return response()->json(['status' => 'success']);
    }

    public function store(Request $request)
    {
    }

    public function show(Notice $notice)
    {
    }

    public function edit(Notice $notice)
    {
    }

    public function update(Request $request)
    {
        $notice = Notice::find($request->id);
        $notice->title = $request->title;
        $notice->details = $request->details;
        $notice->date = $request->date;
        $notice->save();

        return response()->json(['status' => 'success']);
    }

    public function destroy(Notice $notice)
    {
    }
}
