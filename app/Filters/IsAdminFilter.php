<?php

namespace App\Filters;
use Illuminate\Database\Eloquent\Builder;

use Closure;

class IsAdminFilter
{
    public function apply(Builder $query, $value)
    {
        if ($value) {
            return $query->where('is_admin', 'like', '%' . $value . '%');
        }

        return $query;
    }
}
