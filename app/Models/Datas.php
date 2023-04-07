<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datas extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'grade'
    ];

    public function scopeSelectSlug($query, $id)
    {
        return $query->where('slug', $id);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($data) {
            $data->slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $data->name);
        });
    }
}
