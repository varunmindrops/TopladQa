<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Response;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search != "") {
            $request->validate(
                [
                    'search' => 'regex:/^([a-zA-Z0-9\.\@]+\s)*[a-zA-Z0-9\.\@]+$/'
                ],
                [
                    'search.regex' => 'Only letters, numbers, dot(.), @, single space between words are allowed.'
                ]
            );

            $data = Feedback::where(function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('phone', 'LIKE', '%' . $request->search . '%');
            })
                ->whereNull('deleted_at')->orderBy('name', 'ASC')->paginate(10);

            $data->appends(array(
                'search' => $request->search,
            ));
        } else {
            $data = Feedback::whereNull('deleted_at')->orderBy('name', 'ASC')->paginate(10);
        }

        return view('admin.super-admin.feedback', compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedback = Feedback::where('id', $id)->get();
        return Response::json($feedback);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $feedback = Feedback::where('id', $request->id)->update(['status' => $request->status]);
        return Response::json($feedback);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = Feedback::where('id', $id)->delete();
        return Response::json($feedback);
    }
}
