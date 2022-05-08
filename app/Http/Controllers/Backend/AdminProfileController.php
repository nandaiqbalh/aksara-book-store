<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

    public function adminProfileStore(Request $request)
    {
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/' . $data->profile_photo_path));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $fileName);
            $data['profile_photo_path'] = $fileName;
        }

        $data->save();

        return Redirect()->route('admin.profile');
    }
}