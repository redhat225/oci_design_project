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
			}
		}
	}]).factory('roleService',['$http','$q', function($http, $q){
		return{
			all: function(){
				return $http.get('/project-contributor-roles/all').then(function(resp){
					return resp;
				}, function(err){
					return $q.reject();
				});
			}
		}
	}]).factory('userService',['$http','$q', function($http, $q){
		return{
			all: function(){
				return $http.get('/users/all').then(function(resp){
					return resp;
				}, function(err){
					return $q.reject(err);
				});
			}
		}
	}])