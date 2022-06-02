<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Article extends Model
{   
    use Sluggable;
    use SluggableScopeHelpers;

    protected $table = "articles";

    protected $fillable = ['title', 'content', 'category_id', 'user_id', 'category_id', 'created_at'];

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function tags() 
    {
        return $this->belongsToMany('App\Tag');
    }

    public function scopeSearch($query, $title){
        return $query->where('title', 'LIKE', "%$title%");
    }

    public function scopeSearchfecha($query, $created_at)
    {
        if (trim($created_at) != "")
        {
        $query->where('created_at', 'LIKE', "%$created_at%");
    }
    
    }
}
