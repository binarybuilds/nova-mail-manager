<?php

namespace BinaryBuilds\NovaMailManager\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class StatusFilter extends Filter
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
        if( $value === 'sent' ) {
            return $query->where('is_sent', true );
        } elseif ( $value === 'unsent') {
            return $query->where('is_sent', false );
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
            'Sent Emails' => 'sent',
            'Unsent Emails' => 'unsent'
        ];
    }

    /**
     * @return array|null|string
     */
    public function name()
    {
        return __('Filter By Status');
    }
}
