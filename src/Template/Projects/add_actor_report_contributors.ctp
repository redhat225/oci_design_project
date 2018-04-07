			<div class="field is-horizontal is-mar-bot-30" id="additional_actor_<?= $token ?>">

				<div class="field-label">
					<label for="" class="label">
						Contact
					</label>
				</div>

				<div class="field-body">
					<!-- Actor name -->
					<div class="field">
						<div class="control">
							<div class="select">
							  <select required ng-options="c.user_fullname for c in users" ng-model="project.project_contact<?= $token  ?>.contact"></select>
							</div>

							<div class="select">
							  <select required ng-options="r.role_denomination for r in roles" ng-model="project.project_contact<?= $token  ?>.role"></select>
							</div>
						</div>
					</div>
					<!-- remove add actor report area -->
					<div class="field">
						<div class="control">
							<button class="button is-danger is-outlined" ng-click="destroy_actor_item('#additional_actor_<?= $token ?>','project_contact<?= $token ?>')">
								<span class="icon">
									<i class="fas fa-times"></i>
								</span>
								<span>Effacer</span>
							</button>
						</div>
					</div>
				</div>
			</div>