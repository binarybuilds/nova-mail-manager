<?php

namespace BinaryBuilds\NovaMailManager\Filters;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Laravel\Nova\Filters\DateFilter;

class SentOnOrAfterFilter extends DateFilter
{

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        $value = Carbon::parse($value);

        return $query->where('created_at', '>=', $value );
    }

    /**
     * @return array|null|string
     */
    public function name()
    {
        return __('Filter By Date(On Or After)');
    }
}
