<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    // Show the edit form for contact information
    public function edit()
    {
        // Assume there's only one contact record to edit
        $kontak = Kontak::first();
        return view('dash.kontak', compact('kontak'));
    }

    // Update the contact information
    public function update(Request $request, Kontak $kontak)
    {
        $request->validate([
            'lokasi' => 'required|string|max:255',
            'pos' => 'required|string|max:10',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $kontak->update($request->all());

        return redirect()->route('dash.kontak.edit')->with('success', 'Contact information updated successfully.');
    }
}
