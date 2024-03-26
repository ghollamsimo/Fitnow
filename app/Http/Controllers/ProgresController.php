<?php

namespace App\Http\Controllers;

use App\Models\Progres;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::id()){
            return response()->json(['This User Not Found'] , 401);
        }else{
            $progres = Progres::where('user_id' , Auth::id())->first();
            return response()->json($progres);
        }
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
        $request->validate([
            'weight' => 'required',
            'height' => 'required',
            'chest' => 'required',
            'waist' => 'required',
            'hips' => 'required',
            'status' => '',
            'performance' => 'required'
        ]);

        $progress = Progres::create([
            'user_id' => auth()->user()->id,
            'weight' => $request->weight,
            'height' => $request->height,
            'chest' => $request->chest,
            'waist' => $request->waist,
            'hips' => $request->hips,
            'performance' => $request->performance,
            'status' => 'Non terminé'
        ]);

        return response()->json(['message' => 'Physical progress created successfully', 'progress' => $progress], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Progres $progres)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Progres $progres)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $progress = Progres::findOrFail($id);

        if ($progress->user_id !== auth()->user()->id) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $request->validate([
            'weight' => 'required',
            'height' => 'required',
            'chest' => 'required',
            'waist' => 'required',
            'hips' => 'required',
            'performance' => 'required'
        ]);

        $progress->update([
            'weight' => $request->weight,
            'height' => $request->height,
            'chest' => $request->chest,
            'waist' => $request->waist,
            'hips' => $request->hips,
            'performance' => $request->performance,
        ]);

        return response()->json(['message' => 'Physical progress updated successfully', 'progress' => $progress]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $progres = Progres::findOrFail($id);
        $progres->delete();

        return response()->json(['message' => 'Progres Deleted SuccessFully']);
    }
}
