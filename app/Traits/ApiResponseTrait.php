<?php

namespace App\Traits;

trait ApiResponseTrait
{
    protected $errorMessages = [];

    public function response(
        $status = 200,
        $data = null,
        array $headers = [],
        $tracer = null
    ) {
        $response = [
            'message' => [
                'error' => $this->errorMessages,
            ],
            'tracer' => $tracer,
            'data' => $data,
        ];

        return response()->json($response, $status, $headers);
    }

    public function log($type, $message)
    {
        if (! isset($this->errorMessages[$type])) {
            $this->errorMessages[$type] = [];
        }

        $this->errorMessages[$type][] = $message;
    }

}
