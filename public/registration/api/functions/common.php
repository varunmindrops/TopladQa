<?php
require_once "models/CommonDAO.php";
require_once "models/UserDAO.php";

function pre($data) {
    echo '<pre>';
    print_r($data);
    die;
}

function logError($errorMessage) {
    error_log("\r\n" . date('Y-m-d H:i:s') . ': ' . $errorMessage, 3, BASE_PATH . "errors.log");
}

function getUploadsUrl($path = '') {
    return UPLOADS_URL . $path;
}

function getResponse($data, $code, $message, $metadata) {
    $metadata = empty($metadata) ? null : $metadata;
    $data = empty($data) ? null : $data;

    $response['code'] = $code;
    $response['message'] = $message;
    $response['metadata'] = $metadata;
    $response['data'] = $data;
    return $response;
}

function sendResponse($data = array(), $code = STATUS_OK, $message = "Success", $metadata = array()) {
    echo json_encode(getResponse($data, $code, $message, $metadata), true);
    die;
}

function generateToken($userid, $phone, $device_id) {
    $str = time() . $userid . $phone . $device_id;
    return md5($str);
}

function openRequest($request, $response, $args, $method) {
    try {
        $method($request, $response, $args);
    } catch (Exception $e) {
        logError($e->getMessage());
        sendResponse(array(), STATUS_INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}

function tokenRequest($request, $response, $args, $method) {
    try {
        $headers = $request->getHeaders();
        $token = isset($headers['HTTP_TOKEN'])? trim($headers['HTTP_TOKEN'][0]): '';
        $commonDAO = new CommonDAO();
        $tokenRow = array();
        if ($token != '') {
            $tokenRow = $commonDAO->getUserByToken($token);
        }

        if (!empty($tokenRow)) {
            if ($tokenRow['user_id'] > 0) {
                $args['user_id'] = $tokenRow['user_id'];
                $method($request, $response, $args);
            } else {
                sendResponse(array(), PARAMETER_MISSING, 'User id is 0 for this token');
            }
        } else {
            sendResponse(array(), STATUS_UNAUTHORIZED, 'Invalid token');
        }
    } catch (Exception $e) {
        logError($e->getMessage());
        sendResponse(array(), STATUS_INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}

function getCurrentDateInSiteFormat($withoutTime = false) {
    $format = 'd-m-Y';
    $format .= ($withoutTime) ? '' : ' H:i:s';
    $date = date($format);
    return $date;
}

function getDateInSiteFormat($date, $withoutTime = false) {
    $format = 'd-m-Y';
    $format .= ($withoutTime) ? '' : ' H:i:s';
    if ($date) {
        $date = date($format, strtotime($date));
    }
    return $date;
}

function getCurrentDateInDBFormat($withoutTime = false) {
    $format = 'Y-m-d';
    $format .= ($withoutTime) ? '' : ' H:i:s';
    $date = date($format);
    return $date;
}

function getDateInDBFormat($date, $withoutTime = false) {
    $format = 'Y-m-d';

    $format .= ($withoutTime) ? '' : ' H:i:s';
    if ($date) {
        $date = date($format, strtotime($date));
    }
    return $date;
}

function generateOtp() {
    $otp = '0123456789';
    $otp = str_shuffle($otp);
    $otp = substr($otp, 0, 6);
    return $otp;
}

function getFileExt($file) {
    $filename = explode(".", $file);
    $ext = strtolower(end($filename));
    return $ext;
}

function getFileName($filename) {
    $filename = explode(".", $filename);
    $fname = strtolower($filename[0]);
    return $fname;
}

function uploadImage($input_file, $folder) {
    $file_orig_name = $_FILES[$input_file]['name'];
    $image_name = date('ymdHis') . mt_rand(10, 1000) . '.' . getFileExt($file_orig_name);
    $temp_file_name = $_FILES[$input_file]['tmp_name'];

    $dirpath = UPLOADS_PATH . $folder . '/';

    if (!file_exists($dirpath)) {
        mkdir($dirpath, 0777, true);
    }

    move_uploaded_file($temp_file_name, $dirpath . $image_name);
    return UPLOADS_URL. $folder . '/' . $image_name;
}

?>