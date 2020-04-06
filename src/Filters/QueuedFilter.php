<?php

namespace BinaryBuilds\NovaMailManager\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class QueuedFilter extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

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
        if( $value === 'queued' ) {
            return $query->where('is_queued', true );
        } elseif ( $value === 'not-queued') {
            return $query->where('is_queued', false );
        }

        return $query;
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return [
            'Queued Emails' => 'queued',
            'Not Queued Emails' => 'not-queued'
        ];
    }

    /**
     * @return array|null|string
     */
    public function name()
    {
        return __('Filter By Queued Status');
    }
}
