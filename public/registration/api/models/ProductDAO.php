<?php

class ProductDAO extends Database {    

    private $tbl_mst_subject = 'mst_subject';
    private $tbl_mst_course = 'mst_course';
    private $tbl_product = 'product';
    private $tbl_language = 'product_language';
    private $tbl_doubts_resolution = 'product_doubt_resolution';
    private $tbl_delivery_type = 'mst_delivery_type';
    private $tbl_video = 'videos';
    private $tbl_video_device = 'video_device';
    private $tbl_book = 'books';
    private $tbl_product_price = 'product_price';
    private $dummy_videos = 'dummy_videos';
    private $tbl_attempt = 'mst_attempt';
    private $tbl_course_language = 'mst_language';
    private $tbl_mst_product_type = 'mst_product_type';
    
     function insertProduct($req) {
        $sql = "INSERT INTO $this->tbl_product (user_id, subject_id, fast_forward, no_of_views, views_per_video, validity_type, validity_value, internet_needed, status, deleted_at, created_at, updated_at, product_type_id)";
        $sql .= "                       VALUES(:user_id, :subject_id, :fast_forward, :no_of_views, :views_per_video, :validity_type, :validity_value, :internet_needed, :status, :deleted_at, :created_at, :updated_at, :product_type_id)";
        $this->query($sql);
        
        $this->bind(':user_id', trim($req['user_id']));
        $this->bind(':subject_id', $req['subject']);
        $this->bind(':fast_forward', $req['fast_forward']);
        $this->bind(':no_of_views', $req['video_views']);
        $this->bind(':views_per_video', !empty($req['views_per_video']) ? $req['views_per_video'] : NULL  );
        $this->bind(':validity_type', $req['validity_type']);
        $this->bind(':validity_value', $req['validity_period']);
        $this->bind(':internet_needed', $req['internet_needed']);
        $this->bind(':status', 1);
        $this->bind(':deleted_at', NULL);
        $this->bind(':created_at', date('Y-m-d H:i:s'));
        $this->bind(':updated_at', date('Y-m-d H:i:s'));
        $this->bind(':product_type_id', 2);
        $this->execute();
        return $this->lastInsertId();
    }
    
    function insertVideo($req) {
        $sql = "INSERT INTO $this->tbl_video (product_id, name, no_of_videos, time, status, deleted_at, created_at, updated_at)";
        $sql .= "               VALUES(:product_id, :name, :no_of_videos, :time, :status, :deleted_at, :created_at, :updated_at)";
        $this->query($sql);
        
        $this->bind(':product_id', $req['product_id']);
        $this->bind(':name', trim($req['name']) );
        $this->bind(':no_of_videos', trim($req['no_of_videos']) );
        $this->bind(':time', trim($req['time']) );
        $this->bind(':status', 1);
        $this->bind(':deleted_at', NULL);
        $this->bind(':created_at', date('Y-m-d H:i:s'));
        $this->bind(':updated_at', date('Y-m-d H:i:s'));
        $this->execute();
        return $this->lastInsertId();
    }
    
    function insertProdLanguage($product_id, $product_type_id, $language_id) {
        $sql = "INSERT INTO $this->tbl_language (product_id, product_type_id, language_id, deleted_at, created_at, updated_at)";
        $sql .= "                   VALUES(:product_id, :product_type_id, :language_id, :deleted_at,  :created_at, :updated_at)";
        $this->query($sql);
        
        $this->bind(':product_id', $product_id);
        $this->bind(':product_type_id', $product_type_id);
        $this->bind(':language_id', $language_id);
        $this->bind(':deleted_at', NULL);
        $this->bind(':created_at', date('Y-m-d H:i:s'));
        $this->bind(':updated_at', date('Y-m-d H:i:s'));
        return $this->execute();
    }
  
    function insertVideoDevice($product_id, $device) {
        $sql = "INSERT INTO $this->tbl_video_device (product_id, device_name, created_at, updated_at)";
        $sql .= "                   VALUES(:product_id, :device_name,  :created_at, :updated_at)";
        $this->query($sql);
        
        $this->bind(':product_id', $product_id);
        $this->bind(':device_name', $device);
        $this->bind(':created_at', date('Y-m-d H:i:s'));
        $this->bind(':updated_at', date('Y-m-d H:i:s'));
        return $this->execute();
    }
    
    function insertBook($req) {
        $sql = "INSERT INTO $this->tbl_book (product_id, name, is_printed, is_ebook, deleted_at, created_at, updated_at)";
        $sql .= " VALUES(:product_id, :name, :is_printed, :is_ebook, :deleted_at, :created_at, :updated_at)";
        $this->query($sql);
        
        $this->bind(':product_id', $req['product_id']);
        $this->bind(':name', trim($req['name']) );
        $this->bind(':is_printed', $req['is_printed'] ? trim($req['is_printed']) : NULL );
        $this->bind(':is_ebook',   $req['is_ebook'] ? trim($req['is_ebook']) : NULL );
        $this->bind(':deleted_at', NULL );
        $this->bind(':created_at', date('Y-m-d H:i:s'));
        $this->bind(':updated_at', date('Y-m-d H:i:s'));
        $this->execute();
        return $this->lastInsertId();
    }
    
    function insertProductPrice($req) {
        $sql = "INSERT INTO $this->tbl_product_price (product_id, attempt_id, book_delivery_type_id, video_delivery_type_id, minimum_market_price, proposed_market_price, deleted_at, created_at, updated_at)";
        $sql .= "                               VALUES(:product_id, :attempt_id, :delivery_book_id, :delivery_video_id, :minimum_market_price, :proposed_market_price, :deleted_at, :created_at, :updated_at)";
        $this->query($sql);
        
        $this->bind(':product_id', $req['product_id']);
        $this->bind(':attempt_id', $req['attempt_id']);
        $this->bind(':delivery_book_id', $req['book_id']);
        $this->bind(':delivery_video_id', $req['video_id']);
        $this->bind(':minimum_market_price', $req['minimum_market_price']);
        $this->bind(':proposed_market_price', $req['proposed_market_price']);
        $this->bind(':deleted_at', NULL);
        $this->bind(':created_at', date('Y-m-d H:i:s'));
        $this->bind(':updated_at', date('Y-m-d H:i:s'));
        $this->execute();
        return $this->lastInsertId();
    }
    
    function insertDoubtResolution($product_id, $resolution) {
        $sql = "INSERT INTO $this->tbl_doubts_resolution (product_id, resolution_mode, deleted_at, created_at, updated_at)";
        $sql .= "                   VALUES(:product_id, :resloution_by, :deleted_at,  :created_at, :updated_at)";
        $this->query($sql);
        
        $this->bind(':product_id', $product_id);
        $this->bind(':resloution_by', $resolution);
        $this->bind(':deleted_at', NULL);
        $this->bind(':created_at', date('Y-m-d H:i:s'));
        $this->bind(':updated_at', date('Y-m-d H:i:s'));
        return $this->execute();
    }
    
    function getDeliveryType() {
        $sql  = "SELECT * FROM $this->tbl_delivery_type";
        $this->query($sql);
        
        return $this->resultset();
    }
    
    function insertDummyVideos($product_id, $link) {
        $sql = "INSERT INTO $this->dummy_videos (product_id, link, deleted_at, created_at, updated_at)";
        $sql .= "                   VALUES(:product_id, :link, :deleted_at,  :created_at, :updated_at)";
        $this->query($sql);
        
        $this->bind(':product_id', $product_id);
        $this->bind(':link', $link);
        $this->bind(':deleted_at', NULL);
        $this->bind(':created_at', date('Y-m-d H:i:s'));
        $this->bind(':updated_at', date('Y-m-d H:i:s'));
        return $this->execute();
    }

    function getProductData($product_id) {
        $sql  = "SELECT tp.*, ts.name as subject, tmc.name as course, tmc.id as course_id FROM $this->tbl_product as tp";
        $sql .= "  INNER JOIN $this->tbl_mst_subject as ts ON tp.subject_id = ts.id";
        $sql .= "  INNER JOIN $this->tbl_mst_course as tmc ON ts.course_id = tmc.id";
        $sql .= "  WHERE tp.id= :id";
        $this->query($sql);
        
        $this->bind(':id', $product_id );
        return $this->single();
    }
    
    function getProductDoubtResolution($product_id) {
        $sql = "SELECT * FROM $this->tbl_doubts_resolution";
        $sql .= " WHERE product_id = :product_id";
        $this->query($sql);
        
        $this->bind(':product_id', $product_id );
        return $this->resultset();
    }

    function getProductLanguage($product_id) {
        $sql = "SELECT * FROM $this->tbl_language";
        $sql .= " WHERE product_type_id = 2 AND product_id = :product_id";
        $this->query($sql);
        
        $this->bind(':product_id', $product_id );
        return $this->resultset();
    }

    function getProductVideoDevice($product_id) {
        $sql = "SELECT * FROM $this->tbl_video_device";
        $sql .= " WHERE product_id = :product_id";
        $this->query($sql);
        
        $this->bind(':product_id', $product_id );
        return $this->resultset();
    }

    function getProductVideos($product_id) {
        $sql = "SELECT * FROM $this->tbl_video";
        $sql .= " WHERE product_id = :product_id";
        $this->query($sql);
        
        $this->bind(':product_id', $product_id );
        return $this->resultset();
    }

    function getProductDummyVideo($product_id) {
        $sql = "SELECT * FROM $this->dummy_videos";
        $sql .= " WHERE product_id = :product_id";
        $this->query($sql);
        
        $this->bind(':product_id', $product_id );
        return $this->resultset();
    }

    function getProductBooks($product_id) {
        $sql = "SELECT *, tb.name as book_name FROM $this->tbl_book as tb";
        $sql .= " WHERE tb.product_id = :product_id";

        $this->query($sql);
        
        $this->bind(':product_id', $product_id );
        return $this->resultset();
    }

    function getBooksLanguage($product_id, $product_type_id) {
        $sql = "SELECT * FROM $this->tbl_language";
        $sql .= " WHERE product_id = :product_id AND product_type_id = :product_type_id";

        $this->query($sql);

        $this->bind(':product_id', $product_id);
        $this->bind(':product_type_id', $product_type_id);
        return $this->resultset();
    }

    function getProductPrice($product_id) {
        $sql = "SELECT * FROM $this->tbl_product_price";
        $sql .= " WHERE product_id = :product_id";
        $this->query($sql);
        
        $this->bind(':product_id', $product_id );
        return $this->resultset();
    }
    
    // Update Product
    
       function updateProduct($req) {
        $sql = "UPDATE $this->tbl_product SET fast_forward = :fast_forward, no_of_views = :no_of_views, views_per_video = :views_per_video, validity_type = :validity_type, validity_value = :validity_value, internet_needed = :internet_needed, status = :status, deleted_at = :deleted_at, updated_at = :updated_at, product_type_id = :product_type_id";
        $sql .= " WHERE id = :id";
        $this->query($sql);
        
//        $this->bind(':user_id', trim($req['user_id']));
//        $this->bind(':subject_id', $req['subject']);
        $this->bind(':id', $req['product_id']);
        $this->bind(':fast_forward', $req['fast_forward']);
        $this->bind(':no_of_views', $req['video_views']);
        $this->bind(':views_per_video', !empty($req['views_per_video']) ? $req['views_per_video'] : NULL  );
        $this->bind(':validity_type', $req['validity_type']);
        $this->bind(':validity_value', $req['validity_period']);
        
        $this->bind(':internet_needed', $req['internet_needed']);
        $this->bind(':status', 1);
        $this->bind(':deleted_at', NULL);
        $this->bind(':updated_at', date('Y-m-d H:i:s'));
        $this->bind(':product_type_id', 2);
        return $this->execute();
//        return $this->lastInsertId();
    }
    
    function deleteProductLanguage($product_id) {
        $sql = "DELETE FROM $this->tbl_language WHERE product_id = :product_id";
        $this->query($sql);
        
        $this->bind(':product_id', $product_id );
        return $this->execute();
    }
    
    function deleteDoubtResolution($product_id) {
        $sql = "DELETE FROM $this->tbl_doubts_resolution WHERE product_id = :product_id";
        $this->query($sql);
        
        $this->bind(':product_id', $product_id );
        return $this->execute();
    }
    
    function deleteVideos($product_id) {
        $sql = "DELETE FROM $this->tbl_video WHERE product_id = :product_id";
        $this->query($sql);
        
        $this->bind(':product_id', $product_id );
        return $this->execute();
    }
    
    function deleteVideoDevice($product_id) {
        $sql = "DELETE FROM $this->tbl_video_device WHERE product_id = :product_id";
        $this->query($sql);
        
        $this->bind(':product_id', $product_id );
        return $this->execute();
    }
  
    function deleteBook($product_id) {
        $sql = "DELETE FROM $this->tbl_book WHERE product_id = :product_id";
        $this->query($sql);
        
        $this->bind(':product_id', $product_id );
        return $this->execute();
    }
  
    function deleteProductPrice($product_id) {
        $sql = "DELETE FROM $this->tbl_product_price WHERE product_id = :product_id";
        $this->query($sql);
        
        $this->bind(':product_id', $product_id );
        return $this->execute();
    }
    
    function deleteDummyVideo($product_id) {
        $sql = "DELETE FROM $this->dummy_videos WHERE product_id = :product_id";
        $this->query($sql);
        
        $this->bind(':product_id', $product_id );
        return $this->execute();
    }
    
}

//end of class
