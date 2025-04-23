<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Employees List';
        $employees = Employees::all();
        return view('employees.index', ['employees' => $employees], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|integer|unique:employees,nip',
            'email' => 'required|email|unique:employees,email',
            'division' => 'required|string|max:100',
            'period' => 'required|string|max:50',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name', 'nip', 'email', 'division', 'period']);

        // Upload foto jika ada
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $photoPath;
        }

        // Simpan data ke database
        Employees::create([
            'name' => $request->name,
            'nip' => $request->nip,
            'email' => $request->email,
            'division' => $request->division,
            'period' => $request->period,
            'photo' => $photoPath,
        ]);

        // Redirect ke halaman daftar karyawan
        // Employees::create($request->all());
        Employees::create($data);
        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil ditambahkan.');
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
        // Ambil data karyawan berdasarkan ID
        $employee = Employees::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|integer|unique:employees,nip,' . $id,
            'email' => 'required|email|unique:employees,email,' . $id,
            'division' => 'required|string|max:100',
            'period' => 'required|string|max:50',
            'status' => 'required|in:completed,pending',
            'evaluation_date' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Ambil data karyawan berdasarkan ID
        $employee = Employees::findOrFail($id);

        // Upload foto jika ada
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $employee->photo = $photoPath;
        }

        // Update data karyawan
        $employee->update([
            'name' => $request->name,
            'nip' => $request->nip,
            'email' => $request->email,
            'division' => $request->division,
            'period' => $request->period,
        ]);

        // Redirect ke halaman daftar karyawan dengan pesan sukses
        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
