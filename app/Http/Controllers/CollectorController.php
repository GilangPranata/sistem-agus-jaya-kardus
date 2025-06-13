<?php

namespace App\Http\Controllers;

use App\Models\Collector;
use Illuminate\Http\Request;

class CollectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collectors = Collector::latest()->get();
        return view('admin.pages.collectors.index', compact('collectors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.collectors.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    

        Collector::create($request->all());

        return redirect()->route('collector.index')->with('success', 'Collector created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $collector = Collector::findOrFail($id);
        return view('admin.pages.collectors.form', compact('collector'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collector $collector)
    {
        $collector->update($request->all());
        return redirect()->route('collector.index')->with('success', 'Pengepul Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
