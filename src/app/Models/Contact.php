<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'detail'];

    public function getTel1Attribute()
    {
        return substr($this->tel, 0, 3);
    }

    public function getTel2Attribute()
    {
        return substr($this->tel, 3, 4);
    }

    public function getTel3Attribute()
    {
        return substr($this->tel, 7);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
