<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorPersonal extends Model
{
    use HasFactory;
    protected $table = "sponsors_personal";
    public $timestamps = true;
    protected $guarded =[];
}
