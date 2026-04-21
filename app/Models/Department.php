<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'department';
    protected $primaryKey = 'department_id';

    protected $fillable = [
        'department_name',
        'department_email',
        'department_password',
    ];

    protected $hidden = [
        'department_password',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function admins()
    {
        return $this->hasMany(Admin::class, 'department_id', 'department_id');
    }
}
