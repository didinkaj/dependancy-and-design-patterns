<?php

namespace Blog\Repositories\Blog;
use Blog\User;
use Blog\Blog;
use Auth;


class BlogRepository
{
    public $blog;


    function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }


    public function getAllBlogs()
    {
        return $this->blog->latest()->with('user')->paginate(3);

    }
    public function getUnPublishedBlogs()
    {
       // ret Blog::all();
        return $this->blog->latest()->GetDeleted()->with('user')->latest()->paginate(3);

    }

    public function saveBlog($request)
    {
        $data =
            [
                'user_id' => Auth::id(),
                'title' => $request->input(['title']),
                'category' => $request->input(['category']),
                'body' => $request->input(['body']),
                'published' => 0,
            ];
        return $this->blog->latest()->create($data);
    }


    public function findBlog($id)
    {
        return $this->blog->where('id', $id)->first();
    }

    public function update($request, $id)
    {
        $data =
            [
                'user_id' => Auth::id(),
                'title' => $request->input(['title']),
                'category' => $request->input(['category']),
                'body' => $request->input(['body']),
                'published' => 0,
            ];
        return $this->blog->where('id', $id)->where('user_id', Auth::id())->update($data);

    }


    public function delete($id)
    {
        return $this->blog->destroy($id);
    }
}