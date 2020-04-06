<?php

namespace BinaryBuilds\NovaMailManager\Filters;

use BinaryBuilds\LaravelMailManager\Models\MailManagerMail;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class MailableFilter extends Filter
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
        return $query->where('mailable_name', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return MailManagerMail::groupBy('mailable_name')->pluck('mailable_name', 'mailable_name')->toArray();
    }

    /**
     * @return array|null|string
     */
    public function name()
    {
        return __('Filter By Mailable');
    }
}
