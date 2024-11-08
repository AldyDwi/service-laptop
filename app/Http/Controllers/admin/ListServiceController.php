<?php

namespace App\Http\Controllers\admin;

use App\Models\ListService;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;

class ListServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listServices = ListService::with('category')->get();
        return view('admin.service.index', compact('listServices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ServiceCategory::all();
        return view('admin.service.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:service_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'time_estimate' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        ListService::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'time_estimate' => $request->time_estimate,
            'price' => $request->price,
        ]);

        return redirect()->route('admin.list.index')->with('success', 'List Service berhasil ditambahkan.');
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
    public function edit(string $id)
    {
        $listService = ListService::findOrFail($id);
        $categories = ServiceCategory::all();
        return view('admin.service.edit', compact('listService', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id' => 'required|exists:service_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'time_estimate' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $listService = ListService::findOrFail($id);
        $listService->update($request->all());

        return redirect()->route('admin.list.index')->with('success', 'List Service berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $listService = ListService::findOrFail($id);
        $listService->delete();

        return redirect()->route('admin.list.index')->with('success', 'List Service berhasil dihapus.');
    }
}
