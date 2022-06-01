<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'image',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected static function booted()
    {
        static::deleted(function ($invoice) {
            $invoice->products()->delete();
        });
    }

}
