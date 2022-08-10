<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfilePicController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'photo' => 'required'
        ]);

        if ($request->hasFile('photo')) {
            $dirpath = 'images/photograph/';
            if (!file_exists($dirpath)) {
                mkdir($dirpath, 0777, true);
            }
            $originName = $request->file('photo')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('photo')->move(public_path($dirpath), $fileName);
            $url = asset($dirpath . $fileName);
            User::find($id)->update(['photo' => $url]);

            // return redirect()->route('edit-profile.index')->with('success', 'Photo Updated Successfully');
            return redirect()->back()->with('success', 'Photo Updated Successfully');
        }
    }

    public function destroy($id)
    {
        //
    }
}
