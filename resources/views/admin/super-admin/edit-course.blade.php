@php
$userArr = $user->toArray();
@endphp

@extends('layouts.admin-layout')


@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">


 
                    @include('admin.super-admin.layouts.sidebar')
                    <div class="content_super supar_main_cont">
                    <div class="home_dashboard">@include('admin.super-admin.layouts.super-admin-btn')</div>
                        <div class="wrap_tab_contents">
                            <div class="card_info shadow_blk">
                                <h4 class="font-italic mb-2">Course and Subject info</h4>
                                <div class="form_data d-flex justify-content-between align-items-center wrap_in_form">

                                    <div class="col-md-12">
                                        <div class="form-group model_btns">
                                            <label class="fg-l">Kindly Select the Course. </label>
                                        </div>
                                        <div class="selcted_courses" id="selected_course_checkbox">
                                            @foreach($mstCourse as $key=>$course)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input chk" type="checkbox" name="course[]"
                                                    value="{{ $course->id }}" id="courseCheck_{{($key+1)}}" <?php if ($arr = array_filter($userArr['teacher_course'], function ($v) use ($course) {
                                                        return ($v['course_id'] == $course->id);
                                                    })) {
                                                            echo 'checked';
                                                        } ?>>
                                                <label class="form-check-label" for="courseCheck_{{($key+1)}}">
                                                    {{ $course->name }} </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group model_btns">
                                            <label class="fg-l">Kindly Select the Course Level. </label>
                                            <button type="button" class="btn btn-primary f-size"
                                                id="show-subject-button">Show Subjects</button>
                                        </div>
                                        <div class="selcted_courses" id="selected_course_level_checkbox">
                                            @foreach($mstCourseLevel as $key=>$courseLevel)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input chk" type="checkbox"
                                                    name="course_level[]" value="{{ $courseLevel->id }}"
                                                    id="levelCheck_{{($key+1)}}" <?php if ($arr = array_filter($userArr['teacher_course_level'], function ($v) use ($courseLevel) {
                                                        return ($v['course_level_id'] == $courseLevel->id);
                                                        })) {
                                                                echo 'checked';
                                                            } ?>>
                                                <label class="form-check-label" for="levelCheck_{{($key+1)}}">
                                                    {{ $courseLevel->name }} </label>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div>

                                        </div>

                                        <label>Selected Subjects</label>
                                        <div class="teacher_subjectss">
                                            @foreach($user['teacherSubject'] as $subject)
                                            <ul>
                                                <li>{{ $subject['mstSubject']['name'] }}</li>
                                            </ul>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              
<!-- Modal -->
<div id="subjectsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form action="/teacher/course/{{Auth::id()}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title">Select Subjects</h4> <button type="button" class="close"
                        data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- <p>Select Subjects</p> -->
                    <div id="teacher-subject">

                    </div>
                    <div>
                        <input type="hidden" name="course_id" id="course_input">
                        <input type="hidden" name="course_level_id" id="course_level_input">
                    </div>
                </div>
                <div class="modal-footer dual_model_btn">
                    <button type="submit" class="btn btn-primary f-size">Save</button>
                    <button type="button" class="btn btn-primary f-size" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>
$(document).ready(function() {

    // async function submitForm(selectedcourse) {
    //     const response = await fetch('http://' + window.location.host + '/teacher/teacher-level', {
    //         method: 'POST',
    //         mode: 'cors',
    //         cache: 'no-cache',
    //         credentials: 'same-origin',
    //         headers: {
    //             'Content-Type': 'application/json',
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         redirect: 'follow',
    //         referrerPolicy: 'no-referrer',
    //         body: JSON.stringify({
    //             teacher_course: selectedcourse
    //         })
    //     });
    //     return await response.json();
    // }

    async function submitForm(selectedcourseLevel) {
        const response = await fetch('https://' + window.location.host + '/teacher/teacher-subject', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            redirect: 'follow',
            referrerPolicy: 'no-referrer',
            body: JSON.stringify({
                teacher_course_level: selectedcourseLevel
            })
        });
        return await response.json();
    }

    $('#show-subject-button').on('click', function(e) {
        e.preventDefault();

        let arrTeacherSubject = <?php echo json_encode($userArr['teacher_subject']); ?>;
        let arrSelectedCourse = [];
        let arrSelectedCourseLevel = [];

        $('#selected_course_checkbox input[type=checkbox]:checked').each(function() {
            arrSelectedCourse.push($(this).val());
        });

        $('#selected_course_level_checkbox input[type=checkbox]:checked').each(function() {
            arrSelectedCourseLevel.push($(this).val());
        });

        submitForm(arrSelectedCourse)
            .then((result) => {
                let strLevelCheckbox = ``;
                $.each(result.levels, function(key, item) {
                    let matchedLevel = arrSelectedCourse.find(function(v) {
                        return (v.level_id == item.id);
                    });
                    let checked = matchedLevel ? 'checked' : '';
                    strLevelCheckbox += `<div class="form-check">
							<input class="form-check-input " type="checkbox" name="level_id[]" value="${item.id}" id="levelCheck${key+1}"  ${checked}>
							<label class="form-check-label" for="levelCheck${key+1}"> ${ item.name } </label>
						</div>`;
                });
                $('#teacher-level').html(strLevelCheckbox);
                $('#course_input').val(arrSelectedCourse);
                $('#subjectsModal').modal('show');
            })
            .catch((error) => {
                console.error('Error:', error);
            });

        submitForm(arrSelectedCourseLevel)
            .then((result) => {
                let strSubjectCheckbox = ``;
                $.each(result.subjects, function(key, item) {
                    let matchedSubject = arrTeacherSubject.find(function(v) {
                        return (v.subject_id == item.id);
                    });
                    let checked = matchedSubject ? 'checked' : '';
                    strSubjectCheckbox += `<div class="form-check">
							<input class="form-check-input " type="checkbox" name="subject_id[]" value="${item.id}" id="subjectCheck${key+1}"  ${checked}>
							<label class="form-check-label" for="subjectCheck${key+1}"> ${ item.name } </label>
						</div>`;
                });
                $('#teacher-subject').html(strSubjectCheckbox);
                $('#course_level_input').val(arrSelectedCourseLevel);
                $('#subjectsModal').modal('show');
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    });

});
</script>

@endpush