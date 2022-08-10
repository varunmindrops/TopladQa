@php
function getDateInSiteFormat($date, $withoutTime = false)
{
    $format = 'd-m-Y';
    $format .= $withoutTime ? '' : ' H:i:s';
    if ($date) {
        $date = date($format, strtotime($date));
    }
    return $date;
}
@endphp

@extends($segment == 'cma' ? 'layouts.cma-layout' : ($segment == 'cs' ? 'layouts.cs-layout' : ($segment == 'ca' ? 'layouts.ca-layout' : 'layouts.ca-layout')))

@prepend('head-data')
    @if ($segment == 'cma')
        <title>CMA Foundation, Inter, Final Notes PDF | TopLad</title>
        <meta name="description"
            content="Get the CMA course PDF notes of foundation, inter and final online classes. Find the best CMA notes according to the group from India's top CMA faculty at Toplad.">
        <meta name="keywords"
            content="CMA, CMA courses online, Foundation to Final, Top Faculty of India, Academy of Excellence, CMA in Future, CMA Books, Online CMA Classes" />
    @elseif($segment == 'cs')
        <title>CSEET, CS Executive, CS Professional Notes PDF</title>
        <meta name="description"
            content="Get the CS course PDF notes of CSEET, executive and professionals online classes. Find the best CS notes according to the group from India's top CS faculty at Toplad.">
        <meta name="keywords"
            content="CS, CS courses online, CSEET, CS Executive, CS Professional, Top Faculty of India, Academy of Excellence, CS in Future, CS Books, Online CS Classes" />
    @elseif($segment == 'ca')
        <title>CA Foundation, Inter, Final Notes PDF | TopLad</title>
        <meta name="description"
            content="Get the CA course PDF notes of foundation, inter and final online classes. Find the best CA notes according to the group from India's top CA faculty at Toplad.">
        <meta name="keywords"
            content="CA, CA courses online, CA Foundation, CA Inter, CA Inter Group 1, CA Inter Group 2, CA Final, CA Final Group 1, CA Final Group 2, Top Faculty of India, Academy of Excellence, CA in Future, CA Books, CA Notes, Online CA Classes" />
    @endif
@endprepend

@section('content')


    <div class="inner_theme_page p-b20 inner_header_page">
        <nav aria-label="breadcrumb" class="bdcrumb">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a title="{{ strtoupper($segment) }}"
                            href="/{{ $segment }}">{{ strtoupper($segment) }}</a></li>
                    <li title="Important News & Announcements" class="breadcrumb-item active" aria-current="page">Downloads
                    </li>
                </ol>
            </div>
        </nav>

        <div class="wrap_theme_pages">



            <section class="section-full course-des">
                <div class="container">
                    <div class="row">
                        <div class="heading-section">
                        </div>
                        <div class="inner_pblocks vert_sider">

                            <div class="cours-a">

                                <div class="col-md-3 col-sm-12 dl_lblock">
                                    <ul class="nav nav-tabs">
                                        <li class=""><a title="{{ strtoupper($segment) }} General"
                                                class="types-btn tab_cbtns active" id="general-tab" data-toggle="tab"
                                                href="#general">{{ strtoupper($segment) }} General</a></li>
                                        @foreach ($course_level as $level)
                                            <li class=""><a title="{{ $level['name'] }}"
                                                    class="types-btn tab_cbtns <?php echo $loop->index == 0 ? '' : ''; ?>"
                                                    id="course<?php echo $loop->index + 1; ?>-tab" data-toggle="tab"
                                                    href="#course<?php echo $loop->index + 1; ?>">{{ $level['name'] }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-9 col-sm-12 dl_lblock">
                                    <div class="download_main">
                                        <div class="tab-content tab_layout">

                                            <div class="tab-pane show active" id="general-tab">
                                                <div class="wrap_tab_oput">
                                                    <div class="tab_collactions">
                                                        @if ($segment == 'cma')
                                                            @if ($cmaGeneral->isEmpty())
                                                                <div class="table_layut col-md-12 add_products">
                                                                    <div class="first_product">
                                                                        <p>Nothing to download here, please check back
                                                                            later.</p>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                @foreach ($cmaGeneral as $data)
                                                                    @php $file_name = str_replace(".", "", $data['name']); @endphp
                                                                    @if (!empty($data['user']['slug']))
                                                                        <div class="wrap_tab_d">
                                                                            <div class="title_dl">
                                                                                <span
                                                                                    class="dl_namme">{{ $data['name'] }}</span>
                                                                                <div class="c_dl_wrap">
                                                                                    <div class="desc_dl">
                                                                                        <p>{!! nl2br(e($data['description'])) !!}</p>
                                                                                    </div>
                                                                                    <div class="wrap_writer">
                                                                                        <span>
                                                                                            <div class="uploader_p">
                                                                                                <a href="/faculty/{{ $data['user']['slug'] }}"
                                                                                                    title="Faculty Name">{{ $data['user']['name'] }}</a>
                                                                                                <b>.</b>
                                                                                                <span
                                                                                                    class="upload_date">{{ getDateInSiteFormat($data['created_at'], true) }}</span>
                                                                                            </div>

                                                                                        </span>

                                                                                        <a class="btn btn-primary custom_btnn show-form download-btn"
                                                                                            faculty-name="{{ $data['user']['name'] }}"
                                                                                            data-id="{{ $data['id'] }}"
                                                                                            data-path="{{ strstr($data['file_path'], '/images') }}"
                                                                                            download="{{ $data['name'] }}"
                                                                                            level="CMA General">Download</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @elseif($segment == 'cs')
                                                            @if ($csGeneral->isEmpty())
                                                                <div class="table_layut col-md-12 add_products">
                                                                    <div class="first_product">
                                                                        <p>Nothing to download here, please check back
                                                                            later.</p>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                @foreach ($csGeneral as $data)
                                                                    @php $file_name = str_replace(".", "", $data['name']); @endphp
                                                                    @if (!empty($data['user']['slug']))
                                                                        <div class="wrap_tab_d">
                                                                            <div class="title_dl">
                                                                                <span
                                                                                    class="dl_namme">{{ $data['name'] }}</span>
                                                                                <div class="c_dl_wrap">
                                                                                    <div class="desc_dl">
                                                                                        <p>{!! nl2br(e($data['description'])) !!}</p>
                                                                                    </div>
                                                                                    <div class="wrap_writer">
                                                                                        <span>
                                                                                            <div class="uploader_p">
                                                                                                <a href="/faculty/{{ $data['user']['slug'] }}"
                                                                                                    title="Faculty Name">{{ $data['user']['name'] }}</a>
                                                                                                <b>.</b>
                                                                                                <span
                                                                                                    class="upload_date">{{ getDateInSiteFormat($data['created_at'], true) }}</span>
                                                                                            </div>
                                                                                        </span>
                                                                                        <a class="btn btn-primary custom_btnn show-form download-btn"
                                                                                            faculty-name="{{ $data['user']['name'] }}"
                                                                                            data-id="{{ $data['id'] }}"
                                                                                            data-path="{{ strstr($data['file_path'], '/images') }}"
                                                                                            download="{{ $data['name'] }}"
                                                                                            level="CS General">Download</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @elseif($segment == 'ca')
                                                            @if ($caGeneral->isEmpty())
                                                                <div class="table_layut col-md-12 add_products">
                                                                    <div class="first_product">
                                                                        <p>Nothing to download here, please check back
                                                                            later.</p>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                @foreach ($caGeneral as $data)
                                                                    @php $file_name = str_replace(".", "", $data['name']); @endphp
                                                                    @if (!empty($data['user']['slug']))
                                                                        <div class="wrap_tab_d">
                                                                            <div class="title_dl">
                                                                                <span
                                                                                    class="dl_namme">{{ $data['name'] }}</span>
                                                                                <div class="c_dl_wrap">
                                                                                    <div class="desc_dl">
                                                                                        <p>{!! nl2br(e($data['description'])) !!}</p>
                                                                                    </div>
                                                                                    <div class="wrap_writer">
                                                                                        <span>
                                                                                            <div class="uploader_p">
                                                                                                <a href="/faculty/{{ $data['user']['slug'] }}"
                                                                                                    title="Faculty Name">{{ $data['user']['name'] }}</a>
                                                                                                <b>.</b>
                                                                                                <span
                                                                                                    class="upload_date">{{ getDateInSiteFormat($data['created_at'], true) }}</span>
                                                                                            </div>

                                                                                        </span>
                                                                                        <a class="btn btn-primary custom_btnn show-form download-btn"
                                                                                            faculty-name="{{ $data['user']['name'] }}"
                                                                                            data-id="{{ $data['id'] }}"
                                                                                            data-path="{{ strstr($data['file_path'], '/images') }}"
                                                                                            download="{{ $data['name'] }}"
                                                                                            level="CA General">Download</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            @foreach ($course_level as $level)
                                                <div class="tab-pane  show <?php echo $loop->index == 0 ? '' : ''; ?>"
                                                    id="course<?php echo $loop->index + 1; ?>">
                                                    <div class="wrap_tab_oput">
                                                        <div class="tab_collactions">

                                                            @if ($level['uploadFile']->isEmpty())
                                                                <div
                                                                    class="table_layut col-md-12 add_products align_dloadd">
                                                                    <div class="first_product">
                                                                        <p>Nothing to download here, please check back
                                                                            later.</p>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                @foreach ($level['uploadFile'] as $file)
                                                                    @php $file_name = str_replace(".", "", $file['name']); @endphp
                                                                    @if (!empty($file['user']['slug']))
                                                                        <div class="wrap_tab_d">
                                                                            <div class="title_dl">
                                                                                <span
                                                                                    class="dl_namme">{{ $file['name'] }}</span>
                                                                                <div class="c_dl_wrap">
                                                                                    <div class="desc_dl">
                                                                                        <p>{!! nl2br(e($file['description'])) !!}</p>
                                                                                    </div>
                                                                                    <div class="wrap_writer">
                                                                                        <span>
                                                                                            <div class="uploader_p">
                                                                                                <a href="/faculty/{{ $file['user']['slug'] }}"
                                                                                                    title="Faculty Name">{{ $file['user']['name'] }}</a>
                                                                                                <b>.</b>
                                                                                                <span
                                                                                                    class="upload_date">{{ getDateInSiteFormat($file['created_at'], true) }}</span>
                                                                                            </div>

                                                                                        </span>
                                                                                        <a class="btn btn-primary custom_btnn show-form download-btn"
                                                                                            faculty-name="{{ $file['user']['name'] }}"
                                                                                            data-id="{{ $file['id'] }}"
                                                                                            data-path="{{ strstr($file['file_path'], '/images') }}"
                                                                                            download="{{ $file['name'] }}"
                                                                                            level="{{ $level['name'] }}">Download</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </section>

        </div>

    </div>
    <div id="downloadModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content">
                <form action="{{ action('DownloadController@store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal"
                            id="close-download-btn">&times;</button>
                        <h6 class=" text-left my-1" style="line-height: 1.7">Kindly Enter Your Email, we will send
                            download link to your email
                            right
                            away! </h6>
                        <hr>
                        <div class="my-form">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email:</label>
                                <div class="col-sm-10">
                                    <input type="email" name="student_email" class="form-control"
                                        placeholder="Enter Your Email" required>
                                </div>
                            </div>

                            <input type="hidden" name="notes_id" id="note_id">
                            <input type="hidden" name="course_level" id="course_level" value="">
                            <input type="hidden" name="faculty_name" id="faculty" value="">
                            <input type="hidden" name="segment" id="segment" value="{{ $segment }}">
                            <input type="hidden" name="title" id="title" value="">
                            <input type="hidden" name="file_path" id="file_path" download="">
                            <div class="form-btn text-right">
                                <button type="submit" class="btn btn-primary f-size" value="" data-id=""
                                    id="model-btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $(".show-form").click(function() {
                var id = $(this).attr('data-id');
                $('#downloadModal').modal('show');
                $('#note_id').val(id);
                $('.opacity-background-download').css('background-color', '#7d7f80')
            });
            $("#close-download-btn").click(function() {
                $('.opacity-background-download').css('background-color', 'rgb(248 252 253)')
            });

            $('#downloadModal').on('hidden.bs.modal', function(e) {
                $('.opacity-background-download').css('background-color', 'rgb(248 252 253)')
            });
            $(".download-btn").click(function() {
                var activeLevel = ''
                $(".types-btn").each(function() {
                    if ($(this).hasClass('active')) {
                        activeLevel = $(this).attr('title')
                    }
                })

                var path = $(this).attr('data-path');
                var faculty = $(this).attr('faculty-name');
                var filename = $(this).attr('download');

                $('#file_path').val(path);
                $('#faculty').val(faculty);
                $('#title').val(filename);
                $('#course_level').val(activeLevel)
            });
        });
    </script>
@endpush
