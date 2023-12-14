<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class client_fees extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['fullfillment_fees','client_id'];
}
