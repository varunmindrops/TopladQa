<?php
namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MstCourseLevel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Response;

class ManageCourseLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
             $data=mstCourseLevel::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $action = '<button title="Edit" type="submit" class="table_btn edit_linker edit-subject" data-toggle="modal" data-id=' . $row->id . '><span><i class="fa fa-pencil" aria-hidden="true"></i></span></button>
                        <meta name="csrf-token" content="{{ csrf_token() }}">';

                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.super-admin.manage-course-level');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $id = $request->course_id;
        mstCourseLevel::updateOrCreate(['id' => $id], ['meta_keywords' => $request->meta_keywords, 'meta_title' => $request->meta_title ,
        'meta_description' => $request->meta_description ,'page_description' => $request->page_description ,]);
        if (empty($id))
            $msg = 'Some error occurred!';
        else
            $msg = 'Data is updated successfully';

        return redirect()->route('course-level.index')->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function upload(Request $request)
    {
    if($request->hasFile('file'))
     {
        //get filename with extension
        $filenamewithextension = $request->file('file')->getClientOriginalName();
 
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
 
        //get file extension
        $extension = $request->file('file')->getClientOriginalExtension();
 
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;
 
        //Upload File
        $request->file('file')->storeAs('public/uploads', $filenametostore);
 
        // you can save image path below in database
        $path = asset('storage/uploads/'.$filenametostore);
 
        echo $path;
        exit;
        }   
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mst_course_level = mstCourseLevel::where('id', $id)->first();
        return Response::json($mst_course_level);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
