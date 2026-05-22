<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function show($slug)
    {
        $jurusan = Jurusan::where('slug', $slug)
            ->with(['teams', 'produks' => function($query){
                $query->latest()->with('adminContact');
                
            }, 'galleries', 'articles' => function ($query){
                // untuk mengurutkan data (data baru akan di tampilkan peratama)
                $query->latest();
            }])
            ->first();

        return response()->json($jurusan);
    }
}