<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'admins';
    protected $primaryKey = 'admin_id';

    protected $fillable = [
        'admin_name',
        'admin_email',
        'admin_password',
        'department_id',
        'can_edit_status',
        'can_approve_clearance',
        'can_add_remarks',
    ];

    protected $hidden = [
        'admin_password',
    ];

    protected $casts = [
        'can_edit_status' => 'boolean',
        'can_approve_clearance' => 'boolean',
        'can_add_remarks' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }
}
