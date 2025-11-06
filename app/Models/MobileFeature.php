<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MobileFeature extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mobile_features';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'mobile_module_id',
        'name',
        'description',
        'view_count',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'view_count' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the mobile module that owns the feature.
     */
    public function mobileModule(): BelongsTo
    {
        return $this->belongsTo(MobileModule::class, 'mobile_module_id');
    }

    /**
     * Increment the view count.
     */
    public function incrementViewCount(): void
    {
        $this->increment('view_count');
    }
}