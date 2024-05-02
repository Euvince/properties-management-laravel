<?php

namespace App\Models;

use App\Models\Option;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'sold' => 'boolean'
    ];

    public function getSlug(): string
    {
        return \Str::slug($this->title);
    }

    public function getExcerpt(string $string, int $limit = 20): string
    {
        if(mb_strlen($string) <= $limit) return $string;
        if(mb_strlen($string) <= 0) return null;
        return mb_substr($string, 0, $limit) . '...';
    }

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }

    public function scopeAvailable(Builder $builder, $available = true): Builder
    {
        return $builder->where('sold', !$available);
    }

    public function scopeRecent(Builder $builder): Builder
    {
        return $builder->latest('created_at', 'desc');
    }
}
