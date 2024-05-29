<?php

namespace App\Traits;

use App\Models\Loger;
use Exception;

trait HasObserver
{

    protected static function booted(): void
    {
        static::created(function ($model) {
            $model->logers()->create([
                'operation_type' => 'create',
                'new_content' => json_encode($model->getDirty())
            ]);
        });

        static::updating(function ($model) {
            $model->logers()->create([
                'operation_type' => 'update',
                'old_content' => json_encode($model->getOriginal()),
                'new_content' => json_encode($model->getDirty())
            ]);
        });

        static::retrieved(function ($model) {
            try {
                 $model->logers()->create([
                    'operation_type' => 'read',
                ]);
            } catch (Exception $e) {
                $model->logers()->create([
                    'old_content' => $e->getMessage(),
                ]);
            }
//            static::retrieved(function ($model) {
//                $model->logers()->create([
//                    'operation_type' => 'read',
//                ]);
//            });
        });

        static::deleting(function ($model) {
            $model->logers()->create([
                'operation_type' => 'delete',
                'old_content' => json_encode($model->getOriginal()),
            ]);
        });

        static::restored(function ($model) {
            $model->logers()->create([
                'operation_type' => 'restore',
            ]);
        });
    }
}
