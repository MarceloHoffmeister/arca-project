<?php

namespace Arca\Domains\Ocurrence\Models;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Subscription
 * @package Arca\Domains\Ocurrence\Database\Models
 * @method static Builder firstOr($columns = ['*'], Closure $callback = null)
 */
class Company extends Model
{
    protected $table = 'public.companies';
    protected $primarykey = 'id';

    protected $fillable = ['company_id', 'name', 'email', 'whatsapp', 'city', 'uf'];

    public function incident(): BelongsTo
    {
        return $this->belongsTo('Incident');
    }
}
