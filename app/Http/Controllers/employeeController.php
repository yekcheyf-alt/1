<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\employee;

class employeeController extends Controller
{
    public function index()
    {
        $employee = employee::all();
        return view('employee.index', compact('employee'));
    }

    public function create()
    {
        return view('employee.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'mname' => 'required',
            'age' => 'required',
            'zipcode' => 'required',
            'address' => 'required',
        ]);

        employee::create($request->all());

        return redirect()->route('employee.index')->with('success', 'Employee created successfully.');
    }
    public function edit($id)
    {
        $employee = employee::findOrFail($id);
        return view('employee.edit', compact('employee'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'mname' => 'required',
            'age' => 'required',
            'zipcode' => 'required',
            'address' => 'required',
        ]);

        $employee = employee::findOrFail($id);
        $employee->update($request->all());

        return redirect()->route('employee.index')->with('success', 'Employee updated successfully.');
    }
    public function destroy($id)
    {
        $employee = employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully.');
    }
    public function show($id)
    {
        $employee = employee::findOrFail($id);
        return view('employee.show', compact('employee'));
    }

}