<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecipientLocation extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'recipient_id',
    ];

    public function recipient(): BelongsTo
    {
      return $this->belongsTo(Recipient::class);
    }
}
