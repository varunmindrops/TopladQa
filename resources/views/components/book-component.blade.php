@php
    global $bk;
@endphp
<table id="" class="table table-bordered">
    <thead>
        <tr>
            <th>Group</th>
            <th>Subject</th>
            <th>Book</th>
            <th>Faculty</th>
            <th>Sale Mode</th>
            <th class="text-center">Amount</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mst_course_level as $course_level)
        <tr class="saprate_thicker">
            @php
                $bookCount = 0;
                $bookC = 0;
                foreach($course_level['mst_book_paper_subject'] as $subject) {
                    $bookCount +=  count($subject['book_product']) + 1;
                }
            @endphp
            <td rowspan='{{ $bookCount + 1}}' class="change_col">{{ $course_level['name'] }}</td>
            @foreach($course_level['mst_book_paper_subject'] as $subject)
            <tr>
            @php
                $bookNo = count($subject['book_product']) + 1;
                $bookC +=  count($subject['book_product']);
            @endphp
            <td rowspan='{{$bookNo}}'><span class="moblie_crash sub_mobile">Subject</span> {{ $subject['name'] }}</td>
            @foreach($subject['book_product'] as $faculty)
            @php
            $c = 0;
                $c++;
                $c += $c;
            @endphp
            @push('scripts')
            <script>
                var c = <?php echo $c; ?>;
                for(var i = 0; i <= bookC; i++) {
                    
                    if(i%2 == 0) {
                        
                        $("table tbody .odd-even:nth-child(even)").css('background-color', 'red');
                    }
                }
                
            </script>
            @endpush
            <tr class="odd-even">
            @foreach($faculty['printed_book'] as $book)
            <td><span class="moblie_crash">Book</span> {{ $book['name'] }}</td>
            @endforeach
            <td class="tec_select"><span class="moblie_crash">Faculty</span> {{ $faculty['user']['name'] }}</td>
            @foreach($faculty['product_price'] as $price)
            <td><span class="moblie_crash">Sale Mode</span> <b>{{ $price['book_delivery']['name'] }}</b></td>
            <td class="amount_caps"><span class="moblie_crash">Amount</span> <span class="multi_rateer"><span class="origin_price"><i class="fa fa-inr" aria-hidden="true"></i>{{ round($price['minimum_market_price']) }}</span></span></td>

            <form action="/pay-now" method="POST">
                @csrf
                <input type="hidden" class="form-control input-small pull-left mrg-right15" name="teacher_id" value="{{ $faculty['user_id'] }}" required>
                <input type="hidden" class="form-control input-small pull-left mrg-right15" name="group" value="{{ $course_level['name'] }}" required>
                <input type="hidden" class="form-control input-small pull-left mrg-right15" name="subject_id" value="{{ $subject['id'] }}" required>
                <input type="hidden" class="form-control input-small pull-left mrg-right15" name="book_name" value="{{ $book['name'] }}" required>
                <input type="hidden" class="form-control input-small pull-left mrg-right15" name="mode" value="{{ $price['book_delivery']['name'] }}" required>
                <input type="hidden" class="form-control input-small pull-left mrg-right15" name="price" value="{{ round($price['minimum_market_price']) }}" required>
                <input type="hidden" class="form-control input-small pull-left mrg-right15" name="course_name" value="{{$course_level['mst_course']['value']}}" required>
                <input type="hidden" class="form-control input-small pull-left mrg-right15" name="product_type" value="Book" required>

                <td class="action_buy"><button title="Buy Course" class="btn btn-primary" type="submit"> Buy </button></td>
            </form>
            
            @endforeach
            </tr>
            @endforeach
            </tr>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>