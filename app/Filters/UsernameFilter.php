<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class UsernameFilter
{
    public function apply(Builder $query, $value)
    {
        if ($value) {
            return $query->where('username', 'like', '%' . $value . '%');
        }

        return $query;
    }
}
