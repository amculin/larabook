<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\UpdateMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::simplePaginate(10);

        return view('members.index', compact('members'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|digits:16',
            'full_name' => 'required|string',
            'birth_date' => 'required|date',
            'address' => 'required'
        ]);

        Member::create([
            'id' => $request->id,
            'full_name' => $request->full_name,
            'birth_date' => $request->birth_date,
            'address' => $request->address,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('member.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
