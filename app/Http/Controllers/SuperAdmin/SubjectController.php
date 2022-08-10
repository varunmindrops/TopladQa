<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MstSubject;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Response;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = MstSubject::with(['mstCourseLevel'])->whereNull('deleted_at')->get();
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

        return view('admin.super-admin.subject');
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
        $id = $request->subject_id;

        MstSubject::updateOrCreate(['id' => $id], ['paper_overview' => $request->paper_overview, 'paper_syllabus' => $request->paper_syllabus]);
        if (empty($id))
            $msg = 'Some error occurred!';
        else
            $msg = 'Subject data is updated successfully';

        return redirect()->route('subject.index')->with('success', $msg);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mst_subject = MstSubject::where('id', $id)->first();
        return Response::json($mst_subject);
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
