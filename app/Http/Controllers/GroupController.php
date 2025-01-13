<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('groups', compact('groups'));
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'gender' => 'required|string',
            'email' => 'required|email',
            'system' => 'required|string',
        ]);

        Group::create($fields);

        return redirect()->route('groups.index');
    }

    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    public function update(Request $request, Group $group)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'gender' => 'required|string',
            'email' => 'required|email',
            'system' => 'required|string',
        ]);

        $group->update($fields);

        return redirect()->route('groups.index');
    }

    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('groups.index');
    }
}
