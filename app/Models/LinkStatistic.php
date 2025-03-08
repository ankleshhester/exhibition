<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkStatistic extends Model
{
    use HasFactory, HasAdvancedFilter;

    public $table = 'link_statistics';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'link_id',
        'ip_address',
        'visitor_id',
        'action',
    ];

    public $orderable = [
        'id',
        'link.name',
        'ip_address',
        'visitor.name',
        'action',
    ];

    public $filterable = [
        'id',
        'link.name',
        'ip_address',
        'visitor.name',
        'action',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function link()
    {
        return $this->belongsTo(Link::class);
    }

    public function visitor()
    {
        return $this->belongsTo(Visitor::class, 'visitor_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getUpdatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getDeletedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }
}
