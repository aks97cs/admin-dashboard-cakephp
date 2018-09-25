<?php
namespace App\Controller;

use App\Controller\AppController;
 use Cake\ORM\TableRegistry;
   use Cake\Datasource\ConnectionManager;
   use Cake\Auth\DefaultPasswordHasher;
   use ReflectionClass;
use ReflectionMethod;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */


public function getControllers() 
{
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
            array_push($results, str_replace('Controller', '', $controller));
        }            
    }

    $this->set('xyz',$results);

   // return $results;
}

// public function getActions($controllerName) {
//     $className = 'App\\Controller\\'.$controllerName.'Controller';
//     $class = new ReflectionClass($className);
//     $actions = $class->getMethods(ReflectionMethod::IS_PUBLIC);
//     $results = [$controllerName => []];
//     $ignoreList = ['beforeFilter', 'afterFilter', 'initialize'];
//     foreach($actions as $action){
//         if($action->class == $className && !in_array($action->name, $ignoreList)){
//             array_push($results[$controllerName], $action->name);
//         }   
//     }
//     return $results;
// }

    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));

        // if ($this->request->session()->read('login_ok') != '1')
        // {
        //     $this->redirect(['controller' => 'users', 'action' => 'login']);
        // }
        // $query = $this->request->session()->write('User',$user);
        // $this->set('user', $query);

       // pr($user);die();

        $user = $this->Auth->user();
        $xxx = $user['username'];
        //pr($user);die();
        $this->set('y',$xxx);

        $this->set('img_name',$user['img']);
        $this->set('userRoles',$user['roles']);
    
        //$this->set('flag',$flag);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);

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

        if($this->request->is('post'))
        {






            $target_dir = "img/uploads/";
            $target_file = $target_dir . basename($_FILES["image_name"]["name"]);
            $im_name = basename($_FILES["image_name"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["image_name"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["image_name"]["size"] > 50000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["image_name"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["image_name"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }


            echo $im_name;
            $username = $this->request->data('username');
            $password = $this->request->data('password');
            //$hashPswdObj = new DefaultPasswordHasher;
            //$password = $hashPswdObj->hash($this->request->data('password'));
            $email = $this->request->data('email');
           // $img = $this->request->data('image_name');
            $city = $this->request->data('city');
            $description = $this->request->data('description');
            $roles = $this->request->data('roles');


            $users_table = TableRegistry::get('users');
            $users = $users_table->newEntity();
            $users->username = $username;
            $users->password = $password;
            $users->email    = $email;
            $users->img      = $im_name;
            $users->city     = $city;
            $users->description = $description;
            $users->roles       = $roles;
            if($users_table->save($users))
               $this->setAction('index');
            else
             $this->Flash->success(__('The user unable to save.'));


        $this->set(compact('user'));

        $user1 = $this->Auth->user();
        $xxx = $user1['username'];
        //pr($user);die();
        $this->set('y',$xxx);

        $this->set('img_name',$user1['img']);
        $this->set('userRoles',$user1['roles']);

            


       } 

    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));

        $user = $this->Auth->user();
        $xxx = $user['username'];
        //pr($user);die();
        $this->set('y',$xxx);

        $this->set('img_name',$user['img']);
        $this->set('userRoles',$user['roles']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if($this->request->is('post'))
        {
            $user = $this->Auth->identify();
            //var_dump($user); die;

            if($user)
            {
                $this->Auth->setUser($user);
                return $this->redirect(["controller"=>"Users","action"=>"index"]);
            }
            $this->Flash->error("Invalid username and password");
        }
    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function manageUser()
    {


        
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));

          $user = $this->Auth->user();
        $xxx = $user['username'];
        //pr($user);die();
        $this->set('y',$xxx);

        $this->set('img_name',$user['img']);
        $this->set('userRoles',$user['roles']);

        $connection = ConnectionManager::get('default');
        $res = $connection->execute('select * from users')->fetchall('assoc');
        $this->set('res',$res);
        $rll =  $connection->execute('select * from roles')->fetchall('assoc');
        $this->set('rll',$rll);
        if($this->request->is('post'))
        {
            $rrr = $this->request->data('roles');
            $nnn = $this->request->data('username');
            //echo $rrr;
            //echo $nnn;
            //die();
            $connection->update('users',['roles'=>$rrr],['username'=>$nnn]);
        }



       // pr($xyz);
        
    }

}
