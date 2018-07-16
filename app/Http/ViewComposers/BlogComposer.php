<?php

namespace Blog\Http\ViewComposers;
use Blog\User;
use Blog\Blog;
use Illuminate\View\View;
use Auth;


class BlogComposer
{
    protected $users;
    public function __construct(User $users)
    {
        // Dependencies automatically resolved by service container...
        $this->users = $users;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $allBlogs = Blog::orderBy('id', 'desc')->limit(10)->get();
        $allusersno = User::count();
        $view->with('allBlogsForAll', $allBlogs)
                ->with('allusersno',$allusersno);
    }

}