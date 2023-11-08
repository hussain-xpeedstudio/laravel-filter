<?php

namespace SyntheticFilters\Traits;

trait ResponseTrait
{
    protected $errorMessages = [];

    public function response($status = 200, array $data = [], array $headers = [], $tracer = null)
    {
        
        $response = [
            'message' => [
                $this->errorMessages,
            ],
            'tracer' => $tracer,
            'data' => null,
        ];
        if (isset($data['data'])) {
            $response = array_merge($response, $data);
        } else {
            $response['data'] = $data;
        }

        return response()->json($response, $status, $headers);
    }

    public function log($type, $message)
    {
        if (!isset($this->errorMessages[$type])) {
            $this->errorMessages[$type] = [];
        }

        $this->errorMessages[$type][] = $message;
    }
}
