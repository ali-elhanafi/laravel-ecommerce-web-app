<?php

namespace App\Models;
//
//use Cviebrock\EloquentSluggable\Sluggable;
//use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends model
{
    use HasFactory;



    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function setTitleAttribute($value){
        $this->attributes['title'] = Str::ucfirst($value);
    }

    public function getPhotoAttribute($value) {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
    }

}
//
//    use Sluggable;
//    use SluggableScopeHelpers;


//    public function sluggable(): array
//    {
//        return [
//            'slug' => [
//                'source'   => 'title',
//
//            ]
//        ];
//    }
