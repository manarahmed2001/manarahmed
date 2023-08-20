<?php

namespace App\Filters;
use Illuminate\Database\Eloquent\Builder;

use Closure;

class EmailFilter
{
    public function apply(Builder $query, $value)
    {
        if ($value) {
            return $query->where('email', 'like', '%' . $value . '%');
        }

        return $query;
    }
}
