<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;


use Validator;

use Blog\Subscriber;

use Session;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255|email'
        ]);
        if ($validator->fails()) {
            session::flash('error', 'Subscription failed, Check the form and try again');
            return redirect('/home')
                ->withErrors($validator)
                ->withInput();
        } else {
            $save = Subscriber::updateOrCreate(
                [ 'email' => $request->input(['email'])],
                [
                    'email' => $request->input(['email']),
                ]);

            // redirect
            if ($save) {
                session::flash('success', 'subscription Successfully ');
                return redirect('/');
            } else {
                session::flash('error', 'subscription failed, try again!');
                return redirect('/');
            }
        }
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
        //
    }
}
