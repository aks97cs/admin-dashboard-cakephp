<?php
namespace App\Controller;

use App\Controller\AppController;
   use ReflectionClass;
use ReflectionMethod;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 *
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */


    public $paginate = [
        'limit' => 8,
        'order' => [
            'Users.roles' => 'asc'
        ]
    ];
    public function index()
    {
        $roles = $this->paginate($this->Roles);

        $this->set(compact('roles'));
          $user = $this->Auth->user();
        $xxx = $user['username'];
        //pr($user);die();
        $this->set('y',$xxx);

        $this->set('img_name',$user['img']);
        $this->set('userRoles',$user['roles']);
    }

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => []
        ]);

        $this->set('role', $role);

          $user = $this->Auth->user();
        $xxx = $user['username'];
        //pr($user);die();
        $this->set('y',$xxx);

        $this->set('img_name',$user['img']);
        $this->set('userRoles',$user['roles']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $role = $this->Roles->newEntity();
        if ($this->request->is('post')) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $this->set(compact('role'));

          $user = $this->Auth->user();
        $xxx = $user['username'];
        //pr($user);die();
        $this->set('y',$xxx);

        $this->set('img_name',$user['img']);
        $this->set('userRoles',$user['roles']);




        
    $files = scandir('../src/Controller/');
    $results = [];
    $ignoreList = [
        '.', 
        '..', 
        'Component', 
        'AppController.php',
    ];
    foreach($files as $file){
        if(!in_array($file, $ignoreList)) {
            $controller = explode('.', $file)[0];

            //array_push($results,$controller=>$controller);
            $x = str_replace('Controller', '', $controller);
            $results[$x]=str_replace('Controller', '', $controller);


            // array_push($results, str_replace('Controller', '', $controller));
        }            

    }

    $this->set('xyz',$results);
            $controllerName =  'Users';
            //echo $controllerName;
            //die();


     $className = 'App\\Controller\\'.$controllerName.'Controller';
    $class = new ReflectionClass($className);
    $actions = $class->getMethods(ReflectionMethod::IS_PUBLIC);
    $results1 = [];
    $ignoreList = ['beforeFilter', 'afterFilter', 'initialize'];
    foreach($actions as $action)
    {
        if($action->class == $className && !in_array($action->name, $ignoreList))
        {
            //array_push($results1[$controllerName], $action->name);
            $results1[$action->name]=$action->name;

        }   
    }
    $this->set('www',$results1);
    }

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $this->set(compact('role'));

          $user = $this->Auth->user();
        $xxx = $user['username'];
        //pr($user);die();
        $this->set('y',$xxx);

        $this->set('img_name',$user['img']);
        $this->set('userRoles',$user['roles']);




    $files = scandir('../src/Controller/');
    $results = [];
    $ignoreList = [
        '.', 
        '..', 
        'Component', 
        'AppController.php',
    ];
    foreach($files as $file){
        if(!in_array($file, $ignoreList)) {
            $controller = explode('.', $file)[0];

            //array_push($results,$controller=>$controller);
            $x = str_replace('Controller', '', $controller);
            $results[$x]=str_replace('Controller', '', $controller);


            // array_push($results, str_replace('Controller', '', $controller));
        }            

    }

    $this->set('xyz',$results);
            $controllerName =  $this->request->getParam('controller');


     $className = 'App\\Controller\\'.$controllerName.'Controller';
    $class = new ReflectionClass($className);
    $actions = $class->getMethods(ReflectionMethod::IS_PUBLIC);
    $results1 = [];
    $ignoreList = ['beforeFilter', 'afterFilter', 'initialize'];
    foreach($actions as $action)
    {
        if($action->class == $className && !in_array($action->name, $ignoreList))
        {
            //array_push($results1[$controllerName], $action->name);
            $results1[$action->name]=$action->name;

        }   
    }
    $this->set('www',$results1);

    }

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $role = $this->Roles->get($id);
        if ($this->Roles->delete($role)) {
            $this->Flash->success(__('The role has been deleted.'));
        } else {
            $this->Flash->error(__('The role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);

          $user = $this->Auth->user();
        $xxx = $user['username'];
        //pr($user);die();
        $this->set('y',$xxx);

        $this->set('img_name',$user['img']);
        $this->set('userRoles',$user['roles']);
    }
}
