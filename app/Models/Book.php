<?php

// app/Models/Book.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = [
        'title', 'slug', 'chef_name', 'description', 
        'category_id', 'borrow_count', 'is_damaged'
    ];

  
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}