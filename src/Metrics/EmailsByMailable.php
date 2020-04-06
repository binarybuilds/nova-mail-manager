<?php

namespace BinaryBuilds\NovaMailManager\Metrics;

use BinaryBuilds\LaravelMailManager\Models\MailManagerMail;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Partition;

class EmailsByMailable extends Partition
{
    public $width = '2/3';

    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->count($request, MailManagerMail::class, 'mailable_name');
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
        return 'emails-by-mailable';
    }

    /**
     * @return array|null|string
     */
    public function name()
    {
        return __('Emails By Mailable');
    }
}
