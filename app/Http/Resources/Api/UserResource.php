<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    // public properties
    public $status;
    public $success;
    public $message;

    /**
     * __construct
     *
     * @param  mixed $status
     * @param  mixed $success
     * @param  mixed $message
     * @param  mixed $resource
     * @return void
     */
    public function __construct($status, $success, $message, $resource)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->success = $success;
        $this->message = $message;
    }

    /**
     * toArray
     *
     * @param  mixed $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'status' => $this->status,
            'success' => $this->success,
            'message' => $this->message,
            'data' => $this->resource
        ];
    }
}
