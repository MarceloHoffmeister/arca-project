<?php

namespace Arca\Domains\Ocurrence\Database\Models;

use Arca\Domains\Ocurrence\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Incident extends Model
{
    protected $table = 'public.incidents';
    protected $primarykey = 'id';

    protected $fillable = ['company_id', 'incident_id', 'title', 'description', 'value'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }

}
