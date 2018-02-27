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
	}])