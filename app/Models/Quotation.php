<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use LogicException;

class Quotation extends Model
{
    use HasFactory;

    public const STATUS_DRAFT = 'draft';

    public const STATUS_SENT = 'sent';

    public const STATUS_ACCEPTED = 'accepted';

    protected $fillable = ['lead_id', 'version', 'status', 'description', 'total', 'sent_at', 'created_by'];

    protected function casts(): array
    {
        return [
            'total' => 'decimal:2',
            'sent_at' => 'datetime',
            'accepted_at' => 'datetime',
            'locked_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::updating(function (self $quotation): void {
            if ($quotation->getOriginal('locked_at') !== null) {
                throw new LogicException('Quotation yang sudah disetujui dan dikunci tidak dapat diubah.');
            }
        });

        static::deleting(function (self $quotation): void {
            if ($quotation->locked_at !== null) {
                throw new LogicException('Quotation yang sudah disetujui dan dikunci tidak dapat dihapus.');
            }
        });
    }

    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function accepter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'accepted_by_user_id');
    }

    public function isLocked(): bool
    {
        return $this->locked_at !== null;
    }
}
