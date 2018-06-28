<?php
namespace App\Http\Controllers;

use App\Http\Requests\PageFormRequest;
use App\News;
use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class NewsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sortBy = 'id';
        $sortDirection = 'ASC';

        if (request('sortby') || request('sortdir')) {
            $sortBy = request('sortby');
            $sortDirection = request('sortdir');
        }

        $pages = News::orderBy($sortBy, $sortDirection)->paginate(6);

        return view('news/index', compact('pages'));
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('news/create');
    }

 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageFormRequest $request)
    {
      
        if($request->has('file')){
          /*to store file*/
        $file = $request->file('file');
        /*change file name*/
        $input['imagename'] = 'News-'.time().'.'.$file->getClientOriginalExtension();
        /*choose folder to store image*/
        $destinationPath = public_path('/images');
        /*store file to folder*/
        $file->move($destinationPath, $input['imagename']);

        $data['image'] = $input['imagename'];
        }
       
       
        /*rename file name to store in db*/
        $data['url'] = $request->get('url');
        $data['name'] = $request->get('name');
        $data['title'] = $request->get('title');
        $data['content'] = $request->get('content');
        /*to save data*/
        $page = News::create($data);

        $page->image = $input['imagename'];
        $page->save();


       // alert()->success('Page has been added.');

       return redirect('/news');
    }

        public function show(News $news)
    {
        return view('news/show', compact('news'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('news/edit', compact('news'));
    }

 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageFormRequest $request, News $news)
    {
    // dd($request->all());
        News::find($request->id)->update($request->all());
    // $result=   DB::table('page')
      //  ->where('id', $request->id)
      //  ->update(['url'=>request('url'),'title'=>request('title'),'name'=>request('name'),'content'=>request('content')]);
        //alert()->success('Page has been updated.');
        //
       
        return redirect('/news');
        //return back();
  
    }


     public function destroy($id)
    {
        News::destroy($id);

      //  alert()->success('Page has been deleted.');
// return redirect('dashboard')->with('status', 'Profile updated!');
        return redirect('/news')->with('message','News has been deleted.');
    }
}
