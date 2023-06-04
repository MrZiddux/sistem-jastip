<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Recipient extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
    ];

    public function packages(): HasMany
    {
      return $this->hasMany(Packages::class);
    }

    public function recipientStatus(): HasOne
    {
      return $this->hasOne(RecipientStatus::class, 'recipient_id', 'id');
    }
}
