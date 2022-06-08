<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class pelanggan extends Authenticatable
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pelanggan';
    protected $guarded = []; 
}
