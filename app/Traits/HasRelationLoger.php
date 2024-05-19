<?php

namespace App\Traits;

use App\Models\Loger;

trait HasRelationLoger
{
    public function logers()
    {
        return $this->morphMany(Loger::class, 'logerable');
    }
}
