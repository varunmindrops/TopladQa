@extends('layouts.admin-layout')

@prepend('head-data')
<link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
<script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>
@endprepend

@section('content')

@include('admin.super-admin.layouts.sidebar')
<div class="content_super supar_main_cont">
    <div class="wrap_tab_contents">
        <div class="container-fluid">
            <div class="card_info shadow_blk">

                <h4 class="font-italic mb-2 anchor_title">Manage Subjects</h4>

                <div class="col-lg-12 subject_table">
                    <div class="table-responsive super_table">

                        <table id="subject_table" class="table table-striped table-bordered data-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sort Order No.</th>
                                    <th>Name</th>
                                    <th>Course Level</th>
                                    <!-- <th>Course Overview</th>
                                    <th>Course Syllabus</th> -->
                                    <th width="60px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>

                <!-- Edit Subject Modal -->
                <div class="modal fade full_width_mod" id="crud-modal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog col-md-12">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="subjectCrudModal"></h4> <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form id="subject_form" action="{{ route('subject.store') }}" method="POST" autocomplete="off">
                                <div class="modal-body">

                                    <input type="hidden" name="subject_id" id="subject_id">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <strong>Course Overview:</strong>
                                                <input id="paper_overview" type="hidden" value="" name="paper_overview">
                                                <trix-editor id="overview-content" input="paper_overview"></trix-editor>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <strong>Course Syllabus:</strong>
                                                <input id="paper_syllabus" type="hidden" value="" name="paper_syllabus">
                                                <trix-editor id="syllabus-content" input="paper_syllabus"></trix-editor>
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
        var table = $('#subject_table').DataTable({
            //processing: true,
            serverSide: true,
            ajax: "{{ route('subject.index') }}",
            order: [0, 'asc'],
            columns: [
                {
                    data: 'sort_order',
                    name: 'sort_order'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'mst_course_level.name',
                    name: 'name'
                },
                // {
                //     data: 'paper_overview',
                //     name: 'paper_overview',
                //     render: function(data) {
                //         var div = document.createElement("div");
                //         div.innerHTML = data;
                //         return div.innerText;
                //     }
                // },
                // {
                //     data: 'paper_syllabus',
                //     name: 'paper_syllabus',
                //     render: function(data) {
                //         var div = document.createElement("div");
                //         div.innerHTML = data;
                //         return div.innerText;
                //     }
                // },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        /* Edit Subject */
        $(document).on('click', '.edit-subject', function() {
            var subject_id = $(this).data('id');
            $.get('subject/' + subject_id + '/edit', function(data) {
                $('#subjectCrudModal').html("Edit Subject");
                $('#crud-modal').modal('show');
                $('#subject_id').val(data.id);
                $('#name').val(data.name);
                $('#course_level').val(data.course_level_id);
                $('#overview-content').val(data.paper_overview);
                $('#syllabus-content').val(data.paper_syllabus);
            })
        });

        document.addEventListener("trix-file-accept", function(event) {
            event.preventDefault()
            alert("File attachment not supported!")
        });

        $('#subject_form').on('submit', function(event) { 
            var overview = $('#overview-content').val();
            var syllabus = $('#syllabus-content').val();

            if(overview == '' || syllabus == '')
            {
                event.preventDefault();
                alert("Please fill all the fields.");
            }
        });

    });
</script>
@endpush