<?php

namespace Hexters\Ladmin\Searches;

use Hexters\Ladmin\Models\LadminGroupSearch as ModelsLadminGroupSearch;
use Hexters\Ladmin\Observers\LadminGroupSearchObserver;

trait LadminGroupSearch
{

    /**
     * Abstract for set permission access
     *
     * @return array:null
     */
    abstract protected function searchGates();

    /**
     * Abstract Group name 
     *
     * @return string
     */
    abstract protected function searchGropuName();

    /**
     * Abstract title search
     *
     * @return string
     */
    abstract protected function searchTitle();

    /**
     * Abstract description search
     *
     * @return string
     */
    abstract protected function searchDescription();

    /**
     * Abstract for get detail page
     *
     * @return string
     */
    abstract protected function searchLinkDetails();

    protected static function bootLadminGroupSearch()
    {
        static::observe(LadminGroupSearchObserver::class);
    }

    /**
     * Add custom data
     *
     * @return array
     */
    protected function data(): array
    {
        return [
            // ...
        ];
    }

    /**
     * Link target url
     *
     * @return string
     */
    protected function linkTarget()
    {
        return '_self';
    }

    /**
     * Custom list view
     *
     * @param \Hexters\Ladmin\Models\LadminGroupSearch $data
     * @return \Illuminate\Support\Facades\Blade
     */
    public function view($data)
    {
        return ladmin()->view('vendor.search.list-tile', [
            'item' => $data
        ]);
    }

    /**
     * Generate data store
     *
     * @return void
     */
    final public function searchData()
    {
        return [
            'gates' => $this->searchGates(),
            'title' => $this->searchTitle(),
            'description' => $this->searchDescription(),
            'group' => $this->searchGropuName(),
            'link_details' => $this->searchLinkDetails(),
            'target' => $this->linkTarget(),
            'data' => $this->data(),
        ];
    }

    /**
     * Search Relation
     *
     * @return collection
     */
    final public function searchDataFromDatabase()
    {
        return $this->morphMany(ModelsLadminGroupSearch::class, 'searchable');
    }

    /**
     * Import all data to search
     *
     * @return number
     */
    final public function searchImport()
    {
        self::chunk(100, function ($items) {
            $items->each(function ($item) {
                $item->searchDataFromDatabase()->firstOrCreate([
                    'searchable_type' => get_class($item),
                    'searchable_id' => $item->id,
                ], $item->searchData());
            });
        });

        return self::count();
    }

    /**
     * Delete data search
     *
     * @return number
     */
    final public function searchFlush()
    {
        return ModelsLadminGroupSearch::where('searchable_type', get_called_class())->delete();
    }
}
