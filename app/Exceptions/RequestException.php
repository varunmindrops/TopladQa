<?php

namespace App\Exceptions;

use App\Http\Resources\ErrorResource;
use Exception;

class RequestException extends Exception
{
    public function render(){
        foreach(json_decode($this->getMessage()) as $key => $value) { $message[] = $value[0]; }
        return new ErrorResource([
            'message' => $message[0] ?? 'Required fields missing' ,
            'extendedMessage' => json_decode($this->getMessage()),
            'status' => 400
        ]);
    }
}
