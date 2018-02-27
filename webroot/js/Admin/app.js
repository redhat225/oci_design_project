angular.module('oci',['oci_controllers','oci_services','ui.router','ui.tinymce','ngFileUpload','angular-loading-bar','colorbox','chart.js'])
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
		$httpProvider.defaults.headers.common['Authorization'] = 'bearer '+localStorage.getItem('jwt_generated');

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
			controlelr:'ProjectsController as projectctrl'
		})

		$urlRouterProvider.otherwise('/dashboard');
	}])