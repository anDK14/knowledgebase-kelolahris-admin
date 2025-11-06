<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContentsMobileFeature extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mobilefeature_contents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'mobile_feature_id',
        'content_type',
        'title',
        'description',
        'image_path',
        'content_order',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'content_order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the mobile feature that owns the content.
     */
    public function mobileFeature(): BelongsTo
    {
        return $this->belongsTo(MobileFeature::class, 'mobile_feature_id');
    }
}