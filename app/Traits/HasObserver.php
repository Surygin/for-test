<?php

namespace App\Traits;

use App\Models\Loger;

trait HasObserver
{

    protected static function booted(): void
    {
        static::created(function ($class) {
            $class->logers()->create([
                'operation_type' => 'create',
                'new_content' => json_encode($class->getDirty())
            ]);
        });

        static::updating(function ($class) {
            $class->logers()->create([
                'operation_type' => 'update',
                'old_content' => json_encode($class->getOriginal()),
                'new_content' => json_encode($class->getDirty())
            ]);
        });

        static::retrieved(function ($class) {
            $class->logers()->create([
                'operation_type' => 'read',
            ]);
        });

        static::deleting(function ($class) {
            $class->logers()->create([
                'operation_type' => 'delete',
                'old_content' => json_encode($class->getOriginal()),
            ]);
        });

        static::restored(function ($class) {
            $class->logers()->create([
                'operation_type' => 'restore',
            ]);
        });
    }
}
