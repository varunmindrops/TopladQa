@extends('layouts.admin-layout')
@prepend('head-data')
<script type="text/javascript" src="{{ asset('js/attachments.js') }}"></script>
<script src="//cdn.ckeditor.com/4.17.2/full/ckeditor.js"></script>
@endprepend

@section('content')

@include('admin.super-admin.layouts.sidebar')
<div class="content_super supar_main_cont">
    <div class="wrap_tab_contents">
        <div class="container-fluid">
            <div class="card_info shadow_blk">

                <h4 class="font-italic mb-2 anchor_title">Manage Courses</h4>

                <div class="col-lg-12">
                    <div class="table-responsive super_table">

                        <table id="course_table" class="table table-striped table-bordered data-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="100px">Sort Order No.</th>
                                    <th>Name</th>
                                    <th width="60px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>

                <!-- Edit Course level Modal -->
                <div class="modal fade full_width_mod" id="crud-modal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog col-md-12">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="courseLevelCrudModal"></h4> <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form id="course_form" action="{{ route('course-level.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <input type="hidden" name="course_id" id="course_id">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <strong>Title</strong>
                                                <textarea name="meta_title" class="ck_editor form-control" id="meta_title"></textarea>
                                            </div>
                                        </div>
                                         <div class="col-sm-12">
                                            <div class="form-group">
                                                <strong>Keywords</strong>
                                             <textarea name="meta_keywords" class="ck_editor form-control" id="meta_keywords" ></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <strong>Meta Description</strong>
                                                 <textarea name="meta_description" class="ck_editor form-control" id="meta_description" style="width:100%;height:100%;"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <strong>Page Description</strong>
                                                 <textarea name="page_description" class="ck_editor form-control" id="page_description" style="width:100%;height:100%;"></textarea>
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
        var table = $('#course_table').DataTable({
            serverSide: true,
            ajax: "{{ route('course-level.index') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        
     $(document).on('click', '.edit-subject', function() {
            var course_id = $(this).data('id');
            $.get('course-level/' + course_id + '/edit', function(data) {
                $('#courseLevelCrudModal').html("Edit Course Level");
                $('#crud-modal').modal('show');
                $('#course_id').val(data.id);
                $("#meta_title").val(data.meta_title);
                CKEDITOR.instances['meta_title'].setData(data.meta_title);
                CKEDITOR.instances['meta_keywords'].setData(data.meta_keywords);
                CKEDITOR.instances['meta_description'].setData(data.meta_description);
                CKEDITOR.instances['page_description'].setData(data.page_description);
            })
        });

        $('#course_form').on('submit', function(event) { 
            var keyword = CKEDITOR.instances['meta_keywords'].getData();
            var title = CKEDITOR.instances['meta_title'].getData();
            var desc = CKEDITOR.instances['meta_description'].getData();
            var Pagedesc = CKEDITOR.instances['page_description'].getData();
            if(keyword == '' || title == ''|| desc == '' || Pagedesc == '')
            {
                event.preventDefault();
                alert("Please fill all the fields.");
            }
        });
    });
</script>
<!--ckeditor start-->
<script>
        var allEditors = document.querySelectorAll('.ck_editor');
        for (var i = 0; i < allEditors.length; ++i) {
            CKEDITOR.replace(allEditors[i]);
        }
</script> 
<!--ckeditor end-->
@endpush 