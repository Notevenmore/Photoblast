<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Http\Requests\StoreCodeRequest;
use App\Http\Requests\UpdateCodeRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('generate', ['codes' => Code::all(), 'transaction' => Transaction::query()]);
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
        $token = Code::generateUniqueCode();
        $transaction = Transaction::create([
            'invoice_number' => $token, 
            'amount' => $request->nominal,
            'status' => 'settlement', 
            'method' => $request->method,
            'email' => $request->email
        ]);
        Code::create([
            'code' => $token,
            'status' => 'ready',
            'transaction_id' => $transaction->id
        ]);
        return redirect()->route('home')->with('get_code', $token);
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
        //
    }
}
