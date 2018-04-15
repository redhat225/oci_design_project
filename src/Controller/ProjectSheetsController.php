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
use Cake\View\View;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Filesystem\Folder;
use Pheanstalk\Pheanstalk;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class ProjectSheetsController extends AppController
{
    public function initialize(){
        parent::initialize();   
        $this->loadModel('ProjectSecuritySheets');
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
                $data['created_by'] = $this->request->session()->read('Auth.User.id');
                $data['creator'] = $this->request->session()->read('Auth.User.id');
                $data['is_new'] = true;

                $project_sheet = $this->ProjectSecuritySheets->newEntity($data,['associated'=>['Projects']]);
                if($this->ProjectSecuritySheets->save($project_sheet)){
                    $this->RequestHandler->renderAs($this, 'json');
                    $response = 'ok';
                    $this->set(compact('response'));
                    $this->set('_serialize',['response']);
                }else{
                  throw new Exception\BadRequestException(__('error'));
                }
            }
        }
    }

    public function edit(){
        if($this->request->is('ajax')){
            if($this->request->is('post')){
                $data = $this->request->data;
                $data['action'] = 'create';
                $data['created_by'] = $this->request->session()->read('Auth.User.id');
                $data['creator'] = $this->request->session()->read('Auth.User.id');
                $data['is_new'] = false;

                $project_sheet = $this->ProjectSecuritySheets->newEntity($data,['associated'=>['Projects']]);
                if($this->ProjectSecuritySheets->save($project_sheet)){
                    $this->RequestHandler->renderAs($this, 'json');
                    $response = 'ok';
                    $this->set(compact('response'));
                    $this->set('_serialize',['response']);
                }else{
                  throw new Exception\BadRequestException(__('error'));
                }
            }
        }
    }
    public function view(){}

    public function get(){
        if($this->request->is('ajax')){
            if($this->request->is('get')){
                $security_sheet = $this->ProjectSecuritySheets->get($this->request->query['id'],['contain'=>['Projects.ProjectContributors.UserAccounts.Users']]);
                $security_sheet->sheet_content = json_decode($security_sheet->sheet_content);
                $this->RequestHandler->renderAs($this, 'json');
                $this->set(compact('security_sheet'));
                $this->set('_serialize',['security_sheet']);
            }
        }
    }

    public function preview($sheet_id = null){
        $id = $this->request->params['sheet_id'];

        $project_sheet = $this->ProjectSecuritySheets->get($id,['contain'=>['Projects.ProjectContributors.ProjectContributorRoles','Projects.ProjectContributors.UserAccounts.Users','Projects.ProjectTypes']]);
        $project_sheet->sheet_content = json_decode($project_sheet->sheet_content);
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
            $project_sheet_newer = $this->ProjectSecuritySheets->find()->select(['created'])->where(['project_id'=>$project_sheet->project->id])->order(['created'=>'DESC'])->first();

            $project_sheet_older = $this->ProjectSecuritySheets->find()->select(['created'])->where(['project_id'=>$project_sheet->project->id])->order(['created'=>'ASC'])->first();
            // Load creator infos
            $this->loadModel('UserAccounts');
            $creator = $this->UserAccounts->get($project_sheet->created_by,['contain'=>['Users']]);
$title = 'Fiche Sécurité Projet';
            $this->set(compact('project_sheet','creator','project_sheet_newer','project_sheet_older','title'));
            $this->set('_serialize',['project_sheet','creator','project_sheet_newer','project_sheet_older','title']);
    }
    public function test(){
        $this->viewBuilder()->layout('blank');
    }


}
