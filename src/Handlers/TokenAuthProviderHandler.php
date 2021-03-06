<?php


namespace DynamicScreen\SdkPhp\Handlers;

use DynamicScreen\SdkPhp\Interfaces\IModule;

abstract class TokenAuthProviderHandler extends BaseAuthProviderHandler
{
    protected $default_config = [];

    abstract public function endpoint_uri();


    public function __construct(IModule $module, $config = null)
    {
        parent::__construct($module);
        $this->default_config = $config;
    }

    public function getDefaultOptions(): array
    {
        return [];
    }

    public function getTokenName(): string
    {
        return 'Token';
    }
}
