@extends('layouts.admin-layout')

@section('content')

@include('admin.super-admin.layouts.sidebar')
<div class="content_super supar_main_cont">
    <div class="wrap_tab_contents">
        <div class="container-fluid">
            <div class="card_info shadow_blk">

                <h4 class="font-italic mb-2 anchor_title">Manage Coupons <a class="btn btn-primary linked_btn f-size" id="new-coupon" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i> Add New
                        Coupon</a></h4>

                <!-- <div class="col-lg-12 margin-tb">
                    <div class="wrap_new_coupons">
                        <div class="pull-right">
                            <a class="btn btn-primary linked_btn f-size" id="new-coupon" data-toggle="modal">New Coupon</a>
                        </div>
                    </div>
                </div> -->

                <div class="col-lg-12 coupon_table">
                    <div class="table-responsive super_table">
                        <table id="coupon_table" class="table table-striped table-bordered data-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Type</th>
                                    <th>Value</th>
                                    <th class="mid_sizer">Expiry Date</th>
                                    <th class="mid_sizer">Creation Date</th>
                                    <th width="60px">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            </tbody>

                        </table>

                    </div>
                </div>

                <!-- Add and Edit Coupon Modal -->
                <div class="modal fade" id="crud-modal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="couponCrudModal"></h4> <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form id="coupon_form" action="{{ route('coupon.store') }}" method="POST" autocomplete="off">
                                <div class="modal-body">

                                    <input type="hidden" name="coupon_id" id="coupon_id">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Name:</strong>
                                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" autofocus>
                                                @error('name')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Code:</strong>
                                                <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" placeholder="Code" autofocus>
                                                @error('code')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong for="type">Type:</strong>
                                                <select class="form-control @error('type') is-invalid @enderror" id="type" name="type" autofocus>
                                                    <option value="">Select Type</option>
                                                    <option value="percentage">Percentage</option>
                                                    <option value="fixed">Fixed</option>
                                                </select>
                                                @error('type')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Value:</strong>
                                                <input type="text" name="value" id="value" class="form-control @error('value') is-invalid @enderror" placeholder="Value" autofocus>
                                                @error('value')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Expiry Date:</strong>
                                                <input class="form-control @error('expiry_date') is-invalid @enderror" type="date" name="expiry_date" id="expiry_date" autofocus>
                                                @error('expiry_date')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <div class="modal-footer">

                                    <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary">Save</button>
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
    $(document).ready(function() {
        var table = $('#coupon_table').DataTable({
            //processing: true,
            serverSide: true,
            ajax: "{{ route('coupon.index') }}",
            order: [5, 'desc'],
            columns: [
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'code',
                    name: 'code'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'value',
                    name: 'value'
                },
                {
                    data: 'expiry_date',
                    name: 'expiry_date',
                    render: function(data) {
                        return (formatDateTimeToDate(data));
                    }
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function(data) {
                        return (formatDateTimeToDate(data));
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        /* When click Add New Coupon button */
        $('#new-coupon').click(function() {
            $('#btn-save').val("create-coupon");
            $('#coupon').trigger("reset");
            $('#couponCrudModal').html("Add New Coupon");
            $('#crud-modal').modal('show');
        });

        /* Edit coupon */
        $(document).on('click', '.edit-coupon', function() {
            var coupon_id = $(this).data('id');
            $.get('coupon/' + coupon_id + '/edit', function(data) {
                $('#couponCrudModal').html("Edit Coupon");
                $('#crud-modal').modal('show');
                $('#coupon_id').val(data.id);
                $('#name').val(data.name);
                $('#code').val(data.code);
                $('#type').val(data.type);
                $('#value').val(data.value);
                $('#expiry_date').val(data.expiry_date);
            })
        });

        $('#coupon_form').on('submit', function(event) {
            var name = $('#name').val();
            var code = $('#code').val();
            var type = $('#type').val();
            var value = $('#value').val();
            var expiry_date = $('#expiry_date').val();

            var name_length = name.length;

            var name_regex = /^([a-zA-Z\.]+\s)*[a-zA-Z\.]+$/;
            var value_regex = /^[0-9]+$/;

            if (name == '' || code == '' || type == '' || value == '' || expiry_date == '') {
                event.preventDefault();
                alert("Please fill all the fields.");
            } else if (name_length > 255) {
                event.preventDefault();
                alert("Name should not have more than 255 characters.");
            } else if (!name_regex.test(name)) {
                event.preventDefault();
                alert("Only letters, dot(.), single space between words are allowed in name field.");
            } else if (!value_regex.test(value)) {
                event.preventDefault();
                alert("Value should only contain digits.");
            }
        });

        /* Delete coupon */
        $(document).on('click', '.delete-coupon', function() {
            var coupon_id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            // confirm("Are You sure you want to delete !");
            var choice = confirm(this.getAttribute('data-confirm'));

            if (choice) {

                $.ajax({
                    type: "DELETE",
                    url: "/admin-login/coupon/" + coupon_id,
                    data: {
                        "id": coupon_id,
                        "_token": token,
                    },
                    success: function(data) {
                        //$('#msg').html('Coupon entry deleted successfully');
                        //$("#coupon_id_" + coupon_id).remove();
                        table.ajax.reload();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            }
        });
    });
</script>
@endpush