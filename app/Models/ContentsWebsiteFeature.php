<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContentsWebsiteFeature extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'websitefeature_contents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'submodule_id',
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
     * Get the website feature that owns the content.
     */
    public function websiteFeature(): BelongsTo
    {
        return $this->belongsTo(WebsiteFeature::class, 'submodule_id');
    }

    /**
     * Get the submodule that owns the content.
     * Alternate relationship name for consistency
     */
    public function submodule(): BelongsTo
    {
        return $this->belongsTo(WebsiteFeature::class, 'submodule_id');
    }
}