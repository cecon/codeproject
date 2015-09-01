<?php
/**
 * Created by PhpStorm.
 * User: clecio
 * Date: 30/08/2015
 * Time: 21:29
 */

namespace CodeProject\Transformers;

use CodeProject\Entities\User;
use League\Fractal\TransformerAbstract;

class ProjectMemberTransformer extends TransformerAbstract
{
    public function transform(User $member)
    {
        return [
          'member_id' => $member->id,
          'member_name' => $member->name,
        ];
    }

}