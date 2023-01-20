<?php

namespace BinaryBuilds\NovaMailManager\Resources;

use BinaryBuilds\LaravelMailManager\Models\MailManagerMail;
use BinaryBuilds\NovaMailManager\Actions\ResendMail;
use BinaryBuilds\NovaMailManager\Filters\MailableFilter;
use BinaryBuilds\NovaMailManager\Filters\QueuedFilter;
use BinaryBuilds\NovaMailManager\Filters\SentOnOrAfterFilter;
use BinaryBuilds\NovaMailManager\Filters\SentOnOrBeforeFilter;
use BinaryBuilds\NovaMailManager\Filters\StatusFilter;
use BinaryBuilds\NovaMailManager\Metrics\EmailsByMailable;
use BinaryBuilds\NovaMailManager\Metrics\EmailsPerDay;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Resource;
use Illuminate\Http\Request;

/**
 * Class NovaMailResource
 * @package BinaryBuilds\Resources
 */
class NovaMailResource extends Resource
{
    /**
     * @var string
     */
    public static $model = MailManagerMail::class;

    /**
     * @var array
     */
    public static $search = ['mailable_name', 'subject', 'recipients'];

    /**
     * @var bool
     */
    public static $displayInNavigation = true;

    /**
     * @var int
     */
    public static $perPageViaRelationship = 25;

    /**
     * @param Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(),
            Text::make(__('Uuid'), 'uuid')->onlyOnDetail(),
            Text::make(__('Mailable'), 'mailable_name'),
            Text::make(__('Subject'), 'subject'),
            Text::make(__('Recipients'), function () {
                return implode(', ', $this->recipients);
            }),
            Boolean::make(__('Is Queued'), 'is_queued'),
            Boolean::make(__('Is Sent'), 'is_sent'),
            Number::make(__('Tries'), 'tries'),
        ];
    }

    public function actions(Request $request)
    {
        return [
            new ResendMail
        ];
    }

    public function filters(Request $request)
    {
        return [
            new MailableFilter,
            new StatusFilter,
            new QueuedFilter,
            new SentOnOrAfterFilter,
            new SentOnOrBeforeFilter
        ];
    }

    public function cards(Request $request)
    {
        return [
            new EmailsPerDay,
            new EmailsByMailable
        ];
    }

    public static function label()
    {
        return __('Mails');
    }

    public static function singularLabel()
    {
        return __('Mail');
    }

    public static function uriKey()
    {
        return 'nova-mail-manager';
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    public function authorizedToUpdate(Request $request)
    {
        return false;
    }
}
