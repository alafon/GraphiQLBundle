<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container): void {
    $container->extension('framework', [
        'test' => null,
        'secret' => 'test',
        'router' => [
            'resource' => '%kernel.project_dir%/Resources/config/routing.xml',
        ],
        'profiler' => ['enabled' => false],
        'assets' => ['enabled' => false],
    ]);
};