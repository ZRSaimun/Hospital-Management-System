<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_data = Test::all();
        return view('test.index', compact('all_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'test_id'   => 'required',
            'test_name' => 'required',
            'test_fee'  => 'required',
        ]);

        Test::create([
            'test_id' => $request->test_id,
            'test_name' => $request->test_name,
            'test_slug' => Str::slug($request->test_name),
            'test_fee' => $request->test_fee,
        ]);

        return redirect()->route('test.index')->with('success', 'Test added successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Test::find($id);
        $data->delete();

        return redirect()->route('test.index')->with('success', 'Deleted successfull');
    }

    public function unpublishedTest($id)
    {
        $test_unp = Test::find($id);
        $test_unp->status = 'inactive';
        $test_unp->update();
        return redirect()->route('test.index')->with('success', 'Test inactive successfull');
    }

    public function publishedTest($id)
    {
        $test_pb = Test::find($id);
        $test_pb->status = 'active';
        $test_pb->update();
        return redirect()->route('test.index')->with('success', 'Test active successfull');
    }

    public function feeTest(Request $request)
    {
        return $request->all();
    }
}
