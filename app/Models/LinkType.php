<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LinkType extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'name','created_by','updated_by'    
    ];
     public function LinkUrl()
    {
        return $this->hasMany(Link::class, 'link_type_id');
    }
}
