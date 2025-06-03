<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleriesController extends Controller
{
    // Store a new gallery
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'defaultPath' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'hoverPath' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gallery = Gallery::create([
            'name' => $request->name,
            'defaultPath' => '',
            'hoverPath' => '',
        ]);

        // Handle image uploads
        if ($request->hasFile('defaultPath')) {
            $defaultFile = $request->file('defaultPath');
            $defaultFilename = $gallery->_id . '_default.' . $defaultFile->getClientOriginalExtension();
            $defaultFile->storeAs('galleries', $defaultFilename, 'public');
            $gallery->defaultPath = 'storage/galleries/' . $defaultFilename;
        }

        if ($request->hasFile('hoverPath')) {
            $hoverFile = $request->file('hoverPath');
            $hoverFilename = $gallery->_id . '_hover.' . $hoverFile->getClientOriginalExtension();
            $hoverFile->storeAs('galleries', $hoverFilename, 'public');
            $gallery->hoverPath = 'storage/galleries/' . $hoverFilename;
        }

        $gallery->save();

        return response()->json(['message' => 'Gallery created successfully!']);
    }

    // Get a single gallery
    public function getGallery($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            return response()->json($gallery);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gallery not found.'], 404);
        }
    }

    // Update an existing gallery
    public function update(Request $request, $id)
    {
        try {
            $gallery = Gallery::findOrFail($id);

            $request->validate([
                'name' => 'required|string|max:255',
                'defaultPath' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'hoverPath' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($request->hasFile('defaultPath')) {
                if ($gallery->defaultPath && Storage::disk('public')->exists(str_replace('storage/', '', $gallery->defaultPath))) {
                    Storage::disk('public')->delete(str_replace('storage/', '', $gallery->defaultPath));
                }

                $defaultFile = $request->file('defaultPath');
                $defaultFilename = $gallery->_id . '_default.' . $defaultFile->getClientOriginalExtension();
                $defaultFile->storeAs('galleries', $defaultFilename, 'public');
                $gallery->defaultPath = 'storage/galleries/' . $defaultFilename;
            }

            if ($request->hasFile('hoverPath')) {
                if ($gallery->hoverPath && Storage::disk('public')->exists(str_replace('storage/', '', $gallery->hoverPath))) {
                    Storage::disk('public')->delete(str_replace('storage/', '', $gallery->hoverPath));
                }

                $hoverFile = $request->file('hoverPath');
                $hoverFilename = $gallery->_id . '_hover.' . $hoverFile->getClientOriginalExtension();
                $hoverFile->storeAs('galleries', $hoverFilename, 'public');
                $gallery->hoverPath = 'storage/galleries/' . $hoverFilename;
            }

            $gallery->name = $request->name;
            $gallery->save();

            return response()->json(['message' => 'Gallery updated successfully!']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Update failed.'], 500);
        }
    }

    // Delete a gallery
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        foreach (['defaultPath', 'hoverPath'] as $path) {
            $relative = str_replace('storage/', '', $gallery->{$path});
            if ($gallery->{$path} && Storage::disk('public')->exists($relative)) {
                Storage::disk('public')->delete($relative);
            }
        }

        $gallery->delete();

        return response()->json(['message' => 'Gallery deleted successfully.']);
    }
}
