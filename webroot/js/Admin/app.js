angular.module('oci',['oci_controllers','oci_services','oci_directives','ui.router','ui.tinymce','ngFileUpload','angular-loading-bar','colorbox','chart.js','angular-fullcalendar'])
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
			abstract:true,
			resolve:{
				profile:['profileService', function(profileService){
					return profileService.get().then(function(resp){
						return resp;
					}, function(err){
						toastr.error('Une erreur est survenue');
						$state.reload();
					}) 
				}]
			}
		}).state('admins.dashboard',{
			url:'dashboard',
			templateUrl:'/admins/dashboard',
			controller: 'DashController as dashctrl'
		}).state('admins.plannings',{
			url: 'plannings',
			templateUrl:'/plannings',
			abstract: true
		}).state('admins.plannings.view',{
			url: '/view',
			templateUrl:'/plannings/view',
			controller:'PlanningViewController as planviewctrl'
		}).state('admins.projects',{
			url: 'projects',
			templateUrl:'/projects',
			abstract: true
		}).state('admins.projects.view',{
			url:'/view',
			templateUrl: '/projects/view',
			controller: 'ProjectsViewController as projectviewctrl'
		}).state('admins.projects.create',{
			url:'/create',
			templateUrl: '/projects/create',
			controller:'ProjectsController as projectctrl'
		}).state('admins.projects-sheets',{
			url:'project-sheets',
			abstract: true,
			templateUrl: '/project-sheets',
		}).state('admins.projects-sheets.view',{
			url:'/view',
			templateUrl: '/project-sheets/view',
			controller:'ProjectSheetsController as projectsheetsctrl'
		}).state('admins.projects-sheets.create',{
			url:'/create/:project_id',
			templateUrl: '/project-sheets/create',
			controller:'ProjectSheetsController as projectsheetsctrl'
		}).state('admins.projects-sheets.edit',{
			url:'/edit/:project_sheet_id',
			templateUrl: '/project-sheets/edit',
			controller:'ProjectSheetsEditController as projectsheetseditctrl'
		}).state('admins.projects-requirements',{
			url:'project-requirements',
			abstract: true,
			templateUrl: '/project-requirements',
		}).state('admins.projects-requirements.create',{
			url:'/create/:project_id',
			templateUrl: '/project-requirements/create',
			controller: 'ProjectRequirementsController as projectreqctrl'
		}).state('admins.projects-requirements.edit',{
			url:'/edit/:project_requirement_id',
			templateUrl: '/project-requirements/edit',
			controller: 'ProjectRequirementsEditController as projectreqeditctrl'
		}).state('admins.projects-audits-requirements',{
			url:'project-audit-requirements',
			abstract: true,
			templateUrl: '/project-audit-requirements',
		}).state('admins.projects-audits-requirements.create',{
			url:'/create/:project_id',
			templateUrl: '/project-audit-requirements/create',
			controller: 'ProjectAuditRequirementsController as projectauditreqctrl'
		}).state('admins.projects-audits-requirements.edit',{
			url:'/edit/:project_requirement_id',
			templateUrl: '/project-audit-requirements/edit',
			controller: 'ProjectAuditRequirementsEditController as proauditjectreqeditctrl'
		}).state('admins.accounts',{
			url:'accounts',
			templateUrl: '/accounts',
			abstract: true
		}).state('admins.accounts.view',{
			url:'/view',
			templateUrl:'/accounts/view',
			controller:'AccountsViewController as accountsviewctrl'
		}).state('admins.accounts.create',{
			url:'/create',
			templateUrl:'/accounts/create',
			controller:'AccountsController as accountsctrl'
		}).state('admins.accounts.edit',{
			url:'/edit/:user_id',
			templateUrl:'/accounts/edit',
			controller:'AccountsEditController as accountseditctrl'
		}).state('admins.profile',{
			url: 'profiles',
			templateUrl:'/profiles',
			abstract:true
		})
		.state('admins.profile.edit',{
			url:'/edit',
			templateUrl:'/profiles/edit',
			controller:'ProfilesEditController as profileseditctrl'
		});

		$urlRouterProvider.otherwise('/dashboard');
	}])