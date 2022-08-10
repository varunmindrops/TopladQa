<?php

namespace App\Http\Resources;

use \App\Repositories\LogRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class CommonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->checkReturnType();
    }

    public function withResponse($request, $response)
    {
        (new LogRepository())->store($request, $response);
        /**
         * Not all prerequisites were met.
         */
        $response->setStatusCode($this->resource['statusCode'] ?? 200);
    }

    public function with($request)
    {
        return [
            'error' => false,
            'status' => 200,
            'message' => gettype($this->resource) == 'string' ? $this->resource : ($this->resource['message'] ?? ''),
            'extendedMessage' => isset($this->resource['extendedMessage']) ? $this->resource['extendedMessage'] : '',
        ];
    }

    public function checkReturnType() {
        switch (gettype($this->resource)){
            case 'string': return ;
                break;
            case 'array': return Arr::only($this->resource, 'data');
                break;
            case 'object': return $this->resource;
                break;
        };
        return parent::toArray($this->resource);
    }
}
