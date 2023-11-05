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
     * This method change the objects into a flat array
     * ex: category_name comes from 
     * category{
     *      'name': 'xpeed-studio'     
     * }
     */
    public function toFlatArray()
    {
        foreach ($this as $value) {
            foreach ($value::getValidRelations() as $relation) {
                if (array_key_exists('relationColumn', $relation)) {
                    foreach ($relation['relationColumn'] as $field) {
                        $value->{$relation['relationWith'] . '_' . $field} = $value->{$relation['relationWith']}->$field;
                    }
                } else {
                    $value->{$relation['relationWith'] . '_name'} = $value->{$relation['relationWith']}->name;
                }
            }
        }
        return $this;
    }
}
