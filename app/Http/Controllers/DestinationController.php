<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'destinationTitle' => 'required|string|max:255',
            'description' => 'required|string',
            'imagePath' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('imagePath')->store('destinations', 'public');

        Destination::create([
            'destinationTitle' => $request->destinationTitle,
            'description' => $request->description,
            'imagePath' => '/storage/' . $path,
        ]);

        return redirect()->back()->with('success', 'Destination added successfully!');
    }
}
