<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'body',
        'category_id'
    ];
        
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('category')->orderBy( 'update_at', 'DESC' )->Paginate($limit_count);
    }
}
