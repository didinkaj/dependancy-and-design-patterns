<?php

namespace Blog\Http\Controllers;

use Blog\Logger\ButtonBuilder;
use Blog\Logger\Factory\LoggingFactory;

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
        $app = app();
        //sample of factory implementation
       $factory = new LoggingFactory();
       $alllogs = $factory->viewLog('all')->get();
       //builder
       /* $buttonBuilder = new ButtonBuilder();
        $buttonwithRedColor=  $buttonBuilder->setColor('red')->build();
        $buttonwithRedColorHeitht=$buttonBuilder->setColor('red')->setHeight(900)->build();*/



        return view('welcome',compact('allBlogs','app','alllogs'));
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
