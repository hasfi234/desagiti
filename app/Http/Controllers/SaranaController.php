<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SaranaController extends Controller
{
    // Display Sarana on the website
    public function show()
    {
        $saranas = Sarana::all(); 
        return view('sarana', ['saranas' => $saranas]); 
    }

    // Display the dashboard for managing Sarana
    public function dashboard()
    {
        $saranas = Sarana::all();
        return view('dash.sarana', ['saranas' => $saranas]);
    }

    // Store new Sarana
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('picture') ? $request->file('picture')->store('images', 'public') : null;

        Sarana::create([
            'title' => $request->title,
            'picture' => $path,
        ]);

        return redirect()->route('dash.sarana')->with('success', 'Sarana added successfully.');
    }

    // Show edit form
    public function edit(Sarana $sarana)
    {
        $saranas = Sarana::all();
        return view('dash.sarana', ['saranas' => $saranas, 'sarana' => $sarana]);
    }

    // Update Sarana
    public function update(Request $request, Sarana $sarana)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            if ($sarana->picture) {
                Storage::disk('public')->delete($sarana->picture);
            }
            $path = $request->file('picture')->store('images', 'public');
            $sarana->picture = $path;
        }

        $sarana->title = $request->title;
        $sarana->save();

        return redirect()->route('dash.sarana')->with('success', 'Sarana updated successfully.');
    }

    // Delete Sarana
    public function destroy(Sarana $sarana)
    {
        if ($sarana->picture) {
            Storage::disk('public')->delete($sarana->picture);
        }
        $sarana->delete();

        return redirect()->route('dash.sarana')->with('success', 'Sarana deleted successfully.');
    }
}
