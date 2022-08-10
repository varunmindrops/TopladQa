<?php

namespace App\Http\Controllers;

use App\Models\MstAttempt;
use App\Models\MstDeliveryType;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use illuminate\support\facades\DB;

class ProductController extends Controller
{
    public function show($segment, $slug, $id)
    {
        $product = Product::with(['user', 'subject.mstCourseLevel.mstCourse', 'productDoubtResolution', 'printedBook.printedBookLanguage.mstLanguage', 'eBook.eBookLanguage.mstLanguage', 'video', 'videoLanguage.mstLanguage', 'videoDevice', 'productPrice.videoDeliveryType', 'productPrice.bookDeliveryType', 'productPrice.attempt'])
                    ->where('product_type_id', 2)                
                    ->find($id);

        $mstAttempt = MstAttempt::whereNull('deleted_at')->select('id', 'name')->get()->toArray();
        $mstVideoType = MstDeliveryType::where('content_type', 'video')->select('id', 'name')->get()->toArray();
        $mstBookType = MstDeliveryType::where('content_type', 'book')->select('id', 'name')->get()->toArray();

        $productArray = $product->toArray();

        // Filter the video types i.e. Google drive or Pen drive which are available
        $existingVideoArray = array_unique(array_column(array_column($productArray['product_price'], 'video_delivery_type'), 'id'));

        // Filter the books types i.e. hard copy or ebook which are available
        $existingBooksArray = array_unique(array_column(array_column($productArray['product_price'], 'book_delivery_type'), 'id'));

        // Filter theAttempts which are available
        $existingAttemptsArray = array_unique(array_column(array_column($productArray['product_price'], 'attempt'), 'id'));

        //  creating final books array having filtered out books of which we have prices
        $booksArray = array_filter($mstBookType, function ($v) use ($existingBooksArray) {
            if (in_array($v['id'], $existingBooksArray)) {
                return $v;
            }
        });

        //  creating final videos array having filtered out books of which we have prices
        $videosArray = array_filter($mstVideoType, function ($v) use ($existingVideoArray) {
            if (in_array($v['id'], $existingVideoArray)) {
                return $v;
            }
        });

        //  creating Attempt array having filtered out attempts which we have prices
        $attemptsArray = array_filter($mstAttempt, function ($v) use ($existingAttemptsArray) {
            if (in_array($v['id'], $existingAttemptsArray)) {
                return $v;
            }
        });

        return view('site.product', compact('product', 'attemptsArray', 'videosArray', 'booksArray', 'slug', 'segment'));
    }
}
