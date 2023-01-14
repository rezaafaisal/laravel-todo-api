<?php 
     namespace App\Helper;

     class Response{
        static public function reply($code, $success, $message, $data = null){ 
            return response([
                'code' => $code,
                'success' => $success,
                'message' => $message,
                'data' => $data
            ], $code);
        }
     }
?>