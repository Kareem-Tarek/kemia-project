<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $fillable = [
        'name',
        'parent_id',
        'status',
    ];

    public $translatable = ['name', 'status'];

    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function parentCategory()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
