<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::extensions(['json', 'xml']);
$routes->connect('/', ['controller' => 'Admins', 'action' => 'home']);


Router::scope('/admins', function (RouteBuilder $routes) {
    $routes->connect('/home', ['controller' => 'Admins', 'action' => 'home']);
    $routes->connect('/dashboard', ['controller' => 'Admins', 'action' => 'dashboard']);
    $routes->connect('/login', ['controller' => 'Admins', 'action' => 'login']);
    $routes->connect('/logout', ['controller' => 'Admins', 'action' => 'logout']);

    //projects spa
    $routes->connect('/projects', ['controller' => 'Admins', 'action' => 'index']);
    $routes->connect('/projects/create', ['controller' => 'Admins', 'action' => 'index']);
    // projects sheets spa
    $routes->connect('/project-sheets', ['controller' => 'Admins', 'action' => 'index']);
    $routes->connect('/project-sheets/create', ['controller' => 'Admins', 'action' => 'index']);


});

Router::scope('/project-contributor-roles', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'ProjectContributorRoles', 'action' => 'index']);
    $routes->connect('/all', ['controller' => 'ProjectContributorRoles', 'action' => 'all']);
});


Router::scope('/projects', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Projects', 'action' => 'index']);
    $routes->connect('/create', ['controller' => 'Projects', 'action' => 'create']);
    $routes->connect('/edit', ['controller' => 'Projects', 'action' => 'edit']);
    $routes->connect('/view', ['controller' => 'Projects', 'action' => 'view']);
    $routes->connect('/add-actor-report', ['controller' => 'Projects', 'action' => 'addActorReport']);
});

Router::scope('/project-types', function (RouteBuilder $routes) {
    $routes->connect('/all', ['controller' => 'ProjectTypes', 'action' => 'all']);
});

Router::scope('/users', function (RouteBuilder $routes) {
    $routes->connect('/all', ['controller' => 'Users', 'action' => 'all']);
});

Router::scope('/project-sheets', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'ProjectSheets', 'action' => 'index']);
    $routes->connect('/create', ['controller' => 'ProjectSheets', 'action' => 'create']);
    $routes->connect('/view', ['controller' => 'ProjectSheets', 'action' => 'view']);
    $routes->connect('/edit', ['controller' => 'ProjectSheets', 'action' => 'edit']);
});

/**
 * Load all plugin routes. See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
