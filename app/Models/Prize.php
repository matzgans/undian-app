<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prize extends Model
{
    use HasFactory;

    protected $tables = 'prize';
    protected $guarded = [];


    public function undians(): HasMany
    {
        return $this->hasMany(Undian::class);
    }
}
