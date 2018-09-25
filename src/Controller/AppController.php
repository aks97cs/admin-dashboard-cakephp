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

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;  

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth',[

            'authorize' => ['Controller'],
            'loginRedirect' => [

                'controller'=>'Users',
                'action'   => 'index'
            ],
            'logoutRedirect' => [

                'controller' => 'Users',
                'action' => 'login'
            ]

        ]);
        //$this->loadComponent('Auth');
         $this->Auth->allow(['add']);
       
       // die();

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }
    // public function beforeFilter(Event $event)
    // {
    //     $this->Auth->allow(['add','index']);
    //     $this->set('username',$this->Auth->user('username'));
    // }


    public function isAuthorized($user)
    {
        $match =  $this->request->getParam('action');
        $control = $this->request->getParam('controller');
        //echo "<br>".$control."<br>";
        //die();
        $user_role =  $user['roles'];
      // die();
       
       $connection = ConnectionManager::get('default');
       // $result = $connection->execute("select action from roles where roles ='".$user_role."'"." && action ='".$match."'"."&& controller = '".$control."'");

       $result = $connection->execute("select action from roles where roles = ? && action = ? && controller = ? ", [$user_role,$match,$control]);

       //pr($result);
       //die();
        // $result  = array();
       foreach($result as $row)
       {
           // $flag =1;
            return true;
       }

       
      // die();
        //$this->Auth-deny('index');
       // return true; // feth data from database and then deny the required action.
    }
}
