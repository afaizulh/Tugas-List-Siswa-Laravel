<?php

namespace App\Http\Controllers;

use App\Models\Datas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest()) {
            return redirect('login');
        }

        $data = Datas::get();

        $dataSiswa = [
            'dataSiswa' => $data
        ];

        return view('home.index', $dataSiswa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guest()) {
            return redirect('login');
        }

        return view('home.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::guest()) {
            return redirect('login');
        }

        $name = $request->input('name');
        $grade = $request->input('grade');

        Datas::create([
            'name' => $name,
            'grade' => $grade
        ]);

        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        if (Auth::guest()) {
            return redirect('login');
        }

        $selectData = Datas::selectSlug($slug)->first();

        $dataSiswa = [
            'data' => $selectData
        ];

        return view('home.edit', $dataSiswa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        if (Auth::guest()) {
            return redirect('login');
        }

        $name = $request->input('name');
        $grade = $request->input('grade');

        Datas::selectSlug($slug)->update([
            'name' => $name,
            'grade' => $grade
        ]);

        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        if (Auth::guest()) {
            return redirect('login');
        }

        Datas::selectSlug($slug)->forceDelete();

        return redirect('home');
    }
}
