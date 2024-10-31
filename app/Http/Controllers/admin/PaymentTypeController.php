<?php

namespace App\Http\Controllers\admin;

use App\Models\PaymentType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PaymentType::all();
        return view('admin.tipeBayar.index', ['types' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tipeBayar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        PaymentType::create([
            'name' => $request->name,
        ]);

        return redirect()->route('type.index')->with('success', 'Tipe pembayaran berhasil ditambahkan.');
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
        $type = PaymentType::findOrFail($id);
        return view('admin.tipeBayar.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $type = PaymentType::findOrFail($id);
        $type->update($request->all());

        return redirect()->route('type.index')->with('success', 'Tipe pembayaran berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = PaymentType::findOrFail($id);
        $type->delete();

        return redirect()->route('type.index')->with('success', 'Tipe pembayaran berhasil dihapus.');
    }
}
