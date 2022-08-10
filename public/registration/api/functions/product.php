<?php

require_once "models/ProductDAO.php";

function registerProduct($request, $response, $args) {
    $code = STATUS_OK;
    $message = 'Success';
    $productDAO = new ProductDAO();
    $req = $request->getParams();
    $status = false;
    $arrRow = null;
//    pre($req);
    
    if (!empty($req['user_id']) && !empty($req['course']) && !empty($req['subject']) && !empty($req['internet_needed'])) {

        $req['product_id'] = $productDAO->insertProduct($req);
        
        if (!empty($req['product_id'])) {
            foreach ($req['product_language'] as $value) {
                $productDAO->insertProdLanguage($req['product_id'], 2, $value);
            }
        }

        foreach ($req['doubt_resolution'] as $key => $val) {
            $productDAO->insertDoubtResolution($req['product_id'], $val);
        }

        if (!empty($req['dummy_videos']) && !empty($req['dummy_videos'][0])) {
            foreach ($req['dummy_videos'] as $key => $val) {
                $productDAO->insertDummyVideos($req['product_id'], $val);
            }
        }

        foreach ($req['video_name'] as $keyVideo => $valueVideo) {
            $videoArr = [
                'product_id' => $req['product_id'],
                'name' => $req['video_name'][$keyVideo],
                'no_of_videos' => $req['video_number'][$keyVideo],
                'time' => $req['video_hours'][$keyVideo]
            ];

            $productDAO->insertVideo($videoArr);
        }

        foreach ($req['video_device'] as $value) {
            $productDAO->insertVideoDevice($req['product_id'], $value);
        }

        if (!empty($req['book_name']) && !empty($req['book_language']) && !empty($req['book_type'])) {
            foreach ($req['book_name'] as $key => $value) {
                $isPrinted = in_array('is_printed', $req['book_type'][$key]);
                $isEbook = in_array('is_ebook', $req['book_type'][$key]);
                
                $arrBook = [
                    'product_id'=> $req['product_id'],
                    'name'=> $value,
                    'is_printed' => $isPrinted ? 1 : null,
                    'is_ebook'   => $isEbook ? 1 : null
                ];
                
                $bookId = $productDAO->insertBook($arrBook);

                foreach ($req['book_language'][$key] as $keyBookLanguage => $valueBookLanguage) {
                    $productDAO->insertProdLanguage($bookId, 1, $valueBookLanguage);
                }
            }
        }

        foreach ($req['attempt_id'] as $key => $value) {
            $arrPriceDetails = [
                'product_id' => $req['product_id'],
                'attempt_id' => $req['attempt_id'][$key],
                'book_id' => $req['book_type_id'][$key],
                'video_id' => $req['video_type_id'][$key],
                'minimum_market_price' => $req['minimum_market_price'][$key],
                'proposed_market_price' => $req['proposed_market_price'][$key],
            ];

            $productDAO->insertProductPrice($arrPriceDetails);
        }
    } else {
        $code = PARAMETER_MISSING;
        $message = 'Input Parameter Missing';
    }

    sendResponse($arrRow, $code, $message);
}

function getDeliveryType($request, $response, $args) {
    $code = STATUS_OK;
    $message = 'Success';
    $productDAO = new ProductDAO();
    $arrRow = null;

    $arrRow = $productDAO->getDeliveryType();

    sendResponse($arrRow, $code, $message);
}

function getProductData($request, $response, $args) {
    $product_id = $args['product_id'];
    $code = STATUS_OK;
    $message = 'Success';
    $productDAO = new ProductDAO();
    $req = $request->getParams();
    $arrRow = null;

    if (trim($product_id)) {
        $arrRow['product'] = $productDAO->getProductData($product_id);
        
        $arrRow['doubt_resolution'] = $productDAO->getProductDoubtResolution($product_id);

        $arrRow['product_language'] = $productDAO->getProductLanguage($product_id);

        $arrRow['video_device'] = $productDAO->getProductVideoDevice($product_id);

        $arrRow['dummy_videos'] = $productDAO->getProductDummyVideo($product_id);

        $arrRow['videos'] = $productDAO->getProductVideos($product_id);

        $arrbooks = $productDAO->getProductBooks($product_id);

        $arrRow['books'] =  array_map(function ($value) use($productDAO) {
            return [
                'id' => $value['id'],
                'product_id' => $value['product_id'],
                'name' => $value['name'],
                'is_printed' => $value['is_printed'],
                'is_ebook' => $value['is_ebook'],
                'book_name' => $value['book_name'],
                'books_language' => ($productDAO->getBooksLanguage($value['id'], 1) )
            ];
        } , $arrbooks);

        $arrRow['product_price'] = $productDAO->getProductPrice($product_id);
    }

    sendResponse($arrRow, $code, $message);
}


function updateProduct($request, $response, $args) {
    $code = STATUS_OK;
    $message = 'Success';
    $productDAO = new ProductDAO();
    $req = $request->getParams();
    $status = false;
    $arrRow = null;
    $isPrinted = false;
    $isEbook = false;

    if (!empty($req['product_id']) && !empty($req['subject']) && !empty($req['internet_needed'])) {
//pre($req);
        // Update the Product
        $product_updated = $productDAO->updateProduct($req);
        
        // Delete old product language and update new one
        $productDAO->deleteProductLanguage($req['product_id']);
        
        foreach ($req['product_language'] as $value) {
            $productDAO->insertProdLanguage($req['product_id'], 2, $value);
        }

        // Delete old doubt resolution and add new one
        
        $productDAO->deleteDoubtResolution($req['product_id']);
        
        foreach ($req['doubt_resolution'] as $key => $val) {
            $productDAO->insertDoubtResolution($req['product_id'], $val);
        }
        
        // Delete Dummy Videos and add new one
        if (!empty($req['dummy_videos']) && !empty($req['dummy_videos'][0])) {
            $productDAO->deleteDummyVideo($req['product_id']);
            foreach ($req['dummy_videos'] as $key => $val) {
                $productDAO->insertDummyVideos($req['product_id'], $val);
            }
        }

        // Delete Videos and update new videos
        $productDAO->deleteVideos($req['product_id']);
        
        foreach ($req['video_name'] as $keyVideo => $valueVideo) {
            $videoArr = [
                'product_id' => $req['product_id'],
                'name' => $req['video_name'][$keyVideo],
                'no_of_videos' => $req['video_number'][$keyVideo],
                'time' => $req['video_hours'][$keyVideo]
            ];

            $video_id = $productDAO->insertVideo($videoArr);
        }
        
        // Delete video device and add new one
        $productDAO->deleteVideoDevice($req['product_id']);
        foreach ($req['video_device'] as $value) {
            $productDAO->insertVideoDevice($req['product_id'], $value);
        }

        if (!empty($req['book_name']) && !empty($req['book_language']) && !empty($req['book_type'])) {
        // Delete book and add new one
            $productDAO->deleteBook($req['product_id']);
        
            if (!empty($req['book_name']) && !empty($req['book_language']) && !empty($req['book_type'])) {

                foreach ($req['book_name'] as $key => $value) {
                    $isPrinted = in_array('is_printed', $req['book_type'][$key]);
                    $isEbook = in_array('is_ebook', $req['book_type'][$key]);

                    $arrBook = [
                        'product_id'=> $req['product_id'],
                        'name'=> $value,
                        'is_printed' => $isPrinted ? 1 : null,
                        'is_ebook'   => $isEbook ? 1 : null
                    ];

                    $bookId = $productDAO->insertBook($arrBook);

                    foreach ($req['book_language'][$key] as $keyBookLanguage => $valueBookLanguage) {
                        $productDAO->insertProdLanguage($bookId, 1, $valueBookLanguage);
                    }
                }   
            }            
        }
        
        $productDAO->deleteProductPrice($req['product_id']);

        foreach ($req['attempt_id'] as $key => $value) {
            $arrPriceDetails = [
                'product_id' => $req['product_id'],
                'attempt_id' => $req['attempt_id'][$key],
                'book_id' => $req['book_type_id'][$key],
                'video_id' => $req['video_type_id'][$key],
                'minimum_market_price' => $req['minimum_market_price'][$key],
                'proposed_market_price' => $req['proposed_market_price'][$key],
            ];

            $productDAO->insertProductPrice($arrPriceDetails);
        }
    } else {
        $code = PARAMETER_MISSING;
        $message = 'Input Parameter Missing';
    }

    sendResponse($arrRow, $code, $message);
}
