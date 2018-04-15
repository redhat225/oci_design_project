<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\Network\Exception;
use \Exception as MainException;
use Lcobucci\JWT\Builder;
use Cake\Cache\Cache;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Cake\Utility\Security;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Text;
use Cake\View\View;


/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class ProjectsController extends AppController
{
    public function initialize(){
        parent::initialize();   
    }

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);   
    }

    public function index(){
        
    }

    public function create(){
        if($this->request->is('ajax')){
            if($this->request->is('post')){
                $data = $this->request->data;
                $data['action'] = 'create';
                $data['created_by_contributor'] = $this->request->session()->read('Auth.User.id');
                $project = $this->Projects->newEntity($data,['associated'=>['ProjectContributors','ProjectTickets']]);
                $project->creator = $data['created_by_contributor'];

                if($this->Projects->save($project)){
                    $this->RequestHandler->renderAs($this, 'json');
                    $response = ['id'=>$project->id,'criticity'=>$project->project_criticity]; 
                    $this->set(compact('response'));
                    $this->set('_serialize',['response']);
                }else
                {
                  throw new Exception\BadRequestException(__('error'));
                }
            }
        }
    }

    public function test($instance_id = null){

    }

    public function addActorReport(){
        if(!Cache::read('token','token_add_actor'))
            Cache::write('token',1,'token_add_actor');
        else
            Cache::write('token',(Cache::read('token','token_add_actor')+1),'token_add_actor');

        $token = Cache::read('token','token_add_actor');
        $this->set(compact('token'));
        $this->set('_serialize',['token']);
    }

    public function addActorReportContributors(){
        if(!Cache::read('token','token_add_actor_contributor'))
            Cache::write('token',1,'token_add_actor_contributor');
        else
            Cache::write('token',(Cache::read('token','token_add_actor_contributor')+1),'token_add_actor_contributor');

        $token = Cache::read('token','token_add_actor_contributor');
        $this->set(compact('token'));
        $this->set('_serialize',['token']);
    }


    public function edit(){}

    public function view(){
        if($this->request->is('ajax')){
            if($this->request->is('get')){
            }
        }
    }

    public function get(){
        if($this->request->is('ajax')){
            if($this->request->is('get')){
                $query_data = $this->request->query;
                $project = $this->Projects->get($query_data['id'],['contain'=>['ProjectContributors.UserAccounts.Users','ProjectContributors.ProjectContributorRoles']]);

                $this->RequestHandler->renderAs($this, 'json');
                $this->set(compact('project'));
                $this->set('_serialize',['project']);
            }
        }
    }

    public function ticket(){
        $this->viewBuilder()->layout('blank');
    }

    public function preview($project_id = null){
        $id = $this->request->params['project_id'];

        $project = $this->Projects->get($id,['contain'=>['ProjectContributors.ProjectContributorRoles','ProjectContributors.UserAccounts.Users','ProjectTypes']]);
        $project->project_indices = json_decode($project->project_indices);
            // Crypto options
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'protect' => true,
                    'userPassword' =>  'orange',
                    'ownerPassword' => 'RiehlEmmanuel00',
                    'permissions' => []
                ]
            ]);

            // Load creator infos
            $this->loadModel('UserAccounts');
            $creator = $this->UserAccounts->get($project->user_account_id,['contain'=>['Users']]);
            $title = 'Ticket Projet';
            $this->set(compact('project','creator','title'));
            $this->set('_serialize',['project','creator','title']);
    }

    public function all(){
        if($this->request->is('ajax')){
            if($this->request->is('get')){
                $projects = $this->Projects->find()->contain(['UserAccounts.Users','ProjectTypes','ProjectContributors.UserAccounts.Users','ProjectContributors.ProjectContributorRoles','ProjectTickets' => function($query){
                      return $query->order(['ProjectTickets.created'=>'desc']);
                },'ProjectSecuritySheets' => function($query){
                     return $query->order(['ProjectSecuritySheets.created'=>'desc']);
                },'ProjectSecurityRequirements' => function($query){
                     return $query->order(['ProjectSecurityRequirements.created'=>'desc']);
                }, 'ProjectSecurityAuditRequirements' => function($query){
                     return $query->order(['ProjectSecurityAuditRequirements.created'=>'desc']);
                }, 'ProjectAssets' => function($query){
                    return $query->order(['ProjectAssets.created' => 'desc']);
                }, 'ProjectAssets.UserAccounts.Users'])->order(['Projects.created'=>'desc']);

                foreach ($projects as $key => $value) {
                    $value->project_indices = json_decode($value->project_indices);
                }

                $this->RequestHandler->renderAs($this, 'json');
                $this->set(compact('projects'));
                $this->set('_serialize',['projects']);
            }
        }
    }


}
