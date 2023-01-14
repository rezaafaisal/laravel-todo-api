<?php

namespace App\Http\Controllers\Api;

use App\Helper\Response;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        $data = Todo::all();
        return Response::reply(200, true, 'Data berhasil di ambil', $data);
    }

    public function store(Request $request){
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|min:5',
            'description' => 'required|min:5',
        ]);

        // cara pertama query builder
        $data = Todo::create($request->all());

        // cara kedua eloquent
        // $todo = new Todo();
        // $todo->category_id = $request->category_id;
        // $todo->title = $request->title;
        // $todo->description = $request->description;
        // $todo->save();


        if($data) return Response::reply(201, true, 'Data berhasil ditambah', $data);
        return Response::reply(409, false, 'Data gagal ditambah');
    }

    public function update($id, Request $request){
        $request->validate([
            'category_id' => 'nullable',
            'title' => 'nullable|min:5',
            'description' => 'nullable|min:5',
        ]);

        $data = Todo::find($id);
        $success = $data->update($request->all());

        if($success) return Response::reply(200, $success, 'Data berhasil diupdate', $data);
        return Response::reply(409, false, 'Data gagal diupdate');
    }

    public function destroy($id){
        $success = Todo::find($id)->delete();
        if($success) return Response::reply(200, $success, 'Data berhasil dihapus');
    }

    public function search(Request $request){
        $request->validate([
            'keyword' => 'required'
        ]);
        $keyword = $request->keyword;

        $data = Todo::where('title', 'LIKE', '%'.$keyword.'%')->get();
        $jumlah_data = $data->count();
        if($jumlah_data > 0) return Response::reply(200, true, 'Data ditemukan : '.$jumlah_data, $data);
        return Response::reply(200, true, 'Data tidak ditemukan');

    }

    public function category($slug){
        $category = Category::where('slug', $slug)->first();
        $data = $category->todos;
        if($data->count() > 0) return Response::reply(200, true, 'Berhasil ambil data', $data);
    }


}
