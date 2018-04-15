angular.module('oci_services',[])
	.factory('project_types',['$http','$q', function($http,$q){
		return {
			all: function(){
				return $http.get('/project-types/all', function(resp){
					return resp;
				}, function(err){
					return $q.reject(err);
				});
			}
		}
	}]).factory('projects',['$http','$q', function($http, $q){
		return{
			create: function(project){
				return $http.post('/projects/create', project).then(function(resp){
					return resp;
				}, function(err){
					return $q.reject(err);
				})
			},
			all: function(){
				return $http.get('/projects/all').then(function(resp){
					return resp;
				}, function(err){
					return $q.reject(err);
				});
			},
			get: function(project_id){
				return $http.get('/projects/get',{params:{"id":project_id}}).then(function(resp){
					return resp;
				}, function(err){
					return $q.reject(err);
				});
			}
		}
	}]).factory('projectAssetServices',['$http','$q', function($http, $q){
		return{
			upload: function(project_asset){
				return $http.post('/project-assets/upload',{'project_asset':project_asset}).then(function(resp){
					return resp;
				}, function(err){
					return $q.reject(err);
				});
			}
		}
	}]).factory('roleContributorService',['$http','$q', function($http, $q){
		return{
			all: function(){
				return $http.get('/project-contributor-roles/all').then(function(resp){
					return resp;
				}, function(err){
					return $q.reject();
				});
			}
		}
	}]).factory('roleAccountService',['$http','$q', function($http, $q){
		return{
			all: function(){
				return $http.get('/roles/all').then(function(resp){
					return resp;
				}, function(err){
					return $q.reject();
				});
			}
		}
	}])
	.factory('userService',['$http','$q', function($http, $q){
		return{
			all: function(){
				return $http.get('/users/all').then(function(resp){
					return resp;
				}, function(err){
					return $q.reject(err);
				});
			}
		}
	}]).factory('projectSheets',['$http','$q', function($http, $q){
		return{
			create: function(diagram){
				return $http.post('/project-sheets/create', {project: diagram}).then(function(resp){
					return resp;
				}, function(err){
					return $q.reject(err);
				});
			},
			get: function(id){
				return $http.get('/project-sheets/get',{params:{'id':id}}).then(function(resp){
					return resp;
				}, function(err){
					return $q.reject(err);
				});
			}
		}
	}]).factory('projectRequirements',['$http','$q', function($http, $q){
		return{
			get: function(id){
				return $http.get('/project-requirements/get',{params:{'id':id}}).then(function(resp){
					return resp;
				}, function(err){
					return $q.reject(err);
				});
			}
		}
	}]).factory('profileService',['$http','$q', function($http, $q){
		return{
			get: function(){
				return $http.get('/profiles/get').then(function(resp){
					return resp;
				}, function(err){
					return $q.reject(err);
				});
			},
			all: function(){
				return $http.get('/profiles/all').then(function(resp){
					return resp;
				}, function(err){
					return $q.reject(err);
				});
			},
			load: function(){
				return $http.get('/profiles/all').then(function(resp){
					return resp;
				}, function(err){
					return $q.reject(err);
				});
			}
		}
	}]).factory('AccountService',['$http','$q', function($http, $q){
		return{
			get: function(id){
				return $http.get('/accounts/get',{params:{'id':id}}).then(function(resp){
					return resp;
				}, function(err){
					return $q.reject(err);
				});
			},
			unlock: function(user_account_id){
				return $http.post('/accounts/unlock',{'id':user_account_id}).then(function(resp){
					return resp;
				}, function(err){
					return $q.reject(err);
				});
			},
			renew_password: function(user_account_id){
				return $http.post('/accounts/renew',{'id':user_account_id}).then(function(resp){
					return resp;
				}, function(err){
					return $q.reject(err);
				});	
			}
		}
	}])