<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class client_monthly_invoices extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['activity_key','activity','description','qty','rate','amount',
                           'month','year','client_id','created_at','updated_at','deleted_at'];
}
