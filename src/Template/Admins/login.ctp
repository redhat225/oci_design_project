<style>
	.loginForm input:focus{
        border-color: #C1872A;
        box-shadow: 0 0 0 0.125em rgba(193, 135, 42, 0.25);
	}
</style>



<div class="columns is-mar-bot-0" style="background: black;" ng-controller="LoginController as logincontroller">
	<div class="column is-three-fifths is-hidden-mobile is-pad-bot-0 hero is-oci-bottledgreen" >
		<div class="main-left-wrapper">
		   <?= $this->element('navlogin')?>
			<div class="main-image" style="margin-top:10%;margin-bottom:10%;">
				<img src="/img/assets/chartkit/mame_2.png" alt="vector-worker" title="orange-security-spoc" style="width:78%;">
			</div>	
		</div>

	</div>
	<div class="column is-two-fifths is-12-mobile hero is-black">
		<div class="section is-medium">
               <div class="has-text-left">
				   <h1 class="title is-size-1">Mon compte</h1>
				   <h2 class="subtitle is-size-6">Veuillez vous identifier afin d'accéder à la plateforme de gestion des projets</h2>
               </div>
               <div>
						<form ng-submit="logincontroller.login(logincontroller.credentials)" name="loginBlogForm" class="is-pad-top-40">
							<!-- Identifiant -->
							<div class="field">
							  <label class="label has-text-white">Identifiant</label>
							  <div class="loginForm control has-icons-right has-icons-left">
							    <input class="input" name='username' required ng-model="logincontroller.credentials.user_account_username" type="text" ng-minlength="6" ng-maxlength="20" placeholder="Identifiant">
								 	<span class="icon is-small is-left">
								 		<i class="fa fa-user-o" aria-hidden="true"></i>
								 	</span>
								    <span ng-if="loginBlogForm.username.$valid" class="icon is-small is-right">
								      <i class="fa fa-check has-text-success"></i>
								    </span>
							  </div>
							</div>
							<!-- Mot de passe -->
							<div class="field">
							  <label class="label has-text-white">Mot de Passe</label>
							  <div class="loginForm control has-icons-left has-icons-right">
							    <input class="input" name="password" required ng-minlength="8" ng-maxlength="20" ng-model="logincontroller.credentials.user_account_password" type="password" placeholder="Mot de passe">
							    <span class="icon is-small is-left">
							    	<i class="fa fa-lock" aria-hidden="true"></i>
							    </span>
							    <span ng-if="loginBlogForm.password.$valid" class="icon is-small is-right">
								      <i class="fa fa-check has-text-success"></i>
								</span>
							  </div>
							</div>
							
							<div class="field is-horizontal is-pad-top-40">
									<div class="field-body">
										<div class="field">
											<p class="control">
						                          <button ng-disabled="loginBlogForm.$invalid || logincontroller.is_authenticating" class="button is-fullwidth is-oci {{logincontroller.isSubmitting}}" type="submit">
						                                <span class="has-text-weight-bold">Connexion</span>
						                          </button>
											</p>
										</div>
										<div class="field">
											<p class="control">
		                   						<button class="button has-text-weight-bold is-white is-outlined is-fullwidth" ng-click="logincontroller.forgotpassword()">Mot de passe oublié</button>
											</p>
										</div>
									</div>
							</div>
						</form>
               </div>


		</div>
	</div>
</div>

