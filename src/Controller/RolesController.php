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
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class RolesController extends AppController
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
    public function all(){
        if($this->request->is('ajax')){
            if($this->request->is('get')){
                $roles = $this->Roles->find();

                $this->RequestHandler->renderAs($this,'json');
                $this->set(compact('roles'));
                $this->set('_serialize',['roles']);
            }
        }
    }
    public function view(){}


}
