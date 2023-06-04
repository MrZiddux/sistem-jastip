<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RecipientStatus extends Model
{
    use HasFactory;

    protected $fillable = [
      'status_id',
    ];

    public function status(): HasOne
    {
      return $this->hasOne(Status::class, 'id', 'status_id');
    }

    public function recipient(): HasMany
    {
      return $this->hasMany(Recipient::class);
    }

    public function packages(): HasMany
    {
      return $this->hasMany(Packages::class);
    }
}
