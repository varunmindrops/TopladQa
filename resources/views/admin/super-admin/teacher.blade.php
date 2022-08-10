@extends('layouts.admin-layout')

@section('content')

@include('admin.super-admin.layouts.sidebar')

<div class="content_super supar_main_cont">
    <div class="wrap_tab_contents">
        <div class="container-fluid">
            <div class="card_info shadow_blk">
                <h4 class="font-italic mb-2">Manage Teachers</h4>
                <div class="col-lg-12 teacher_table">
                    <div class="table-responsive super_table">
                        <table id="teacher_table" class="table table-striped table-bordered data-table"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th width="60px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>

                        </table>
                    </div>
                </div>

                <!-- View Teacher Details Modal -->
                <div id="viewteacher" class="modal fade common_model" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Teacher Details</h4> <button type="button" class="close"
                                    data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <!-- <hr class="ov_devider"> -->
                                <div class="ov_main_wrap">
                                    <div class="col-md-12 left_order common_order">
                                        <div class="vo_section">
                                            <h3>Product Details</h3>
                                            <div class="col-md-12 sec_colls add_vertical">
                                                <div class="table-responsive vo_table">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Course Name</>
                                                                <th class="min_set_wid">Language</th>
                                                                <th class="min_set_wid">Attempt</th>
                                                                <th>Delivery Method</th>
                                                                <th>Minimum Market Price</th>
                                                                <th>Proposed Market Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="product_table">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer dual_model_btn">
                                <button type="submit" class="btn btn-primary f-size"
                                    style="visibility: hidden;">Download Invoice</button>
                                <button type="button" class="btn btn-primary f-size" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<form action="/stealth-login" method="POST" id="stealth-login-form" hidden>
    @csrf
    <input type="hidden" name="user_id" value="" id="login_user_id">
    <button type="submit">save</button>
</form>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    var table = $('#teacher_table').DataTable({
        //processing: true,
        serverSide: true,
        ajax: "{{ route('teacher.index') }}",
        order: [0, 'asc'],
        columns: [{
                data: 'name',
                name: 'name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'phone',
                name: 'phone'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });

    /* View Teacher Details */
    $(document).on('click', '.view-teacher', function() {
        var teacher_id = $(this).data('id');
        $.get('teacher/' + teacher_id, function(data) {
            let strDetail = ``;
            $.each(data.product, function(key, item) {
                strDetail +=
                    `<tr>
                            <td class="saprate_comma sub" rowspan=${(item.product_price.length)}>${item.subject.name}</td><td class="combined_tds"  rowspan=${(item.product_price.length)}>`
                $.each(item.video_language, function(key, item) {
                    strDetail += `
                            <span>${item.mst_language.name}</span>`
                });
                $.each(item.product_price, function(key, item) {
                    strDetail +=
                        `</td>
                            <td class="saprate_comma min_set_wid">${item.attempt.name}</td>
                            <td>${item.video_delivery_type.name}, ${item.book_delivery_type.name}</td>
                            <td class="saprate_comma price_set"><i class="fa fa-rupee"></i> ${item.minimum_market_price}</td>
                            <td class="saprate_comma price_set"><i class="fa fa-rupee"></i> ${item.proposed_market_price}</td> </tr>`;
                });
                // `</tr>`;
            });
            $('#product_table').html(strDetail);
        })
        $('#viewteacher').modal('show');
    });

    /* Delete Teacher */
    $(document).on('click', '.delete-teacher', function() {
        var teacher_id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        // confirm("Are You sure you want to delete !");
        var choice = confirm(this.getAttribute('data-confirm'));

        if (choice) {

            $.ajax({
                type: "DELETE",
                url: "/admin-login/teacher/" + teacher_id,
                data: {
                    "id": teacher_id,
                    "_token": token,
                },
                success: function(data) {
                    //$('#msg').html('Teacher deleted successfully');
                    //$("#teacher_id_" + teacher_id).remove();
                    table.ajax.reload();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        }
    });

    /* Active/Deactive Teacher */
    $(document).on('click', '.off_switch, .on_switch', function() {
        var teacher_id = $(this).data('id');
        var status = $(this).data('status');
        var token = $("meta[name='csrf-token']").attr("content");
        var choice = confirm(this.getAttribute('data-confirm'));

        if (choice) {
            $.ajax({
                type: "PUT",
                url: "/admin-login/teacher/" + teacher_id,
                data: {
                    "id": teacher_id,
                    "status": status == 1 ? 0 : 1,
                    "_token": token,
                },
                success: function(data) {
                    table.ajax.reload();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        }
    });

    $(document).on('click', '.stealth-login-btn', function() {
        const user_id = $(this).data('user_id');
        $('#login_user_id').val(user_id);
        $('#stealth-login-form').submit();
    });
});
</script>
@endpush