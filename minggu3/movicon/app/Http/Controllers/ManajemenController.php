<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use function PHPUnit\Framework\returnValue;

class ManajemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        //
        // return response("Method ini digunakan untuk mengambil semua user"); 
        // return view('welcome');
        // return response(view('welcome'));
        $nama = "Muhammad Maulana Malik Ibrahim";
        $pelajaran = ["Algoritma & Pemrograman","Kalkulus","Pemrograman Web"];
        return view('home',compact('nama','pelajaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return ("Method ini nantinya akan digunakan untuk menampilkan form tambah user");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return ("Method ini nantinya akan digunakan untuk menciptakan data user yang baru");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return ("Method ini nantinya akan digunakan untuk mengambil satu data user dengan id = ".$id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return ("Method ini nantinya akan digunakan untuk menampilkan form untuk mengubah data edit dengan id = ".$id);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return ("Method ini nantinya akan digunakan untuk mengubah data user dengan id = ".$id);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { 
        //
        return "Method ini nantinya digunakan untuk menghapus data user dengan id = ".$id;
    }
}
