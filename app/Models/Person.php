<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = "persons";

    protected $guarded = [];

    protected $appends = ['full_name'];


    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function scopeSearch($query, $search)
    {
        $query = $query->where('first_name', 'LIKE', "%{$search}%")
                       ->orwhere('last_name', 'LIKE', "%{$search}%")
                       ->orwhere('cin', 'LIKE', "%{$search}%")
                       ->orwhere('email', 'LIKE', "%{$search}%");
    }

    public function getFullNameAttribute()
    {
    return "{$this->first_name} {$this->last_name}";
    }

}
