<?php
namespace App\Traits;

trait ApiResponse
{

    protected function respond($data = null, $message = '', $status = 'success', $code = 200, $errors = [])
    {
        $response = [
            'status' => $status,
            'message' => $message,
        ];

        if ($status === 'success') {
            $response['data'] = $data;
        } elseif ($status === 'error') {
            $response['errors'] = $errors;
        }

        return response()->json($response, $code);
    }

    protected function validationError($errors)
    {
        $response['data'] = $errors;
        $response['errors'] = $errors;
        return response()->json($response, 422);
    }
}
