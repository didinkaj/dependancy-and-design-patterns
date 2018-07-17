<?php

namespace Blog\Http\Controllers;

use Blog\Facades\Logger;

use Blog\Repositories\Blog\BlogRepository;

use Illuminate\Http\Request;

use Validator;


use Auth;

use Session;

use Blog\Logger\Contracts\SystemLogInterface;

class BlogController extends Controller
{
    private $blogRepo;
    private $logevent;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BlogRepository $blogRepository, SystemLogInterface $SystemLogInstance)
    {
        $this->middleware('auth');
        $this->blogRepo = $blogRepository;
        $this->logevent = $SystemLogInstance;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //facade implementation
        $facade = Logger::countAllLogs();
        $allBlogs = $this->blogRepo->getAllBlogs();
        return view('home', compact('allBlogs', 'logs','facade'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('addblog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|string',
            'category' => 'required|max:255|string',
            'body' => 'required|string'
        ]);
        if ($validator->fails()) {
            session::flash('error', 'Blog Creation failed, Check the form and try again');
            return redirect('/addBlog')
                ->withErrors($validator)
                ->withInput();
        } else {

            if ($this->blogRepo->saveBlog($request)) {
                session::flash('success', 'Blog Created Successfully ');
                return redirect('/home');
            } else {
                session::flash('error', 'Blog Task not saved, try again!');
                return redirect('/home');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $allBlogs = $this->blogRepo->findBlog($id);


        return view('blogdetails', compact('allBlogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $allBlogs = $this->blogRepo->findBlog($id);

        return view('editblog', compact('allBlogs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|string',
            'category' => 'required|max:255|string',
            'body' => 'required|string'
        ]);
        if ($validator->fails()) {
            session::flash('error', 'Blog updation failed, Check the form and try again');
            return redirect('/blog/' . $id)
                ->withErrors($validator)
                ->withInput();
        } else {

            if ($this->blogRepo->update($request, $id)) {
                $this->logevent->generateLogs("Blog  page with title - " . $request->title . " - Editted");
                session::flash('success', 'Blog updation Successfully ');
                return redirect('/blog/' . $id);
            } else {
                session::flash('error', 'Blog  not saved, try again!');
                return redirect('/blog/' . $id);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $blog = $this->blogRepo->findBlog($id);

        if ($this->blogRepo->delete($id)) {
            //logging action
            $this->logevent->generateLogs("Blog  page with title - " . $blog->title . " - Editted");

            session::flash('success', 'Successfully deleted Blog!');
            return redirect('/home');
        } else {
            session::flash('error', 'Deletion failed, please try again');
            return redirect('/home');
        }
    }

    public function unpublished()
    {
        //get unpublished blogs
        $allBlogs = $this->blogRepo->getUnPublishedBlogs();
        return view('deleteBlogs', compact('allBlogs'));
    }

    public function restore($id)
    {
        if ($this->blogRepo->upunblish($id)) {
            session::flash('success', 'Blog Successfully restored!');
            return redirect('/home');
        }else {
            session::flash('error', 'Deletion failed, please try again');
            return redirect('/home');
        }

    }

    public function wipeBlog($id)
    {
        if ($this->blogRepo->wipeBlog($id)) {
            session::flash('success', 'Blog Successfully Deleted!');
            return redirect('/home');
        }else {
            session::flash('error', 'Deletion failed, please try again');
            return redirect('/home');
        }

    }
}
