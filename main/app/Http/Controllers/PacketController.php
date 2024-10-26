<?php

namespace App\Http\Controllers;

use App\Models\Packet;
use App\Http\Requests\StorePacketRequest;
use App\Http\Requests\UpdatePacketRequest;

class PacketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorePacketRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Packet $packet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Packet $packet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePacketRequest $request, Packet $packet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Packet $packet)
    {
        //
    }
}
