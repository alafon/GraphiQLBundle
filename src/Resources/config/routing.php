<?php

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
use Symfony\Component\Routing\Loader\XmlFileLoader;

return function (RoutingConfigurator $routes): void {
    foreach (debug_backtrace() as $trace) {
        if (isset($trace['object']) && $trace['object'] instanceof XmlFileLoader && 'doImport' === $trace['function']) {
            if (__DIR__ === dirname(realpath($trace['args'][3]))) {
                trigger_deprecation('symfony/routing', '7.3', 'The "routing.xml" routing configuration file is deprecated, import "routing.php" instead.');

                break;
            }
        }
    }

    $routes->add('overblog_graphiql_endpoint', '/graphiql')
        ->controller('overblog_graphiql.controller::indexAction')
    ;

    $routes->add('overblog_graphiql_endpoint_multiple', '/graphiql/{schemaName}')
        ->controller('overblog_graphiql.controller::indexAction')
    ;
};