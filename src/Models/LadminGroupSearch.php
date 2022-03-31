<?php

namespace Hexters\Ladmin\Models;

use Hexters\Ladmin\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Attributes\SearchUsingPrefix;
use Laravel\Scout\Searchable;

class LadminGroupSearch extends Model
{
    use HasFactory, UuidGenerator, Searchable;

    protected $fillable = [
        'uuid',
        'group',
        'gates',
        'title',
        'target',
        'description',
        'link_details',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
        'gates' => 'array',
    ];

    public function searchable()
    {
        return $this->morphTo();
    }

    /**
     * Get the name of the index associated with the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'ladmin_gsearch_index';
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    #[SearchUsingPrefix(['group', 'title', 'description', 'data'])]
    #[SearchUsingFullText(['group', 'title', 'description', 'data'])]
    public function toSearchableArray()
    {
        return [
            'group' => $this->group,
            'title' => $this->title,
            'description' => $this->description,
            'data' => $this->data,
        ];
    }
}
