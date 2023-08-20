<?php

namespace App\Filters ;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class Filters
{
    protected $request;
    protected $query;
    protected $filters = [
        UsernameFilter::class,
        EmailFilter::class,
        NameFilter::class,
        IsActiveFilter::class,
        IsAdminFilter::class,
    ];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $query)
    {
        $this->query = $query;
    
        foreach ($this->getFilters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value); // Pass the $value parameter to the filter method
            }
        }
    
        return $this->query;
    }

    protected function getFilters()
    {
        return $this->request->only(array_keys($this->request->all()));
    }

    protected function usernameFilter($value)
    {
        if ($value) {
            $this->query->where('username', 'like', '%' . $value . '%');
        }
    }
    protected function emailFilter($value)
    {
        if ($value) {
            $this->query->where('email', 'like', '%' . $value . '%');
        }
    }

    protected function nameFilter($value)
    {
        if ($value) {
            $this->query->where('first_name', 'like', '%' . $value . '%');
        }
    }

    protected function isActiveFilter($value)
    {
        if ($value) {
            $this->query->where('is_active', 'like', '%' . $value . '%');
        } 
    
    }

    protected function isAdminFilter($value)
    {
        if ($value) {
            $this->query->where('is_admin', 'like', '%' . $value . '%');
        } 
    
    }
}
