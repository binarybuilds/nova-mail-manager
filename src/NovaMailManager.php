<?php

namespace BinaryBuilds\NovaMailManager;

use BinaryBuilds\NovaMailManager\Resources\NovaMailResource;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;
use Illuminate\Http\Request;

class NovaMailManager extends Tool
{
    public string $MailResource = NovaMailResource::class;
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::resources([
            $this->MailResource,
        ]);
    }

    /**
     * Build the menu that renders the navigation links for the tool.
     *
     * @param  \Illuminate\Http\Request $request
     * @return mixed
     */
    public function menu(Request $request)
    {
        return $this;
    }

    public function MailResource(string $MailResource): NovaMailManager
    {
        $this->MailResource = $MailResource;

        return $this;
    }
}
