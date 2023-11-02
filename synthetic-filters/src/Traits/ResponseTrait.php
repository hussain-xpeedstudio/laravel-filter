<?php

namespace SyntheticFilters\Traits;

trait ResponseTrait
{
    protected $errorMessages = [];

    public function response(
        $status = 200,
        array $data = [],
        array $headers = [],
        $tracer = null
    ) {
        $response = [
            'message' => [
                $this->errorMessages,
            ],
            'tracer' => $tracer,
            'data' => null,
        ];

        if (isset($data['data'])) {
            // foreach ($data['data'] as $row => $tableRow) {
            //     foreach ($tableRow as $key => $value) {
            //         if (is_array($value)) {
            //             foreach ($value as $fieldName => $fieldValue) {
            //                 $tableRow[$key . '_' . $fieldName] = $fieldValue;
            //             }
            //             $data['data'][$row] = $tableRow;
            //             unset($data['data'][$row][$key]);
            //         }
            //     }
            // }

            $response = array_merge($response, $data);
        } else {
            $response['data'] = $data;
        }

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
