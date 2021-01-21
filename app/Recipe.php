<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Recipe extends Model
{
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
//
//    const SEARCHABLE_FIELDS = ['id', 'title'];
//
//    public function toSearchableArray()
//    {
//        return $this->only(self::SEARCHABLE_FIELDS);
//    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
