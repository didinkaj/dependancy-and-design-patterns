<?php

namespace Blog;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;


class Blog extends Model
{
    use SoftDeletes;


    protected $dates = ['deleted_at'];
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'category', 'body', 'user_id', 'published',
    ];

    public function user()
    {
        return $this->belongsTo('Blog\User');
    }

    //mutators
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucwords($value);
    }
    //scope to include deleted blogs
    public function scopeGetDeleted($query)
    {
        return $query->onlyTrashed();
    }


}
