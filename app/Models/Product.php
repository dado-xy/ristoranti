<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    public $timestamps = false;

    protected $fillable = [
        'title',
        'image',
        'price',
        'partner_id'
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
