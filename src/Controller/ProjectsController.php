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
                $project = $this->Projects->newEntity($data);

                if($this->Projects->save($project)){
                    $this->RequestHandler->renderAs($this, 'json');
                    $response = $project->id;
                    $this->set(compact('response'));
                    $this->set('_serialize',['response']);
                }else
                  throw new Exception\BadRequestException(__('error'));
            }
        }
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

    public function edit(){}
    public function view(){}


}
