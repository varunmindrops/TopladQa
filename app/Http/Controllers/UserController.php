<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProductDummyVideo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function facultyProfile($slug)
    {
        $user = User::with(['teacher.totalExperience', 'teacher.teachingExperience', 'product.dummyVideo'])->where('slug',$slug)->first();

        $products = DB::table('users')
            ->join('product', 'users.id', '=', 'product.user_id')
            ->join('mst_subject', 'product.subject_id', '=', 'mst_subject.id')
            ->join('mst_course_level', 'mst_subject.course_level_id', '=', 'mst_course_level.id')
            ->join('mst_course', 'mst_course_level.course_id', '=', 'mst_course.id')
            ->join('product_price', 'product.id', '=', 'product_price.product_id')
            ->leftJoin('books as t_hb', function ($join) {
                $join->on('product.id', '=', 't_hb.product_id')
                    ->where('t_hb.is_printed', '=', 1);
            })
            ->leftJoin('books as t_eb', function ($join) {
                $join->on('product.id', '=', 't_eb.product_id')
                    ->where('t_eb.is_ebook', '=', 1);
            })
            ->leftJoin('videos as tv', function ($join) {
                $join->on('product.id', '=', 'tv.product_id');
            })
            ->select(
                'product.id',
                'users.slug as user_slug',
                'mst_subject.name',
                'mst_subject.slug as subject_slug',
                'mst_course_level.name as course_name',
                'mst_course.value as course_value',
                DB::raw('MIN(product_price.proposed_market_price) as minimum_price'),
                DB::raw('MAX(product_price.proposed_market_price) as maximum_price'),
                't_hb.id as hard_book_id',
                't_eb.id as e_book_id',
                'tv.id as video_id'
            )
            ->where('users.slug', $slug)
            ->where('product.product_type_id', 2)
            ->where('product.status', 1)
            ->whereNull('product.deleted_at')
            ->where('tv.status', 1)
            ->whereNull('tv.deleted_at')
            ->groupBy('product_price.product_id')
            ->get();

        $productsArr = $products->toArray();

        return view('site.faculty-profile', compact('user', 'products', 'productsArr'));
        
    }

    public function listFaculty($segment, $slug)
    {
        // Eloquent Equivalent of a $teacher's query
        /*
            return User::with(['teacherSubject' => function($query) use($id) {
                                    $query->where('subject_id', $id);
                                }, 'product' => function($productQuery) use($id) {
                                    $productQuery->where('subject_id', $id);
                                    $productQuery->with('productPrice');
                                } ])
                            ->whereHas('teacherSubject', function($query) use($id) {
                                $query->where('subject_id', $id);
                            })->get();
            */

        // $course = MstSubject::with('mstCourseLevel')->where('id', $id)->toSql();
        
        $course = DB::table('mst_subject')
            ->join('mst_course_level', 'mst_subject.course_level_id', '=', 'mst_course_level.id')
            ->join('mst_course', 'mst_course_level.course_id', '=', 'mst_course.id')
            ->select('mst_subject.id', 'mst_subject.name as subject_name', 'mst_course_level.name as course_level', 'mst_subject.paper_overview', 'mst_subject.paper_syllabus')
            ->where('mst_subject.slug', $slug)
            ->where('mst_course.value', $segment)
            ->get();

        $id = DB::table('mst_subject')->where('slug', $slug)->get()->pluck('id')->toArray();

        $teachers =  DB::table('users')
            ->join('teacher_subject', 'users.id', '=', 'teacher_subject.user_id')
            ->join('product', function ($join) use ($id) {
                $join->on('users.id', '=', 'product.user_id')
                    ->where('product.subject_id', $id)
                    ->where('product.product_type_id', 2)
                    ->where('product.status', 1)
                    ->whereNull('product.deleted_at');
            })
            ->join('product_price', 'product.id', '=', 'product_price.product_id')
            ->leftJoin('books as t_hb', function ($join) {
                $join->on('product.id', '=', 't_hb.product_id')
                    ->where('t_hb.is_printed', '=', 1);
            })
            ->leftJoin('books as t_eb', function ($join) {
                $join->on('product.id', '=', 't_eb.product_id')
                    ->where('t_eb.is_ebook', '=', 1);
            })
            ->leftJoin('videos as tv', function ($join) {
                $join->on('product.id', '=', 'tv.product_id');
            })
            ->join('mst_subject', 'teacher_subject.subject_id', '=', 'mst_subject.id')
            ->select(
                'users.id  as teacher_id',
                'users.name as teacher_name',
                'users.photo',
                'users.slug as user_slug',
                'product_price.product_id',
                DB::raw('MIN(product_price.proposed_market_price) as minimum_price'),
                DB::raw('MAX(product_price.proposed_market_price) as maximum_price'),
                't_hb.id as hard_book_id',
                't_eb.id as e_book_id',
                'tv.id as video_id',
                'mst_subject.name as subject_name',
                'mst_subject.slug as subject_slug'
            )
            ->where('teacher_subject.subject_id', $id)
            ->where('users.status', 1)
            ->whereNull('users.deleted_at')
            ->where('tv.status', 1)
            ->whereNull('tv.deleted_at')
            ->groupBy('product_price.product_id')
            ->get();

        if($segment == 'cma' || $segment == 'cs' || $segment == 'ca') {
            return view('site.faculty-list', compact('course', 'teachers', 'segment', 'slug'));
        } else {
            return view('site.404');
        }
    }

    public function allFaculty(Request $request)
    {
        if ($request->search != "") 
        {
            $request->validate([
                'search' => 'regex:/^([a-zA-Z\.]+\s)*[a-zA-Z\.]+$/'
            ],
            [
            'search.regex' => 'Only letters, dot(.), single space between words are allowed.'
          ]);

            $users = User::where('name', 'LIKE', '%' . $request->search . '%')->where('role', 'teacher')->where('status', 1)->whereNull('deleted_at')->paginate(16);

            $users->appends(array(
                'search' => $request->search,
            ));
        } 
        else 
        {
            $users = User::where('role', 'teacher')->where('status', 1)->whereNull('deleted_at')->paginate(16);
        }

        return view('site.faculty', compact('users'));
    }

    public function stealthLogin(Request $request)
    {
        $superAdminId = Auth::id();

        $credentials = ['id' => $request->user_id];
        if (Auth::loginUsingId($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('is_stealth_login', 1);
            $request->session()->put('super_admin_id', $superAdminId);

            return redirect('teacher/profile');
        }
        return redirect('/admin-login/teacher')->with('error', 'Login Failed');
    }

    public function superadminLoginWithId(Request $request)
    {
        $credentials = ['id' => $request->user_id];

        if (Auth::loginUsingId($credentials)) {
            $request->session()->regenerate();
            $request->session()->forget('is_stealth_login');
            $request->session()->forget('super_admin_id');
            return redirect('admin-login/teacher');
        }
        return redirect('/admin-login/teacher')->with('error', 'Login Failed');
    }
}
