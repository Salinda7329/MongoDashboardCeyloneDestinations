<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gallery;
use App\Models\Destination;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Basic counts
        $userCount = User::count();
        $destinationCount = Destination::count();
        $galleryCount = Gallery::count();

        // Example of grouping users by role
        $roles = User::raw(function ($collection) {
            return $collection->aggregate([
                ['$group' => ['_id' => '$role', 'count' => ['$sum' => 1]]]
            ]);
        });

        $roleLabels = [];
        $roleData = [];
        $roleMap = [
            1 => 'Admin',
            2 => 'Sub Admin',
            3 => 'User'
        ];

        foreach ($roles as $role) {
            $roleLabels[] = isset($role->_id) && isset($roleMap[$role->_id]) ? $roleMap[$role->_id] : 'Undefined';
            $roleData[] = $role->count;
        }

        return view('admin.admin_dashboard', compact(
            'userCount',
            'destinationCount',
            'galleryCount',
            'roleLabels',
            'roleData'
        ));
    }
}
