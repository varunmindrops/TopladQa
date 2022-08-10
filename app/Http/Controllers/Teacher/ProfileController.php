<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\MstCourseLevel;
use App\Models\MstSubject;
use App\Models\MstExperience;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Product;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index()
    {
        $id = Auth::id();
        // $user = User::with(['teacher', 'product', 'product.subject', 'product.productPrice',  'teacherCourseLevel', 'teacherSubject.mstSubject'])->find($id);

        $user = User::with(['teacher'])->find($id);

        $data = MstExperience::whereNull('deleted_at')->get();
        return view('admin.super-admin.teacher-edit-profile', compact('user','data'));
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
                           'name' => 'required|regex:/^([a-zA-Z\.]+\s)*[a-zA-Z\.]+$/|max:255',
                           'email1' => 'required|email:rfc,dns|unique:users,email,' . $id,
                           'contact1' => 'required|digits:10|regex:/^((?!(0))[0-9]{10})$/|unique:users,phone,' . $id,
                           'email2' => 'nullable|email:rfc,dns',
                           'contact2' => 'nullable|digits:10|regex:/^((?!(0))[0-9]{10})$/',
                           'sales_phone' => 'required|digits:10|regex:/^((?!(0))[0-9]{10})$/',
                           'sales_person' => 'required|regex:/^([a-zA-Z\.]+\s)*[a-zA-Z\.]+$/|max:255',
                           'tech_phone' => 'required|digits:10|regex:/^((?!(0))[0-9]{10})$/',
                           'tech_person' => 'required|regex:/^([a-zA-Z\.]+\s)*[a-zA-Z\.]+$/|max:255',
                           'experience' => 'required',
                           'teach_experience' => 'required',
                           'qualification' => 'required',
                           'achievement' => 'required',
                           'award' => 'required',
                           'interest' => 'required',
                           'bio' => 'required'
                           ],
                            [
                            'name.regex' => 'Only letters, dot(.), single space between words are allowed.',
                            'email1.required' => 'The primary email field is required.',
                            'email1.email' => 'The primary email must be a valid email address.',
                            'email2.email' => 'The secondary email must be a valid email address.',
                            'email1.unique' => 'The primary email has already been taken.',
                            'contact1.required' => 'The primary contact field is required.',
                            'contact1.digits' => 'The primary contact must be 10 digits.',
                            'contact2.digits' => 'The secondary contact must be 10 digits.',
                            'contact1.regex' => 'The primary contact is invalid.',
                            'contact2.regex' => 'The secondary contact is invalid.',
                            'contact1.unique' => 'The primary contact has already been taken.',
                            'sales_phone.required' => 'After sales support contact field is required.',
                            'sales_phone.digits' => 'After sales support contact must be 10 digits.',
                            'sales_phone.regex' => 'After sales support contact is invalid.',
                            'tech_phone.required' => 'Tech support contact field is required.',
                            'tech_phone.digits' => 'Tech support contact must be 10 digits.',
                            'tech_phone.regex' => 'Tech support contact is invalid.',
                            'sales_person.required' => 'After sales support contact person field is required.',
                            'sales_person.regex' => 'Only letters, dot(.), single space between words are allowed.',
                            'sales_person.max' => 'After sales support contact person name may not be greater than 255 characters.',
                            'tech_person.required' => 'Tech support contact person field is required.',
                            'tech_person.regex' => 'Only letters, dot(.), single space between words are allowed.',
                            'tech_person.max' => 'Tech support contact person name may not be greater than 255 characters.',
                            'teach_experience.required' => 'Teaching experience field is required.',
                            'qualification.required' => 'Educational qualification field is required.',
                            'achievement.required' => 'Professional achievement field is required.',
                            'award.required' => 'Awards and honours field is required.',
                            'interest.required' => 'Areas of interest field is required.'
                          ]);

        $update_user = User::find($id)
                       ->update(['name' => $request->name, 'email' => $request->email1, 'secondary_email' => $request->email2, 'phone' => $request->contact1, 'secondary_phone' => $request->contact2]);

        $update_teacher = Teacher::where('user_id', $id)
                          ->update(['after_sales_phone' => $request->sales_phone, 'after_sales_person' => $request->sales_person, 'tech_supp_phone' => $request->tech_phone, 'tech_supp_person' => $request->tech_person,
                          'experience_id' => $request->experience, 'teaching_experience_id' => $request->teach_experience, 'edu_qualification' => $request->qualification, 'prof_achievement' => $request->achievement,
                          'award_honour' => $request->award, 'area_of_interest' => $request->interest, 'bio' => $request->bio]);

        return redirect('teacher/profile')->with('success', 'Data Updated Successfully');
        // return redirect()->back()->with('success', 'Data Updated Successfully');
    }

    public function destroy(Request $request)
    {
        //
    }

}
