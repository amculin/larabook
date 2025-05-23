<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Http\Requests\UpdatePublisherRequest;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::simplePaginate(10);

        return view('publishers.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required'
        ]);

        Publisher::create([
            'name' => $request->name,
            'address' => $request->address,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('publishers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        return view('publishers.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {
        $publisher->fill($request->validated());

        $publisher->updated_at = date('Y-m-d H:i:s');

        $publisher->save();
    
        return redirect()->route('publishers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        
        return redirect()->route('publishers.index');
    }
}
