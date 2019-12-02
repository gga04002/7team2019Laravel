<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QnAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = \App\Question::with('user')->latest()->paginate(10);
        
        return view('qna.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('qna.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rules = [
            'title' => ['required'],
            'content' => ['required', 'min:10'],
        ];
        
        $validator = \Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return back()->withError($validator)->withInput();
        }

        $question = \App\User::find(1)->questions()->create($request->all());

        if(! $question) {
            return back()->with('flash_message', '글이 저장되지 않았습니다')->withInput();
        }

        return redirect(route('qna.index'))->with('flash_message', '작성하신 글이 저장되었습니다');

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
