<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'body',
        'category_id',
        'user_id'
    ];
        
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('user')->with('category')->orderBy( 'updated_at', 'DESC' )->Paginate($limit_count);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function responces()
    {
        return $this->hasMany(Responce::class);
    }
}
