<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class DestinationController extends Controller
{
    //create a new destination
    public function store(Request $request)
    {
        $request->validate([
            'destinationTitle' => 'required|string|max:255',
            'description' => 'required|string',
            'imagePath' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Step 1: Create destination without image
        $destination = Destination::create([
            'destinationTitle' => $request->destinationTitle,
            'description' => $request->description,
            'imagePath' => '', // Temporary placeholder
        ]);

        // Step 2: Handle image upload
        if ($request->hasFile('imagePath')) {
            $image = $request->file('imagePath');
            $ext = $image->getClientOriginalExtension();
            $filename = $destination->_id . '.' . $ext;

            // Save to 'public/destinations' (maps to 'storage/app/public/destinations')
            $image->storeAs('destinations', $filename, 'public');

            // Step 3: Update imagePath
            $destination->imagePath = 'storage/destinations/' . $filename;
            $destination->save();
        }

        return response()->json(['message' => 'Destination created successfully!']);
    }



    //get destination details by id
    public function getDestination($id)
    {
        try {
            $destination = Destination::findOrFail($id);

            return response()->json([
                'destinationTitle' => $destination->destinationTitle,
                'description' => $destination->description,
                'imagePath' => $destination->imagePath,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Destination not found.'
            ], 404);
        }
    }

    //update destination details by id
    public function update(Request $request, $id)
    {
        try {
            $destination = Destination::findOrFail($id);

            $request->validate([
                'destinationTitle' => 'required|string|max:255',
                'description' => 'required|string',
                'imagePath' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // If a new image is uploaded, delete old one and store new
            if ($request->hasFile('imagePath')) {
                // Delete old image if exists
                if ($destination->imagePath && Storage::disk('public')->exists(str_replace('storage/', '', $destination->imagePath))) {
                    Storage::disk('public')->delete(str_replace('storage/', '', $destination->imagePath));
                }

                $image = $request->file('imagePath');
                $ext = $image->getClientOriginalExtension();
                $filename = $destination->_id . '.' . $ext;

                $image->storeAs('destinations', $filename, 'public');

                $destination->imagePath = 'storage/destinations/' . $filename;
            }


            $destination->destinationTitle = $request->destinationTitle;
            $destination->description = $request->description;
            $destination->save();

            // Return JSON for AJAX
            return response()->json(['message' => 'Destination updated successfully!']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Update failed.'], 500);
        }
    }

    //delete destination by id
    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);

        // Optionally delete the image from storage if needed
        $imageRelativePath = str_replace('storage/', '', $destination->imagePath);
        if (Storage::disk('public')->exists($imageRelativePath)) {
            Storage::disk('public')->delete($imageRelativePath);
        }


        $destination->delete();

        return response()->json(['message' => 'Destination deleted successfully.']);
    }
}
