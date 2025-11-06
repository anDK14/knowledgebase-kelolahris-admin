<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebsiteFeature extends Model
{
    use HasFactory;

    protected $table = 'submodules';

    protected $fillable = [
        'module_id',
        'name',
        'description',
        'view_count'
    ];

    protected $casts = [
        'view_count' => 'integer',
    ];

    /**
     * Relationship dengan module
     */
    public function module(): BelongsTo
    {
        return $this->belongsTo(WebsiteModule::class, 'module_id');
    }

    /**
     * Increment view count
     */
    public function incrementViewCount(): void
    {
        $this->increment('view_count');
    }
}