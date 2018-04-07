angular.module('oci_directives',[])
.directive('actorAddItemDirective', function(){
    return {
        templateUrl: '/projects/add-actor-report',
        link: function(scope, el, attrs){
            scope.destroy_actor_item= function(item_id,item_ref){
            	if(scope.sheet.project_contacts)
            	{
	            	if(scope.sheet.project_contacts[item_ref])
            	     delete scope.sheet.project_contacts[item_ref];
            	}
	            scope.$destroy();
	            angular.element(item_id).remove();
            }

        }
    }
}).directive('actorAddItemDirectiveContributors', function(){
    return {
        templateUrl: '/projects/add-actor-report-contributors',
        link: function(scope, el, attrs){
            scope.destroy_actor_item= function(item_id,item_ref){
                if(scope.project.project_contacts)
                {
                    if(scope.project.project_contacts[item_ref])
                     delete scope.project.project_contacts[item_ref];
                }
                scope.$destroy();
                angular.element(item_id).remove();
            }

        }
    }
})