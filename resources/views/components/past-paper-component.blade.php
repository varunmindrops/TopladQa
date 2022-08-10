<table id="" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Group</th>
            <!-- <th>Paper No.</th> -->
            <th>Subject</th>
            <th>Faculty</th>
            <th class="vid_cav_sizerr">Video Coverage</th>
            <th class="th_sizerr">Sale Mode</th>
            <th class="text-center">Price</th>
            <th @if($mst_course_level[0]['mst_course']['value']=='cma') style="display: none!important" @endif>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($mst_course_level as $course_level)
        @php 
            $sub = count($course_level['mst_paper_subject']) + 1;
        @endphp
        <tr class="saprate_thicker">
                <td rowspan="{{$sub}}" class="change_col">{{ $course_level['name'] }}</td>
                <!-- <td class="pep_nomb"><span class="moblie_crash">Paper No.</span> Paper-5</td> -->
            @foreach($course_level['mst_paper_subject'] as $subject)
                <tr>
            @php 
                $str = $subject['name'];
                $str_explode = explode("(",$str);
                $result = end($str_explode);
                $res = str_replace(')', '', $result);
            @endphp
            <form action="/pay-now" method="POST" class="past_paper_form" id="form_{{ $subject['id'] }}">
                @csrf
                <td><span class="moblie_crash sub_mobile">Subject</span> <span class="in_papers">{{ $res }}</span>{{ $subject['name'] }} </td>
                <td class="tec_select select_teche"><span class="moblie_crash">Faculty</span>
                    <select class="form-control" id="faculty_{{ $subject['id'] }}" name="faculty">
                        <option value="">Select Faculty</option>
                    @foreach($subject['past_paper_product'] as $faculty)
                        <option value="{{  $faculty['user'] ? $faculty['user']['id'] : '-' }}">{{  $faculty['user'] ? $faculty['user']['name'] : '-' }}</option>
                    @endforeach
                    </select>
                </td>
                
                @foreach($subject['past_paper_product'] as $product)
                <td><span class="moblie_crash vid-cov_rage">Video Coverage</span>{{ Carbon\Carbon::parse($product['video_coverage_from'])->timezone('Asia/Kolkata')->format('M Y') }} - {{ Carbon\Carbon::parse($product['video_coverage_to'])->timezone('Asia/Kolkata')->format('M Y') }}</td>
                
                @foreach($product['product_price'] as $data)
                <td><span class="moblie_crash">Sale Mode</span> <b>{{ $data['paper_delivery_type']['name'] }}</b></td>
                <td class="amount_caps"><span class="moblie_crash">Price</span> <span class="multi_rateer"><span class="origin_price"><i class="fa fa-inr" aria-hidden="true"></i><span id="sale_price_{{ $subject['id'] }}">{{ round($data['minimum_market_price']) }}</span></span><span class="striked_rate"><i class="fa fa-inr" aria-hidden="true"></i><span id="original_price_{{ $subject['id'] }}">{{ round($data['proposed_market_price']) }}</span></span></span><span class="tax_show">Excluding GST</span></td>
                
                <input type="hidden" class="form-control" name="group" value="{{ $course_level['name'] }}" required>
                <input type="hidden" class="form-control" name="paper" value="{{ $res }}" required>
                <input type="hidden" class="form-control" name="subject" value="{{ $subject['id'] }}" required>
                <input type="hidden" class="form-control" name="coverage" value="{{ Carbon\Carbon::parse($product['video_coverage_from'])->timezone('Asia/Kolkata')->format('M Y') }} - {{ Carbon\Carbon::parse($product['video_coverage_to'])->timezone('Asia/Kolkata')->format('M Y') }}" required>
                <input type="hidden" class="form-control" name="mode" value="{{ $data['paper_delivery_type']['name'] }}" required>
                <input type="hidden" class="form-control" name="price" value="{{ round($data['minimum_market_price']) + (round($data['minimum_market_price'])* 0.18) }}" required>
                <input type="hidden" class="form-control" name="course_name" value="{{$course_level['mst_course']['value']}}" required>
                <input type="hidden" class="form-control" name="product_type" value="Past Papers" required>

                <td class="action_buy" @if($mst_course_level[0]['mst_course']['value']=='cma') style="display: none!important" @endif><button title="Buy Course" class="btn btn-primary" type="submit"> Buy </button></td>
                @break
                @endforeach
                @break
                @endforeach
            </form>
                </tr>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>