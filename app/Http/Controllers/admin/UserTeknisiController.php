<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\RekapTeknisi;
use Illuminate\Http\Request;
use App\Models\ServiceReport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserTeknisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teknisis = User::whereHas('role', function ($query) {
            $query->where('name', 'teknisi');
        })->get();
        return view('admin.userTeknisi.index', compact('teknisis'));
    }

    public function rekap()
    {
        // Ambil data teknisi dengan rekap teknisi
        $rekapTeknisi = RekapTeknisi::with('technician')
            ->get()
            ->map(function ($rekap) {
                $totalService = ServiceReport::where('technician_id', $rekap->technician_id)->count();

                $monthlyService = ServiceReport::where('technician_id', $rekap->technician_id)
                    ->whereMonth('process_date', Carbon::now()->month)
                    ->count();

                return [
                    'name' => $rekap->technician->name,
                    'total_service' => $totalService,
                    'monthly_service' => $monthlyService,
                    'status' => $rekap->status,
                ];
            });

        return view('admin.rekapTeknisi.index', compact('rekapTeknisi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.userTeknisi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'hp' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed'],
        ]);

        $teknisi = User::create([
            'name' => $request->name,
            'hp' => $request->hp,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'role_id' => 2,
            'password' => Hash::make($request->password),
        ]);

        RekapTeknisi::create([
            'technician_id' => $teknisi->id,
            'status' => 'Available'
        ]);

        return redirect()->route('user.teknisi.index')->with('success', 'User teknisi berhasil ditambahkan.');
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
        $user = User::findOrFail($id);
        return view('admin.userTeknisi.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
        ]);
        
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'hp' => $request->hp,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('user.teknisi.index')->with('success', 'User teknisi berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.teknisi.index')->with('success', 'User teknisi berhasil dihapus.');
    }
}
