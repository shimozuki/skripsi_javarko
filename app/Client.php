<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    public $table = 'clients';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'email',
        'phone',
        'skype',
        'company',
        'website_id',
        'country',
        'last_name',
        'status_id',
        'first_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function status()
    {
        return $this->belongsTo(ClientStatus::class, 'status_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'website_id');
    }
}
