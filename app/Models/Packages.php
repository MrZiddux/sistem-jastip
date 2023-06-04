<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Packages extends Model
{
    use HasFactory;

    protected $fillable = [
      'recipient_id',
      'tracking_number',
      'weight',
      'pricing_option',
      'length',
      'width',
      'height',
      'cubic_weight',
      'price',
    ];

    public function recipient(): HasOne
    {
      return $this->hasOne(Recipient::class, 'id', 'recipient_id');
    }

    public function recipientStatus(): HasOne
    {
      return $this->hasOne(RecipientStatus::class, 'recipient_id', 'id');
    }
}
