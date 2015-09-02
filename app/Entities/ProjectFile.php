<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Project
 * @package CodeProject\Entities
 */
class ProjectFile extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'description',
        'extension'
    ];

    public function project()
    {
        return $this->belongsTo(ProjectNote::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'project_members', 'project_id' ,'member_id');
    }
}
