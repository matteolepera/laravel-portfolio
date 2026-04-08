<?php

namespace App\Models;

use Database\Seeders\ProjectTableSeeder;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{

    //collego i progetti
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
