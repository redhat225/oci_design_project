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
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Cake\Utility\Security;
use Cake\Auth\DefaultPasswordHasher;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class ProjectRequirementsController extends AppController
{
    public function initialize(){
        parent::initialize();   
        $this->loadModel('ProjectSecurityRequirements');
    }

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);   
    }

    public function create(){
        if($this->request->is('ajax')){
            if($this->request->is('post')){
                $data = $this->request->data;
                $data['action'] = 'create';
                $data['created_by'] = $this->request->session()->read('Auth.User.id');
                $project_requirement = $this->ProjectSecurityRequirements->newEntity($data);
                if($this->ProjectSecurityRequirements->save($project_requirement)){
                    $response = ['message'=>'ok'];
                    $this->RequestHandler->renderAs($this, 'json');
                    $this->set(compact('response'));
                    $this->set('_serialize',['response']);
                }else
                  throw new Exception\BadRequestException(__('Error bad request'));
            }
        }
    }

    public function get(){
        if($this->request->is('ajax')){
            if($this->request->is('get')){
                $security_requirement = $this->ProjectSecurityRequirements->get($this->request->query['id'],['contain'=>['Projects']]);
                $security_requirement->requirement_content = json_decode($security_requirement->requirement_content);
                $this->RequestHandler->renderAs($this, 'json');
                $this->set(compact('security_requirement'));
                $this->set('_serialize',['security_requirement']);
            }
        }
    }

    public function edit(){

    }

    public function preview(){
        $id = $this->request->params['requirement_id'];

        $project_sheet_requirement = $this->ProjectSecurityRequirements->get($id,['contain'=>['Projects.ProjectContributors.ProjectContributorRoles','Projects.ProjectContributors.UserAccounts.Users','Projects.ProjectTypes']]);
        $project_sheet_requirement->requirement_content = json_decode($project_sheet_requirement->requirement_content);
            // Crypto options
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'protect' => true,
                    'userPassword' =>  'orange',
                    'ownerPassword' => 'RiehlEmmanuel00',
                    'permissions' => []
                ]
            ]);
            // load security-sheets time project infos
            $this->loadModel('Projects');
            $project_sheet_newer = $this->ProjectSecurityRequirements->find()->select(['created'])->where(['project_id'=>$project_sheet_requirement->project->id])->order(['created'=>'DESC'])->first();

            $project_sheet_older = $this->ProjectSecurityRequirements->find()->select(['created'])->where(['project_id'=>$project_sheet_requirement->project->id])->order(['created'=>'ASC'])->first();
            // Load creator infos
            $this->loadModel('UserAccounts');
            $creator = $this->UserAccounts->get($project_sheet_requirement->created_by,['contain'=>['Users']]);
            $title = 'Fiche Exigences Sécurité';
            $this->set(compact('project_sheet_requirement','creator','project_sheet_newer','project_sheet_older','title'));
            $this->set('_serialize',['project_sheet_requirement','creator','project_sheet_newer','project_sheet_older','title']);
    }

    public function index(){

    }

}
