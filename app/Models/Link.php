<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
       'name', 'url','link_type_id','created_by','updated_by'    
    ];
    public function linkTypeID()
    {
        return $this->belongsTo(LinkType::class, 'link_type_id');
    }
}
