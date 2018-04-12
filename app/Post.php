<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'content', 'category_id', 'featured', 'slug'];

    protected $dates = ['deleted_at'];

    /**
     * Display image post
     * @param $featured
     * @return string
     */
    public function getFeaturedAttribute($featured){
        return asset($featured);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){

        return $this->belongsTo('App\Category');

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
