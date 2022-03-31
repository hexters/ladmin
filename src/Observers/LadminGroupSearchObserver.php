<?php

namespace Hexters\Ladmin\Observers;

class LadminGroupSearchObserver
{

    public function created($model)
    {
        $model->searchDataFromDatabase()->create($model->searchData());
    }

    public function updated($model)
    {
        $model->searchDataFromDatabase()->create($model->searchData());
    }

    public function deleting($model)
    {
        $model->searchDataFromDatabase()->delete();
    }

    public function forceDeleted($model)
    {
        $model->searchDataFromDatabase()->delete();
    }

    public function restored($model)
    {
        $model->searchDataFromDatabase()->delete();
    }
}
