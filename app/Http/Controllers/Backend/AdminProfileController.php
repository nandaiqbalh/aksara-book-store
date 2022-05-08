<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function adminProfile()
    {
        $adminData = Admin::find(1);

        return view('admin.profile.admin_profile', compact('adminData'));
    }

    public function adminProfileEdit()
    {
        $editData = Admin::find(1);
        return view('admin.profile.edit_admin_profile', compact('editData'));
    }
}