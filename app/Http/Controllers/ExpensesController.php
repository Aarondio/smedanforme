<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;

class ExpensesController extends Controller
{
    //
    public function update(Request $request)
    {
        $validated = $request->validate([
            'businessinfo_id' => 'nullable|exists:businessinfos,id', // Assuming businessinfos is your related table
            'year' => 'required|numeric',
            'expense_type' => 'nullable|string|max:255',
            'salary' => 'required|numeric|',
            'securities' => 'required|numeric',
            'rent' => 'required|numeric',
            'website' => 'required|numeric',
            'utilities' => 'required|numeric',
            'depreciation' => 'nullable',
            'adminexpenses' => 'required|numeric',
            'marketing' => 'required|numeric',
            'supplies' => 'required|numeric',
            'licences' => 'required|numeric',
            'consultation' => 'required|numeric',
            'internet' => 'required|numeric',
            'legal' => 'required|numeric',
            'miscell' => 'required|numeric',
            'insurance' => 'required|numeric',
            'others' => 'required|numeric',
        ],
        [
            'salary.not_in' => 'The salary cannot be zero.',
        ]);

        $expense =  Expenses::findOrFail($request->id);

        $expense->update($validated);
    
        if ($expense) {
            return redirect()->route('financial-record', ['id' => $expense->id])
                ->withSuccess('Your annual financial record was saved successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update expense');
        }
    }
}
