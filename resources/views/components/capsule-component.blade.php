<table id="" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Group</th>
            <th>Paper No.</th>
            <th>Subject</th>
            <th>Faculty</th>
            <th class="text-center">Amount</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mst_course_level as $course_level)
        @php 
            $sub = count($course_level['mst_capsule_paper_subject']) + 1;
        @endphp
        <tr class="saprate_thicker">
            <td rowspan="{{$sub}}" class="change_col">{{ $course_level['name'] }}</td>
            @foreach($course_level['mst_capsule_paper_subject'] as $subject)
            <tr>
            @php 
                $str = $subject['name'];
                $str_explode = explode("(",$str);
                $result = end($str_explode);
                $res = str_replace(')', '', $result);

                $fac = count($subject['capsule_product']) + 1;
            @endphp
            <td><span class="moblie_crash">Paper No.</span> {{ $res }}</td>
            <td><span class="moblie_crash sub_mobile">Subject</span> {{ $subject['name'] }}</td>
            @foreach($subject['capsule_product'] as $faculty)
            <td class="tec_select"><span class="moblie_crash">Faculty</span> {{ $faculty['user']['name'] }}</td>
            @foreach($faculty['product_price'] as $price)
            <td class="amount_caps"><span class="moblie_crash">Amount</span> <span class="multi_rateer"><span class="origin_price"><i class="fa fa-inr" aria-hidden="true"></i>{{ round($price['minimum_market_price']) }}</span><span class="striked_rate"><i class="fa fa-inr" aria-hidden="true"></i>{{ round($price['proposed_market_price']) }}</span></span></td>

            <form action="/pay-now" method="POST">
                @csrf
                <input type="hidden" class="form-control input-small pull-left mrg-right15" name="teacher_id" value="{{ $faculty['user_id'] }}" required>
                <input type="hidden" class="form-control input-small pull-left mrg-right15" name="group" value="{{ $course_level['name'] }}" required>
                <input type="hidden" class="form-control input-small pull-left mrg-right15" name="paper_no" value="{{ $res }}" required>
                <input type="hidden" class="form-control input-small pull-left mrg-right15" name="subject_id" value="{{ $subject['id'] }}" required>
                <input type="hidden" class="form-control input-small pull-left mrg-right15" name="price" value="{{ round($price['minimum_market_price']) }}" required>
                <input type="hidden" class="form-control input-small pull-left mrg-right15" name="course_name" value="{{$course_level['mst_course']['value']}}" required>
                <input type="hidden" class="form-control input-small pull-left mrg-right15" name="product_type" value="Capsule" required>

                <td class="action_buy"><button title="Buy Course" class="btn btn-primary" type="submit"> Buy </button></td>
            </form>
            @endforeach
            @endforeach
            </tr>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>