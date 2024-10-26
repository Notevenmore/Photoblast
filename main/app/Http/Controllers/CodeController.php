<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Http\Requests\StoreCodeRequest;
use App\Http\Requests\UpdateCodeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('redeem');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // deteksi code apakah tersedia dalam database atau tidak
        $code = Code::where('code', $request->code)->first();
        if($code && $code->status == 'ready') {
            // simpan data code ke session
            Session::put('code', $code->code);

            // redirect ke halaman pemilihan template
            return redirect()->route('tempcollage.index');

        }else{

            // redirect ke halaman input code redeem
            return redirect()->route('redeem.index');
            
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Code $code)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Code $code)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCodeRequest $request, Code $code)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Code $code)
    {
       
    }
}
