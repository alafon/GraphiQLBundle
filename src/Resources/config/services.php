<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {
    $services = $container->services();

    $services->set('overblog_graphiql.controller.graphql.endpoint', \Overblog\GraphiQLBundle\Config\GraphiQLControllerEndpoint::class)
        ->private()
        ->autowire(false)
    ;

    $services->set('overblog_graphiql.view.config', \Overblog\GraphiQLBundle\Config\GraphiQLViewConfig::class)
        ->private()
        ->autowire(false)
    ;

    $services->set('overblog_graphiql.view.config.javascript_libraries', \Overblog\GraphiQLBundle\Config\GraphiQLViewJavaScriptLibraries::class)
        ->private()
        ->autowire(false)
    ;

    $services->set('overblog_graphiql.controller', \Overblog\GraphiQLBundle\Controller\GraphiQLController::class)
        ->public()
        ->autowire(false)
        ->args([
            service('twig'),
            service('overblog_graphiql.view.config'),
            service('overblog_graphiql.controller.graphql.endpoint'),
        ])
    ;

    $services->alias(\Overblog\GraphiQLBundle\Controller\GraphiQLController::class, 'overblog_graphiql.controller')
        ->public()
    ;
};