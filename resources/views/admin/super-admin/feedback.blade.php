@extends('layouts.admin-layout')

@section('content')

@include('admin.super-admin.layouts.sidebar')
<div class="content_super supar_main_cont">

    <div class="wrap_tab_contents">
        <div class="container-fluid">
            <div class="card_info shadow_blk">

                <h4 class="font-italic mb-2">Manage Feedbacks</h4>

                <div class="col-lg-12 feedback_table">
                    <div class="table-responsive super_table">

                        <form type="GET" action="/admin-login/feedback">
                            <div class="search_top feedback_search">
                                <div class="wrap_serpan">
                                    <input type="search" name="search" placeholder="search" class="form-control @error('search') is-invalid @enderror" value="{{ request('search') }}" autofocus>
                                    <button class="button btn" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                                @error('search')
                                <p class="error_result" style="color:red">{{$message}}</p>
                                @enderror
                            </div>
                        </form>

                        @if(count($data) > 0)
                        <table id="feedback_table" class="table table-striped table-bordered data-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Mobile Number</th>
                                    <th>Email Id</th>
                                    <th width="200px">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $feedback)
                                <tr>
                                    <td>{{ $feedback['name'] }}</td>
                                    <td>{{ $feedback['phone'] }}</td>
                                    <td>{{ $feedback['email'] }}</td>
                                    <td><button title="View" type="submit" class="table_btn edit_linker view-feedback" data-toggle="modal" data-id="{{ $feedback['id'] }}"><span><i class="fa fa-eye" aria-hidden="true"></i></span></button>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <button title="Delete" type="submit" data-id="{{ $feedback['id'] }}" class="table_btn trash_linker delete-feedback" data-confirm="Are you sure you want to delete this feedback?"><span><i class="fa fa-trash" aria-hidden="true"></i></span></button>
                                        @if($feedback['status'] == 0)
                                        <button title="Deactive" class="table_btn edit_linker off_switch" data-id="{{ $feedback['id'] }}" data-status="{{ $feedback['status'] }}" data-confirm="Are you sure you want to activate this feedback?" type="button"><span><i class="fa fa-toggle-off" aria-hidden="true"></i></span></button>
                                        @elseif($feedback['status'] == 1)
                                        <button title="Active" class="table_btn edit_linker on_switch" data-id="{{ $feedback['id'] }}" data-status="{{ $feedback['status'] }}" data-confirm="Are you sure you want to deactivate this feedback?" type="button"><span><i class="fa fa-toggle-on" aria-hidden="true"></i></span></button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="pagging_main">
                            <div class="pagging_texter">
                                Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} entries
                            </div>
                            <div class="pagging_listung">
                                {{ $data->onEachSide(1)->links() }}
                            </div>
                        </div>

                        @else
                        <div class="table_layut col-md-12 text-center">
                            <p>No data available</p>
                        </div>
                        @endif

                    </div>
                </div>

                <!-- View Feedback Modal -->
                <div id="viewfeedback" class="modal fade common_model" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Feedback Details</h4> <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="ov_main_wrap product_detailer">
                                    <div class="col-md-12 pdetailers">
                                        <div class="wrap_multier">
                                            <div class="manage_feedbacks" id="feedback_section">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer dual_model_btn">
                                <button type="button" class="btn btn-primary f-size" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {

        /* View Feedback */
        $(document).on('click', '.view-feedback', function() {
            var feedback_id = $(this).data('id');
            $.get('feedback/' + feedback_id, function(data) {
                if (data.length > 0) {
                let strDetail = ``;

                $.each(data, function(key, item) {
                strDetail += `<div class="vo_section">
                                <h3>
                                Feedback Details
                                </h3>
                                <div class="col-md-12 sec_colls">
                                <div class="feeds_panel">
                                <h4>How was your overall experience with Toplad</h4>
                                <p>${item.experince_raghav_academy}</p>
                                </div>
                                <div class="feeds_panel">
                                <h4>How would you rate our video lectures</h4>
                                <p>${item.video_lectures}</p>
                                </div>
                                <div class="feeds_panel">
                                <h4>How would you rate our books and study material</h4>
                                <p>${item.books_study_material}</p>
                                </div>
                                <div class="feeds_panel">
                                    <h4>How would you rate our counsellors in terms of explaining all the information to you</h4>
                                <p>${item.counsellors}</p>
                                </div>
                                <div class="feeds_panel">
                                <h4>How would you rate our expert faculty panel</h4>
                                <p>${item.expert_faculty_panel}</p>
                                </div>
                                <div class="feeds_panel">
                                <h4>How would you rate our doubt solving mechanism</h4>
                                <p>${item.doubt_solving}</p>
                                </div>

                                <div class="feeds_panel">
                                <h4>How would you rate our after sales service</h4>
                                <p>${item.after_sales_service}</p>
                                </div>

                                <div class="feeds_panel">
                                <h4>Your Overall experience</h4>
                                <p>${item.overall_experience}</p>
                                </div>

                                <div class="feeds_panel">
                                <h4>Overall experience description</h4>
                                <p>${item.des_overall_experience}</p>
                                </div>
                                </div>
                                </div>`;
                });
                $('#feedback_section').html(strDetail);
                $('#viewfeedback').modal('show');
            } else {
                    alert("No Feedback");
                }
            });
        });

        /* Delete Feedback */
        $(document).on('click', '.delete-feedback', function() {
            var feedback_id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            var choice = confirm(this.getAttribute('data-confirm'));

            if (choice) {
                $.ajax({
                    type: "DELETE",
                    url: "/admin-login/feedback/" + feedback_id,
                    data: {
                        "id": feedback_id,
                        "_token": token,
                    },
                    success: function(data) {
                        location.reload();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

        /* Active/Deactive Feedback */
        $(document).on('click', '.off_switch, .on_switch', function() {
            var feedback_id = $(this).data('id');
            var status = $(this).data('status');
            var token = $("meta[name='csrf-token']").attr("content");
            var choice = confirm(this.getAttribute('data-confirm'));

            if (choice) {
                $.ajax({
                    type: "PUT",
                    url: "/admin-login/feedback/" + feedback_id,
                    data: {
                        "id": feedback_id,
                        "status": status == 1 ? 0 : 1,
                        "_token": token,
                    },
                    success: function(data) {
                        location.reload();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

    });
</script>

<script>
    $(document).ready(function() {

        $(".wrap_multier .vo_section h3").click(function() {
            $(this).parent().toggleClass("addActivate");
        });

    });
</script>
@endpush