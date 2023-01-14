<?php

namespace App\Http\Controllers\Api;

use App\Helper\Response;
use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoneController extends Controller
{
    public function index(){
        $data = Todo::where('is_done', true)->get();
        if($data->count() > 0) return Response::reply(200, true, 'Berhasil', $data);
        return Response::reply(200, true, 'Berhasil');
    }
    
    public function set($id){
        $data = Todo::find($id);
        $success = $data->update([
            'is_done' => true
        ]);

        if($success) return Response::reply(200, $success, 'Todo berhasil di selesaikan', $data);
    }
}
