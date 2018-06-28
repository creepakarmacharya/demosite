<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageFormRequest;
use App\Page,Validator;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sortBy        = 'id';
        $sortDirection = 'ASC';

        if (request('sortby') || request('sortdir')) {
            $sortBy        = request('sortby');
            $sortDirection = request('sortdir');
        }

        $pages = Page::orderBy($sortBy, $sortDirection)->paginate(6);

        return view('page/index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('page/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageFormRequest $request)
    {
        $page = Page::create($request->all());

        // alert()->success('Page has been added.');

        return redirect('/page');
    }

    public function show(Page $page)
    {
        return view('page/show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('page/edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageFormRequest $request, Page $page)
    {
        // dd($request->all());
        Page::find($request->id)->update($request->all());
        // $result=   DB::table('page')
        //  ->where('id', $request->id)
        //  ->update(['url'=>request('url'),'title'=>request('title'),'name'=>request('name'),'content'=>request('content')]);
        //alert()->success('Page has been updated.');
        //

        return redirect('/page');

        //return back();

    }

    public function captchaget()
    {
        return view('page/captcha-form');
    }

    public function captchapost(Request $request)
    {
       
        $rules     = ['captcha' => 'required|captcha'];
        $validator = Validator::make($request->all(), $rules);
        //dd($request);
        if ($validator->fails()) {
            echo '<p style="color: #ff0000;">Incorrect capatcha text! '. $request->captcha.'PLease Retype</p>';

        } else {

            echo '<p style="color: #00ff30;">Matched :)'.$request->captcha.'</p>';
        }
    }

    public function destroy($id)
    {
        Page::destroy($id);

        //  alert()->success('Page has been deleted.');
        // return redirect('dashboard')->with('status', 'Profile updated!');
        return redirect('/page')->with('message', 'Page has been deleted.');
    }
}
