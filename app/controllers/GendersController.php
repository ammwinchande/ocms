<?php

namespace App\Controllers;

use App\Core\App;

class GendersController
{
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        $genders = App::get('database')->selectAll('gender');
        return view('gender/index', compact('genders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Http $response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return view
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return view
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Http $response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Http $response
     */
    public function destroy($id)
    {
        //
    }
}
