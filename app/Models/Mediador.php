<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mediador extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = "mediador";

 

    // $mediador = Mediador::create(['title' => 'Traveling to Europe']);
    // $mediador->id;
}
