<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Vaildator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
=======
<<<<<<< HEAD
// use Illuminate\Http\Request;
=======
use Illuminate\Http\Request;
>>>>>>> 74462ce51bade993820781d875c9188a3185fc4f
>>>>>>> a077441a027777cee9ef9718f53ffba0fb7eae1d
use App\Http\Requests\MembersRequest;
use App\Member;
use Datatables;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = \App\Member::get();
        
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return $request;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 타입형을 Request 클래스 경로로 바꾸어준다
    // \App\Http\Requests\MembersRequest
    public function store(Request $request)
    {
<<<<<<< HEAD
        if($request->has('img')) {
            $image = $request->file("img");
            $filename = Str::random(15).filter_var($image->getClientOriginalName(),FILTER_SANITIZE_URL);
            $image->move(public_path('img'),$filename);

            $members = \App\Member::create([
                'name'=>$request->name,
                'address'=>$request->address,
                'phone_number'=>$request->phone_number,
                'mottoes'=>$request->mottoes,
                'img'=>$filename,
            ]); 
        } 
        else {
            $members = \App\Member::create([
                'name'=>$request->name,
                'address'=>$request->address,
                'phone_number'=>$request->phone_number,
                'mottoes'=>$request->mottoes,
                'img'=>null,
            ]); 
=======
        /* $rules = [
            // 이름, 폰번호, 모토 유효성 검사 규칙
            'name' => ['required'],
            'phone_number' => ['required'],
            'address' => ['required'],
            'motto' => ['required', 'min:10'],
        ];

        $messages = [
            'name.required' => '이름은 필수 입력 항목입니다.',
            'phone_number.required' => '전화번호는 필수 입력 항목입니다.',
            'address' => '주소는 필수 입력 항목입니다.',
            'motto.required' => '모토는 필수 입력 항목입니다.',
            'motto.min' => '본문은 최소 :min 글자 이상이 필요합니다.',
        ];

        $this->validate($request, $rules, $messages);

        $validator = \Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } */

        // $validated = $request->validated();
        

        $members = \App\Member::create($request->all()); 

        if(!$members) {
            return back()->with('flash_message', '글이 저장되지 않았습니다.')->withInput();
        }

        return redirect(route('members.index'))->with('flash_message', '작성하신 글이 저장되었습니다.');
<<<<<<< HEAD
=======

        /* $validator = Validator::make($request->all(), [
            'name' => 'required|max:10',
            'phone_number' => 'required|max:13',
            'motto' => 'required|min:10',
            'address' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()->with('flash_message', '글이 저장되지 않았습니다.')->withInput();
>>>>>>> a077441a027777cee9ef9718f53ffba0fb7eae1d
        }
        
        

<<<<<<< HEAD
        return $members;
        
=======
        return redirect(route('members.index'))->with('flash_message', '작성하신 글이 저장되었습니다.'); */
>>>>>>> 74462ce51bade993820781d875c9188a3185fc4f
>>>>>>> a077441a027777cee9ef9718f53ffba0fb7eae1d
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $member = \App\Member::where('id', '=', $id)->get();

        return $member;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        
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
        // if($request->has('img')) {
            $image = $request->file("img");
            $filename = Str::random(15).filter_var($image->getClientOriginalName(),FILTER_SANITIZE_URL);
            $image->move(public_path('img'),$filename);

            \App\Member::where('id', '=', $id)->update([
                'name'=>$request->name,
                'address'=>$request->address,
                'phone_number'=>$request->phone_number,
                'mottoes'=>$request->mottoes,
                'img'=>$filename,
            ]);
        /* }
        else {
            \App\Member::where('id', '=', $id)->update([
                'name'=>$request->name,
                'address'=>$request->address,
                'phone_number'=>$request->phone_number,
                'mottoes'=>$request->mottoes,
                'img'=>null,
            ]);
        } */

        

        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
<<<<<<< HEAD
        \App\Member::find($id)->delete();
=======
        //
    }
<<<<<<< HEAD
=======
>>>>>>> a077441a027777cee9ef9718f53ffba0fb7eae1d

        return response($id);
    }

<<<<<<< HEAD
}
=======
    public function ajaxtest(Request $request) {
        return $request->test;
    }

    public function createMember(Request $request) {
        dd($request->checking);
        return $request->checking;
    }
>>>>>>> 74462ce51bade993820781d875c9188a3185fc4f
}
>>>>>>> a077441a027777cee9ef9718f53ffba0fb7eae1d
