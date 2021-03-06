<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name', 'slug'
    ];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function posts()
    {
        $postsCollection = collect();
        foreach ($this->subCategories as $subCategory) {
            foreach ($subCategory->posts as $post) {
                $postsCollection->push($post);
            }
        }

        return $postsCollection;
    }
}
