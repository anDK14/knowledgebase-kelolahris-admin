<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faq extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'faq';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'submodule_id',
        'mobile_feature_id',
        'question',
        'answer',
    ];

    /**
     * Get the submodule that owns the FAQ.
     */
    public function submodule(): BelongsTo
    {
        return $this->belongsTo(WebsiteFeature::class, 'submodule_id');
    }

    /**
     * Get the mobile feature that owns the FAQ.
     */
    public function mobileFeature(): BelongsTo
    {
        return $this->belongsTo(MobileFeature::class, 'mobile_feature_id');
    }
}