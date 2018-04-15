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
class ProjectAssetsController extends AppController
{
    public function initialize(){
        parent::initialize();  
    }

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);   
    }

    public function index(){
        
    }

    public function upload(){
        if($this->request->is('ajax')){
            if($this->request->is('post')){
                $data = $this->request->data;
                $data['action'] = 'create';
                $data['project_asset']['asset_type'] = $data['project_asset']['asset']['type'];
                $data['project_asset']['asset_name'] = $data['project_asset']['asset']['name'];
                $data['project_asset']['asset_base64'] = chunk_split(base64_encode(file_get_contents($data['project_asset']['asset']['tmp_name'])));

                $project_asset = $this->ProjectAssets->newEntity($data['project_asset']);
                $project_asset->creator = $this->request->session()->read('Auth.User.id');
                $project_asset->created_by = $this->request->session()->read('Auth.User.id');
                if(!$project_asset->errors()){
                        if($this->ProjectAssets->save($project_asset)){
                            $this->RequestHandler->renderAs($this, 'json');
                            $response = ['message' => 'ok'];
                            $this->set(compact('response'));
                            $this->set('_serialize',['response']);
                        }else
                             throw new Exception\BadRequestException(__('bad request save project asset'));
                }else
                  throw new Exception\BadRequestException(__('bad request file size'));

            }
        }
    }


}
