<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class CoyaRegistration extends Model
{
    use CrudTrait;
    use SoftDeletes;

    protected $table = 'coya_registrations';

    protected $fillable = [
        'contactPersonName',
        'contactPersonDesignation',
        'contactPersonEmail',
        'contactPersonPhone',
        'companyEntityCategory',
        'companyName',
        'companyAddress',
        'companyNumberOfBranches',
        'companyTown',
        'countryOfCompany',
        'coyaParticipation',
        'lead_source',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
}