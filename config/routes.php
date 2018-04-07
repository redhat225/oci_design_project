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

Router::extensions(['json','xml','pdf']);
$routes->connect('/', ['controller' => 'Admins', 'action' => 'home']);


Router::scope('/admins', function (RouteBuilder $routes) {
    $routes->connect('/home', ['controller' => 'Admins', 'action' => 'home']);
    $routes->connect('/dashboard', ['controller' => 'Admins', 'action' => 'dashboard']);
    $routes->connect('/login', ['controller' => 'Admins', 'action' => 'login']);
    $routes->connect('/logout', ['controller' => 'Admins', 'action' => 'logout']);
    $routes->connect('/tour', ['controller' => 'Admins', 'action' => 'tour']);

    //projects spa
    $routes->connect('/projects', ['controller' => 'Admins', 'action' => 'index']);
    $routes->connect('/projects/view', ['controller' => 'Admins', 'action' => 'index']);
    $routes->connect('/projects/create', ['controller' => 'Admins', 'action' => 'index']);
    // projects sheets spa
    $routes->connect('/project-sheets', ['controller' => 'Admins', 'action' => 'index']);
    $routes->connect('/project-sheets/create/:project_id', ['controller' => 'Admins', 'action' => 'index']);
    $routes->connect('/project-sheets/edit/:security_sheet_id', ['controller' => 'Admins', 'action' => 'index']);
    // project sheet requirements
    $routes->connect('/project-requirements/create/:project_id', ['controller' => 'Admins', 'action' => 'index']);
    $routes->connect('/project-requirements/edit/:project_id', ['controller' => 'Admins', 'action' => 'index']);
    // Project sheet audit requirement
    $routes->connect('/project-audit-requirements/create/:project_id', ['controller' => 'Admins', 'action' => 'index']);
    
    // accounts spa
    $routes->connect('/accounts', ['controller' => 'Admins', 'action' => 'index']);
    $routes->connect('/accounts/view', ['controller' => 'Admins', 'action' => 'index']);
    $routes->connect('/accounts/create', ['controller' => 'Admins', 'action' => 'index']);
    $routes->connect('/accounts/edit/:user_id', ['controller' => 'Admins', 'action' => 'index']);
    // profiles spa
    $routes->connect('/profiles/edit', ['controller' => 'Admins', 'action' => 'index']);

    // planning spa
    $routes->connect('/plannings', ['controller' => 'Admins', 'action' => 'index']);
    $routes->connect('/plannings/view', ['controller' => 'Admins', 'action' => 'index']);
});


Router::scope('/accounts', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Accounts', 'action' => 'index']);
    $routes->connect('/view', ['controller' => 'Accounts', 'action' => 'view']);
    $routes->connect('/create', ['controller' => 'Accounts', 'action' => 'create']);
    $routes->connect('/edit', ['controller' => 'Accounts', 'action' => 'edit']);
    $routes->connect('/get', ['controller' => 'Accounts', 'action' => 'get']);
    $routes->connect('/unlock', ['controller' => 'Accounts', 'action' => 'unlock']);
    $routes->connect('/renew', ['controller' => 'Accounts', 'action' => 'renew']);
});

Router::scope('/roles', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Roles', 'action' => 'index']);
    $routes->connect('/all', ['controller' => 'Roles', 'action' => 'all']);
    $routes->connect('/create', ['controller' => 'Roles', 'action' => 'create']);
});


Router::scope('/plannings', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Plannings', 'action' => 'index']);
    $routes->connect('/view', ['controller' => 'Plannings', 'action' => 'view']);
});


Router::scope('/project-contributor-roles', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'ProjectContributorRoles', 'action' => 'index']);
    $routes->connect('/all', ['controller' => 'ProjectContributorRoles', 'action' => 'all']);
});

Router::scope('/projects', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Projects', 'action' => 'index']);
    $routes->connect('/create', ['controller' => 'Projects', 'action' => 'create']);
    $routes->connect('/edit', ['controller' => 'Projects', 'action' => 'edit']);
    $routes->connect('/add-actor-report', ['controller' => 'Projects', 'action' => 'addActorReport']);
    $routes->connect('/view', ['controller' => 'Projects', 'action' => 'view']);
    $routes->connect('/all', ['controller' => 'Projects', 'action' => 'all']);
    $routes->connect('/get', ['controller' => 'Projects', 'action' => 'get']);
    // test purposes
    $routes->connect('/test/:filename', ['controller' => 'Projects', 'action' => 'test']);
    $routes->connect('/preview/:project_id', ['controller' => 'Projects', 'action' => 'preview']);


    $routes->connect('/add-actor-report-contributors', ['controller' => 'Projects', 'action' => 'addActorReportContributors']);
});

Router::scope('/project-types', function (RouteBuilder $routes) {
    $routes->connect('/all', ['controller' => 'ProjectTypes', 'action' => 'all']);
});

Router::scope('/users', function (RouteBuilder $routes) {
    $routes->connect('/all', ['controller' => 'Users', 'action' => 'all']);
    $routes->connect('/create', ['controller' => 'Users', 'action' => 'create']);
});

Router::scope('/profiles', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Profiles', 'action' => 'index']);
    $routes->connect('/edit', ['controller' => 'Profiles', 'action' => 'edit']);
    $routes->connect('/get', ['controller' => 'Profiles', 'action' => 'get']);
    $routes->connect('/all', ['controller' => 'Profiles', 'action' => 'all']);
});


Router::scope('/zine', function (RouteBuilder $routes) {
    $routes->connect('/read/:url', ['controller' => 'Zine', 'action' => 'read']);
});



Router::scope('/project-sheets', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'ProjectSheets', 'action' => 'index']);
    $routes->connect('/create', ['controller' => 'ProjectSheets', 'action' => 'create']);
    $routes->connect('/view', ['controller' => 'ProjectSheets', 'action' => 'view']);
    $routes->connect('/edit', ['controller' => 'ProjectSheets', 'action' => 'edit']);
    $routes->connect('/test', ['controller' => 'ProjectSheets', 'action' => 'test']);
    $routes->connect('/get', ['controller' => 'ProjectSheets', 'action' => 'get']);
    $routes->connect('/preview/:sheet_id', ['controller' => 'ProjectSheets', 'action' => 'preview']);
});

Router::scope('/project-requirements', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'ProjectRequirements', 'action' => 'index']);
    $routes->connect('/create', ['controller' => 'ProjectRequirements', 'action' => 'create']);
    $routes->connect('/edit', ['controller' => 'ProjectRequirements', 'action' => 'edit']);
    $routes->connect('/get', ['controller' => 'ProjectRequirements', 'action' => 'get']);
    $routes->connect('/preview/:requirement_id', ['controller' => 'ProjectRequirements', 'action' => 'preview']);
});

Router::scope('/project-audit-requirements', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'ProjectAuditRequirements', 'action' => 'index']);
    $routes->connect('/create', ['controller' => 'ProjectAuditRequirements', 'action' => 'create']);
    $routes->connect('/edit', ['controller' => 'ProjectAuditRequirements', 'action' => 'edit']);
    $routes->connect('/get', ['controller' => 'ProjectAuditRequirements', 'action' => 'get']);
    $routes->connect('/preview/:requirement_id', ['controller' => 'ProjectAuditRequirements', 'action' => 'preview']);
});

/**
 * Load all plugin routes. See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
