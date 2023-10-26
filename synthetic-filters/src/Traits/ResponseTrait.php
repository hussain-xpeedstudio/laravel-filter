<?php

namespace SyntheticFilters\Traits;

trait ResponseTrait
{
    protected $errorMessages = [];
    public function response($status = 200, $data = null, array $headers = [], $tracer = null)
    {
        $response = [
            'message' => [
                $this->errorMessages,
            ],
            'tracer' => $tracer,
            'data' => $data,
        ];

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
