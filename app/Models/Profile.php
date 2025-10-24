<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'bio',
        'avatar'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getBio()
    {
        $locale = app()->getLocale();

        if ($locale == 'tm') {
            return $this->bio_tm ?: $this->bio;
        } else if ($locale == 'ru') {
            return $this->bio_ru ?: $this->bio;
        }
        return $this->bio;
    }
}
