<?php

namespace App\Http\Controllers;

use App\Models\group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = group::all();
        return $groups;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $fields = $request->validate([
        'name' => 'required|string',
        'gender' => 'required|string',
        'email' => 'required|string',
        'system' => 'required|string',
       ]);

       $group = group::create($fields);
       return $group;
    }

    /**
     * Display the specified resource.
     */
    public function show(group $group)
    {
        return $group;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, group $group)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'gender' => 'required|string',
            'email' => 'required|string',
            'system' => 'required|string',
           ]);

           $group->update($fields);
           return $group;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(group $group)
    {
        $group->delete();
        return ['message' => 'Member deleted successfully'];
    }
}
