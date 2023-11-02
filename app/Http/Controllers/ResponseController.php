<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponseTrait;

class ResponseController extends Controller
{
    use ApiResponseTrait;

    public function getResponse()
    {
        $this->log('info', 'Please go pro to enable the feature');
        $this->log('info', 'another info message');
        $this->log('custom', 'Custom Error Type');
        $data = [];
        return $this->response(
            status: 400,
            data: $data
        );
    }
}
