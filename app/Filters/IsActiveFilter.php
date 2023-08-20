<?php

namespace App\Filters;
use Illuminate\Database\Eloquent\Builder;

use Closure;

class IsActiveFilter
{
    public function apply(Builder $query, $value)
    {
        if ($value) {
            return $query->where('is_active', 'like', '%' . $value . '%');
        }

        return $query;
    }
}
