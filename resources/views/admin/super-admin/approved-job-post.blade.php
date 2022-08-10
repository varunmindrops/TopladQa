@extends('layouts.admin-layout')

@section('content')

@include('admin.super-admin.layouts.sidebar')
<div class="content_super supar_main_cont">

    <div class="wrap_tab_contents">
        <div class="container-fluid">
            <div class="card_info shadow_blk">

                <h4 class="font-italic mb-2">Manage Approved Job Posts</h4>

                <div class="col-lg-12 post_table">
                    <div class="table-responsive super_table">

                        <form type="GET" action="/admin-login/approved-job-post">
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
                        <table id="job_post_table" class="table table-striped table-bordered data-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Course</th>
                                    <th>Job Title</th>
                                    <th>Salary Offered</th>
                                    <th>Qualification</th>
                                    <th width="200px">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $job)
                                <tr>
                                    <td>{{ $job['mstCourse']['name'] }}</td>
                                    <td>{{ $job['post'] }}</td>
                                    <td>{{ $job['salary_offered'] }}</td>
                                    <td>{{ $job['qualification'] }}</td>
                                    <td><button title="View" type="submit" class="table_btn edit_linker view-post" data-toggle="modal" data-id="{{ $job['id'] }}"><span><i class="fa fa-eye" aria-hidden="true"></i></span></button>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <button title="Delete" type="submit" data-id="{{ $job['id'] }}" class="table_btn trash_linker delete-post" data-confirm="Are you sure you want to delete this job post?"><span><i class="fa fa-trash" aria-hidden="true"></i></span></button>
                                        <button title="Edit" type="submit" class="table_btn edit_linker edit-post" data-toggle="modal" data-id="{{ $job['id'] }}"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></button>
                                        @if($job['status'] == "rejected")
                                        <button title="Rejected" class="table_btn edit_linker off_switch" data-id="{{ $job['id'] }}" data-status="{{ $job['status'] }}" data-confirm="Are you sure you want to approve this job post?" type="button"><span><i class="fa fa-ban" aria-hidden="true"></i></span></button>
                                        @elseif($job['status'] == "approved")
                                        <button title="Approved" class="table_btn edit_linker on_switch" data-id="{{ $job['id'] }}" data-status="{{ $job['status'] }}" data-confirm="Are you sure you want to reject this job post?" type="button"><span><i class="fa fa-toggle-on" aria-hidden="true"></i></span></button>
                                        @elseif($job['status'] == "pending")
                                        <button title="Pending" class="table_btn edit_linker off_switch" data-id="{{ $job['id'] }}" data-status="{{ $job['status'] }}" data-confirm="Are you sure you want to approve this job post?" type="button"><span><i class="fa fa-toggle-off" aria-hidden="true"></i></span></button>
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

                <!-- View Job Post Modal -->
                <div id="viewpost" class="modal fade common_model job_post_modal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Job Post Details</h4> <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="ov_main_wrap product_detailer">
                                    <div class="col-md-12 pdetailers">
                                        <div class="wrap_multier">
                                            <div class="manage_posts" id="post_section">

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

                <!-- Edit Post Modal -->
                <div class="modal fade ful_wid_modes" id="crud-modal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="postCrudModal"></h4> <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form id="post_form" action="/admin-login/approved-job-post" method="POST" autocomplete="off" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <input type="hidden" name="post_id" id="post_id">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Select Course:</strong>
                                                <select class="form-control @error('course') is-invalid @enderror" id="course" name="course" autofocus>
                                                    <option value="">Select Type</option>
                                                    @foreach($data as $course)
                                                    <option value="{{$course['mstCourse']['id']}}" <?php { {
                                                                                                            echo old('course') == $course['mstCourse']['id'] ? 'selected' : '';
                                                                                                        }
                                                                                                    } ?>>
                                                        {{$course['mstCourse']['name']}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('course')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Job Title:</strong>
                                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Job Title" autofocus>
                                                @error('title')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Salary Offered:</strong>
                                                <select class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary" autofocus>
                                                    <option value="">Select</option>
                                                    <option value="1,00,000 - 2,00,000 P.A.">1,00,000 - 2,00,000 P.A.</option>
                                                    <option value="2,00,000 - 3,00,000 P.A.">2,00,000 - 3,00,000 P.A.</option>
                                                    <option value="3,00,000 - 4,00,000 P.A.">3,00,000 - 4,00,000 P.A.</option>
                                                    <option value="4,00,000 - 5,00,000 P.A.">4,00,000 - 5,00,000 P.A.</option>
                                                    <option value="5,00,000 - 6,00,000 P.A.">5,00,000 - 6,00,000 P.A.</option>
                                                    <option value="6,00,000 - 7,00,000 P.A.">6,00,000 - 7,00,000 P.A.</option>
                                                    <option value="7,00,000 - 8,00,000 P.A.">7,00,000 - 8,00,000 P.A.</option>
                                                    <option value="8,00,000 - 9,00,000 P.A.">8,00,000 - 9,00,000 P.A.</option>
                                                    <option value="9,00,000 - 10,00,000 P.A.">9,00,000 - 10,00,000 P.A.</option>
                                                    <option value="10,00,000 - 11,00,000 P.A.">10,00,000 - 11,00,000 P.A.</option>
                                                    <option value="11,00,000 - 12,00,000 P.A.">11,00,000 - 12,00,000 P.A.</option>
                                                    <option value="12,00,000+ P.A.">12,00,000+ P.A.</option>
                                                    <option value="Not Known">Not Known</option>
                                                </select>
                                                @error('salary')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong for="type">Qualification:</strong>
                                                <select class="form-control @error('qualification') is-invalid @enderror" id="qualification" name="qualification" autofocus>
                                                    <option value="">Select</option>
                                                </select>
                                                @error('qualification')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Experience (In Yrs):</strong>
                                                <select class="form-control @error('experience') is-invalid @enderror" id="experience" name="experience" autofocus>
                                                    <option value="">Select</option>
                                                    <option value="0-1 Years">0-1 Years</option>
                                                    <option value="1-2 Years">1-2 Years</option>
                                                    <option value="2-3 Years">2-3 Years</option>
                                                    <option value="3-4 Years">3-4 Years</option>
                                                    <option value="4-5 Years">4-5 Years</option>
                                                    <option value="5-6 Years">5-6 Years</option>
                                                    <option value="6-7 Years">6-7 Years</option>
                                                    <option value="7-8 Years">7-8 Years</option>
                                                    <option value="8-9 Years">8-9 Years</option>
                                                    <option value="9-10 Years">9-10 Years</option>
                                                    <option value="10+ Years">10+ Years</option>
                                                </select>
                                                @error('experience')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Job Description:</strong>
                                                <input class="form-control @error('description') is-invalid @enderror" placeholder="Job Description" name="description" id="description" autofocus>
                                                @error('description')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Organization:</strong>
                                                <input class="form-control @error('organization') is-invalid @enderror" placeholder="Organization Name" name="organization" id="organization" autofocus>
                                                @error('organization')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Nature Of Organization:</strong>
                                                <select class="form-control @error('nature_org') is-invalid @enderror" id="nature_org" name="nature_org" autofocus>
                                                    <option value="">Select</option>
                                                    <option value="Analytics">Analytics</option>
                                                    <option value="BFSI">BFSI</option>
                                                    <option value="BPO/KPO">BPO/KPO</option>
                                                    <option value="Consulting">Consulting</option>
                                                    <option value="Cooperative">Cooperative</option>
                                                    <option value="Education">Education</option>
                                                    <option value="Energy">Energy</option>
                                                    <option value="Firm">Firm</option>
                                                    <option value="Government">Government</option>
                                                    <option value="Health Care">Health Care</option>
                                                    <option value="Hotel">Hotel</option>
                                                    <option value="Infrastructure">Infrastructure</option>
                                                    <option value="IT/ITES">IT/ITES</option>
                                                    <option value="ITES">ITES</option>
                                                    <option value="Legal">Legal</option>
                                                    <option value="Logistics/Shipping">Logistics/Shipping</option>
                                                    <option value="Manufacturing">Manufacturing</option>
                                                    <option value="NGO">NGO</option>
                                                    <option value="Pharma">Pharma</option>
                                                    <option value="Printing &amp; Packaging">Printing &amp; Packaging
                                                    </option>
                                                    <option value="PSU">PSU</option>
                                                    <option value="Public Ltd.">Public Ltd.</option>
                                                    <option value="Pvt. Ltd.">Pvt. Ltd.</option>
                                                    <option value="Real Estate">Real Estate</option>
                                                    <option value="Retail">Retail</option>
                                                    <option value="Software">Software</option>
                                                    <option value="Startup">Startup</option>
                                                    <option value="Telecom">Telecom</option>
                                                    <option value="Tourism">Tourism</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                                @error('nature_org')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Address:</strong>
                                                <input class="form-control @error('address') is-invalid @enderror" placeholder="Address" name="address" id="address" autofocus>
                                                @error('address')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Phone:</strong>
                                                <input class="form-control @error('phone') is-invalid @enderror" placeholder="Phone Number" name="phone" id="phone" autofocus>
                                                @error('phone')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Email:</strong>
                                                <input class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" id="email" autofocus>
                                                @error('email')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Apply Before:</strong>
                                                <input class="form-control @error('apply_before') is-invalid @enderror" type="date" name="apply_before" id="apply_before" autofocus>
                                                @error('apply_before')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Posting Place:</strong>
                                                <input class="form-control @error('posting') is-invalid @enderror" placeholder="Place Of Posting" name="posting" id="posting" autofocus>
                                                @error('posting')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Number Of Posts:</strong>
                                                <input class="form-control @error('post_no') is-invalid @enderror" placeholder="Number Of Post" name="post_no" id="post_no" autofocus>
                                                @error('post_no')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>File Upload:</strong>
                                                    <input class="form-control @error('file_upload') is-invalid @enderror" id="file_upload" name="file_upload" type="file" autofocus>
                                                    <lable tabindex="0" for="file_upload" class="input-file-trigger">Only PDF, PNG, JPEG, JPG</lable>
                                                <strong><p class="file-return"></p></strong>
                                                @error('file_upload')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">

                                    <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

                                </div>
                            </form>

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
    var series = [{
            val: '1',
            data: 'Intermediate Pursuing'
        },
        {
            val: '1',
            data: 'Intermediate Qualified'
        },
        {
            val: '1',
            data: 'Final Pursuing'
        },
        {
            val: '1',
            data: 'Final Qualified'
        },
        {
            val: '2',
            data: 'Intermediate Pursuing'
        },
        {
            val: '2',
            data: 'Intermediate Qualified'
        },
        {
            val: '2',
            data: 'Final Pursuing'
        },
        {
            val: '2',
            data: 'Final Qualified'
        },
        {
            val: '3',
            data: 'Executive Pursuing'
        },
        {
            val: '3',
            data: 'Executive Qualified'
        },
        {
            val: '3',
            data: 'Professional Pursuing'
        },
        {
            val: '3',
            data: 'Professional Qualified'
        }
    ]

    $(document).ready(function() {

        /* View Job Post */
        $(document).on('click', '.view-post', function() {
            var post_id = $(this).data('id');
            $.get('approved-job-post/' + post_id, function(data) {
                if (data.length > 0) {
                let strDetail = ``;

                $.each(data, function(key, item) {
                strDetail += `<div class="vo_section">
                                <h3>
                                Job Post Details
                                </h3>
                                <div class="flex_card_jobs">
                                <div class="feeds_panel">
                                <h4>Experience (in yrs)</h4>
                                <p>${item.experience}</p>
                                </div>
                                <div class="feeds_panel">
                                <h4>Job Description</h4>
                                <p>${item.description}</p>
                                </div>
                                <div class="feeds_panel">
                                    <h4>Organization</h4>
                                <p>${item.organization}</p>
                                </div>
                                <div class="feeds_panel">
                                <h4>Nature Of Organization</h4>
                                <p>${item.nature_of_organization}</p>
                                </div>
                                <div class="feeds_panel">
                                <h4>Address</h4>
                                <p>${item.address}</p>
                                </div>

                                <div class="feeds_panel">
                                <h4>Phone</h4>
                                <p>${item.phone}</p>
                                </div>

                                <div class="feeds_panel">
                                <h4>Email</h4>
                                <p>${item.email}</p>
                                </div>

                                <div class="feeds_panel">
                                <h4>Apply Before</h4>
                                <p>${item.apply_before}</p>
                                </div>

                                <div class="feeds_panel">
                                <h4>Posting Place</h4>
                                <p>${item.posting_place}</p>
                                </div>

                                <div class="feeds_panel">
                                <h4>No. Of Posts</h4>
                                <p>${(item.no_of_post == 0 ? 'Not Disclosed' : (item.no_of_post == null ? 'Not Disclosed' : item.no_of_post))}</p>
                                </div>
                                ${item.file_path ? `<div class="feeds_panel">
                                <h4>View Job Details</h4>
                                    <a class="btn btn-primary custom_btnn" href="${item.file_path}" target="_blank"> view Job Details </a>
                                </div>`: `<div class="feeds_panel">
                                <h4>View Job Details</h4>
                                    <p>Not Available</p>
                                </div>`}
                                
                                </div>
                                </div>`;
                });
                $('#post_section').html(strDetail);
                $('#viewpost').modal('show');
            } else {
                    alert("No Details");
                }
            });
        });

        /* Delete Post */
        $(document).on('click', '.delete-post', function() {
            var post_id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            var choice = confirm(this.getAttribute('data-confirm'));

            if (choice) {
                $.ajax({
                    type: "DELETE",
                    url: "/admin-login/approved-job-post/" + post_id,
                    data: {
                        "id": post_id,
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

        $('#course').on('change', function() {
            var course = $(this).val();
            var options = '<option value="">Select</option>';
            $(series).each(function(index, value) {
                if (value.val == course) {
                    options += '<option value="' + value.data + '">' + value.data + '</option>';
                }
            });
            $('#qualification').html(options);
        });

        /* Edit post */
        $(document).on('click', '.edit-post', function() {
            var post_id = $(this).data('id');
            $.get('approved-job-post/' + post_id + '/edit', function(data) {
                $('#postCrudModal').html("Edit Post");
                $('#crud-modal').modal('show');
                $('#post_id').val(data.id);
                $('#course').val(data.course_id);
                $('#title').val(data.post);
                $('#salary').val(data.salary_offered);

                const qualificationOldValue = "{{ old('qualification') }}";
                var course = $('#course').val();

                var options = '<option value="">Select</option>';
                $(series).each(function(index, value) {
                    if (value.val == course) {
                        options += '<option value="' + value.data + '">' + value.data + '</option>';
                    }
                });
                $('#qualification').html(options);
                $('#qualification').val(qualificationOldValue);


                $('#qualification').val(data.qualification);
                $('#experience').val(data.experience);
                $('#description').val(data.description);
                $('#organization').val(data.organization);
                $('#nature_org').val(data.nature_of_organization);
                $('#address').val(data.address);
                $('#phone').val(data.phone);
                $('#email').val(data.email);
                $('#apply_before').val(data.apply_before);
                $('#posting').val(data.posting_place);
                $('#post_no').val(data.no_of_post);
                $('.file-return').html(data.file_path);
            })
        });

        /* Approve/Reject Post */
        $(document).on('click', '.off_switch, .on_switch', function() {
            var post_id = $(this).data('id');
            var status = $(this).data('status');
            var token = $("meta[name='csrf-token']").attr("content");
            var choice = confirm(this.getAttribute('data-confirm'));

            if (choice) {
                $.ajax({
                    type: "PUT",
                    url: "/admin-login/approved-job-post/" + post_id,
                    data: {
                        "id": post_id,
                        "status": status == 'approved' ? 'rejected' : 'approved',
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