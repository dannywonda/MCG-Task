<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function scopeSearchByName($query, $value)
    {
        // Get the search text from the user
        $searchText = '%' . $value . '%';

        return $query->where('name', 'like', $searchText)
                ->orWhere('description', 'like', $searchText)
                ->get()->toArray();
    }

    /**
     * Course can have many tags
    */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
