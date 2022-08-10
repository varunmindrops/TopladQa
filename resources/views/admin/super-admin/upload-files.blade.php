@extends('layouts.admin-layout')

@section('content')

                    @include('admin.super-admin.layouts.sidebar')
                    <div class="content_super supar_main_cont">
                    <div class="home_dashboard">@include('admin.super-admin.layouts.super-admin-btn')</div>
                        <div class="wrap_tab_contents">
                            <div class="card_info shadow_blk">
                                <h4 class="font-italic mb-2">File Upload</h4>
                                <div class="form_data d-flex justify-content-between  align-items-center common_widths">
                                    <form method="POST" action="/teacher/upload-files" autocomplete="off"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form_data d-flex justify-content-between  align-items-center">
                                            <div class="form-group col-md-6">
                                                <label class="asterisk">Title</label>
                                                <input class="form-control @error('title') is-invalid @enderror"
                                                    type="text" name="title" value="{{ old('title') }}"
                                                    placeholder="Title" autofocus>
                                                @error('title')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="asterisk" for="category">Category</label>
                                                <select class="form-control @error('category') is-invalid @enderror"
                                                    name="category" id="category" value="{{ old('category') }}"
                                                    autofocus>
                                                    <!-- <option value="">Select Category</option> -->
                                                    <option value="cma">CMA General</option>
                                                    <option value="cs">CS General</option>
                                                    <option value="ca">CA General</option>
                                                    @foreach($course_level as $level)
                                                    <option value="{{$level->id}}"
                                                        <?php {{ echo old('category') == $level['id'] ? 'selected' : '';}} ?>>
                                                        {{$level['name']}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label class="asterisk">Description</label>
                                                <textarea
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    name="description" rows="6" placeholder="Add File Description"
                                                    autofocus>{{ old('description') }}</textarea>
                                                @error('description')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-12 uploaders">
                                                <label class="asterisk">File Upload</label>
                                                <div class="input-file-container">
                                                    <input class="input-file @error('my_file') is-invalid @enderror"
                                                        id="my_file" name="my_file" type="file" autofocus>
                                                    <label tabindex="0" for="my_file" class="input-file-trigger">Choose
                                                        a
                                                        file...</label>
                                                </div>
                                                <p class="file-return"></p>
                                                @error('my_file')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group update_btns right_field">
                                                <button type="submit" class="btn btn-primary f-size">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
               
<script>
document.querySelector("html").classList.add('js');

var fileInput = document.querySelector(".input-file"),
    button = document.querySelector(".input-file-trigger"),
    the_return = document.querySelector(".file-return");

button.addEventListener("keydown", function(event) {
    if (event.keyCode == 13 || event.keyCode == 32) {
        fileInput.focus();
    }
});
button.addEventListener("click", function(event) {
    fileInput.focus();
    return false;
});
fileInput.addEventListener("change", function(event) {
    the_return.innerHTML = this.files[0].name;
});
</script>
@endsection