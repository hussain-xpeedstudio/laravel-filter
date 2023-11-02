<?php

namespace SyntheticFilters\Models;

use Illuminate\Database\Eloquent\Collection;

class CustomCollection extends Collection
{
    /**
     * Perform a custom operation on the collection.
     *
     * @return mixed
     */

    /**
     * Pass only object onto old value and new value
     */
    public function toFlatArray()
    {
        $relations = $this[0]->getRelations();

        foreach ($this as $value) {
            foreach ($relations as $key => $relation) {
                $value->setAttribute($key . '_name', $value->$key->name);
            }
        }
        return $this;
    }
}
