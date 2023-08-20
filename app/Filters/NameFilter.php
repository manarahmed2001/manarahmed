<?php

namespace App\Filters;
use Illuminate\Database\Eloquent\Builder;

use Closure;

class NameFilter
{
    public function apply(Builder $query, $value)
    {
        if ($value) {
            return $query->where('first_name', 'like', '%' . $value . '%');
        }

        return $query;
    }
}
