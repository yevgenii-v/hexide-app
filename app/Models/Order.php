<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    public const STATUS_OPENED = 'Opened';
    public const STATUS_CLOSED = 'Closed';
    public const STATUS_CANCELED = 'Canceled';

    protected $fillable = [
        'user_id',
        'receiver_address',
        'arrival_time',
        'status',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
