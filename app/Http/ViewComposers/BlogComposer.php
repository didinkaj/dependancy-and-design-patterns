<?php

namespace Blog\Http\ViewComposers;
use Blog\Blog;
use Blog\User;
use Illuminate\View\View;
use Auth;


class BlogComposer
{
    public $blogs;
    public function __construct(Blog $blogs)
    {
        // Dependencies automatically resolved by service container...
        $this->blogs = $blogs;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $allBlogs = $this->blogs->orderBy('id', 'desc')->limit(10)->get();
        $allusersno = User::count();
        $view->with('allBlogsForAll', $allBlogs)
                ->with('allusersno',$allusersno);
    }

}