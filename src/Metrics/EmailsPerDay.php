<?php

namespace BinaryBuilds\NovaMailManager\Metrics;

use BinaryBuilds\LaravelMailManager\Models\MailManagerMail;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Trend;

class EmailsPerDay extends Trend
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->countByDays($request, MailManagerMail::class)->showLatestValue();
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [
            7  => '1 '.__('Week'),
            14 => '2 '.__('Weeks'),
            30 => '30 '.__('Days'),
            60 => '60 '.__('Days'),
            90 => '90 '.__('Days'),
        ];
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'emails-per-day';
    }

    /**
     * @return array|null|string
     */
    public function name()
    {
        return __('Emails Per Day');
    }
}
