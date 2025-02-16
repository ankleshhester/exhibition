<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkStatistic extends Model
{
    use HasFactory;

    protected $fillable = ['link_id', 'action', 'ip_address', 'visitor_id'];

    public function link()
    {
        return $this->belongsTo(Link::class);
    }

    public function visitor()
    {
        return $this->belongsTo(Visitor::class, 'visitor_id');
    }
}
