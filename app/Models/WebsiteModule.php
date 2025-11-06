<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebsiteModule extends Model
{
    use HasFactory;

    protected $table = 'modules';

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Relationship dengan features (submodules)
     */
    public function features(): HasMany
    {
        return $this->hasMany(WebsiteFeature::class, 'module_id');
    }
}