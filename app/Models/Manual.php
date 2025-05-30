<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manual extends Model
{
    protected $fillable = [
        'brand_id',
        'category_id',
        'user_id',
        'approved_by',
        'title',
        'slug',
        'language',
        'file_path',
        'download_count',
        'status',
        'rejection_reason',
        'approved_at',
        'description',
        'image'
    ];

    //get brand name
    public function brand()
    {
        return $this->belongsTo(Brand::class)->select(['id', 'name']);
    }
    //get category name
    public function category()
    {
        return $this->belongsTo(Category::class)->select(['id', 'name']);
    }
    //get user uploader
    public function user()
    {
        return $this->belongsTo(User::class)->select(['id', 'name']);
    }
    //get approved by user
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by')->select(['id', 'name']);
    }

    
}
