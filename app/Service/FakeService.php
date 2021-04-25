<?php

declare(strict_types=1);

namespace App\Service;

class FakeService
{
    private string $config;

    public function __construct(string $configParam)
    {
        $this->config = $configParam;
    }

    public function getConfig(): string
    {
        return $this->config;
    }
}
