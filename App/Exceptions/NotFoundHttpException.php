<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class NotFoundHttpException extends Exception
{
    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function render()
    {
        return response()->json([
            'message'=>$this->message
        ], Response::HTTP_NOT_FOUND);
    }
}
