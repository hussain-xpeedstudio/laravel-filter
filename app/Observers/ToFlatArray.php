<?php

namespace App\Observers;

class ToFlatArray
{
    public function retrieved($model)
    {
        $model->toFlatArray();
    }
}
