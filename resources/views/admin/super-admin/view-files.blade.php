@php
function getDateInSiteFormat($date, $withoutTime = false) {
$format = 'd-m-Y';
$format .= ($withoutTime) ? '' : ' H:i:s';
if ($date) {
$date = date($format, strtotime($date));
}
return $date;
}
@endphp

@extends('layouts.admin-layout')

@section('content')



                    @include('admin.super-admin.layouts.sidebar')
                    <div class="content_super supar_main_cont">
                    <div class="home_dashboard">@include('admin.super-admin.layouts.super-admin-btn')</div>
                        <div class="wrap_tab_contents">
                            <div class="card_info shadow_blk">
                                <h4 class="font-italic mb-2">View Uploaded Files</h4>
                                <div class="form_data d-flex justify-content-between align-items-center wrap_in_form">
                                    @if($files->isEmpty())
                                    <div class="table_layut col-md-12 add_products">
                                        <div class="first_product">
                                            <p>Note: Currently there are no files.</p>
                                        </div>
                                    </div>
                                    @else
                                    <div class="table_layut col-md-12 product_table">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Category</th>
                                                        <th width="130px">Uploading Date</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($files as $file)
                                                    <tr>
                                                        <td>{{$file['name']}}</td>
                                                        <td>@if($file['course_level_id'] == "cma")
                                                                CMA General
                                                            @elseif($file['course_level_id'] == "cs")
                                                                CS General
                                                            @elseif($file['course_level_id'] == "ca")
                                                                CA General
                                                            @else
                                                                {{$file['mstCourseLevel']['name']}}
                                                            @endif
                                                        </td>
                                                        <td>{{ getDateInSiteFormat($file['created_at'], true) }}</td>
                                                        <td>
                                                            <form class="common_lines" action="/teacher/view-files/{{$file['id']}}" method="POST" name="delete_file">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button title="Delete" type="submit" class="table_btn trash_linker" onclick="return confirm('Are you sure you want to delete this file?')"><span><i class="fa fa-trash" aria-hidden="true"></i></span></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="pagging_main">
                                            <div class="pagging_texter">
                                                Showing {{ $files->firstItem() }} to {{ $files->lastItem() }} of {{ $files->total() }} entries
                                            </div>
                                            <div class="pagging_listung">
                                                {{ $files->links() }}
                                            </div>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection