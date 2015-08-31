<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Project
 * @package CodeProject\Entities
 */
class Project extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'description',
        'progress',
        'status',
        'due_date',
        'owner_id',
        'client_id'
    ];

    public function notes()
    {
        return $this->hasMany(ProjectNote::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'project_members', 'project_id' ,'member_id');
    }
}
