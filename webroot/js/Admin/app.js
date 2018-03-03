angular.module('oci',['oci_controllers','oci_services','oci_directives','ui.router','ui.tinymce','ngFileUpload','angular-loading-bar','colorbox','chart.js'])
	.run(['$rootScope','$templateCache','$transitions', function($rootScope, $templateCache,$transitions){
		
		$transitions.onStart({to:'admins.**'},function(trans){
			$rootScope.preloader = true;
		});	
		$transitions.onSuccess({to:'admins.**'},function(trans){
			$rootScope.preloader = false;
			$templateCache.removeAll();
		});	
	}])
	.config(['$httpProvider','$stateProvider','$urlRouterProvider','$locationProvider', function($httpProvider, $stateProvider, $urlRouterProvider, $locationProvider){
		$httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
		$httpProvider.defaults.headers.common['Authorization'] = 'bearer '+localStorage.getItem('token');

		// Activate Html5 Mode + hashPrefix
		$locationProvider.html5Mode(true);
		$locationProvider.hashPrefix('!');

		// Routing 
		$stateProvider.state('admins',{
			url:'/',
			templateUrl: '/admins/home',
			controller: 'AdminsController as adminscontroller',
			abstract:true
		}).state('admins.dashboard',{
			url:'dashboard',
			templateUrl:'/admins/dashboard',
			controller: 'DashController as dashctrl'
		}).state('admins.projects',{
			url: 'projects',
			templateUrl:'/projects',
			controller: 'ProjectsController as projectctrl',
			abstract: true
		}).state('admins.projects.view',{
			url:'/view',
			templateUrl: '/projects/view',
			controller: 'ProjectsController as projectctrl'
		}).state('admins.projects.create',{
			url:'/create',
			templateUrl: '/projects/create',
			controller:'ProjectsController as projectctrl'
		}).state('admins.projects-sheets',{
			url:'project-sheets',
			abstract: true,
			templateUrl: '/project-sheets',
			controller:'ProjectSheetsController as projectsheetctrl'
		}).state('admins.projects-sheets.view',{
			url:'/view',
			templateUrl: '/project-sheets/view',
			controller:'ProjectSheetsController as projectsheetsctrl'
		}).state('admins.projects-sheets.create',{
			url:'/create',
			templateUrl: '/project-sheets/create',
			controller:'ProjectSheetsController as projectsheetsctrl'
		})

		$urlRouterProvider.otherwise('/dashboard');
	}])