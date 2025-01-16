<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'department_id',
        'productname',
        'productdesc',
        'productquantity',
        'priceperunit',
        'rentalperunit',
        'status',
        'expdate',
    ];

    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
