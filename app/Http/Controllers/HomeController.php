<?php

namespace Blog\Http\Controllers;


use Blog\Repositories\Blog\BlogRepository;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $blogRepo;


    function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepo = $blogRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allBlogs = $this->blogRepo->getAllBlogs();

        return view('welcome',compact('allBlogs'));
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

        return view('blogdetailsguest',compact('allBlogs'));
    }
}
