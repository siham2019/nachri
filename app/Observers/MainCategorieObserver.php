<?php

namespace App\Observers;

use App\Models\MainCategorie;

class MainCategorieObserver
{
    /**
     * Handle the MainCategorie "created" event.
     *
     * @param  \App\Models\MainCategorie  $mainCategorie
     * @return void
     */
    public function created(MainCategorie $mainCategorie)
    {
        //
    }

    /**
     * Handle the MainCategorie "updated" event.
     *
     * @param  \App\Models\MainCategorie  $mainCategorie
     * @return void
     */
    public function updated(MainCategorie $mainCategorie)
    {
        $mainCategorie -> vendors()-> update(['active' => $mainCategorie -> active]);
    }

    /**
     * Handle the MainCategorie "deleted" event.
     *
     * @param  \App\Models\MainCategorie  $mainCategorie
     * @return void
     */
    public function deleted(MainCategorie $mainCategorie)
    {
        //
    }

    /**
     * Handle the MainCategorie "restored" event.
     *
     * @param  \App\Models\MainCategorie  $mainCategorie
     * @return void
     */
    public function restored(MainCategorie $mainCategorie)
    {
        //
    }

    /**
     * Handle the MainCategorie "force deleted" event.
     *
     * @param  \App\Models\MainCategorie  $mainCategorie
     * @return void
     */
    public function forceDeleted(MainCategorie $mainCategorie)
    {
        //
    }
}
