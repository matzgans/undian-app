<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Participant extends Model
{
    use HasFactory;

    protected $tables = 'participants';
    protected $guarded = [];


    public function undians(): HasMany
    {
        return $this->hasMany(Undian::class);
    }
}
