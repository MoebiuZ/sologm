<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Utility\Text;
use Cake\Mailer\Mailer;
use Cake\Cache\Cache;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{


    protected array $paginate = [
        'limit' => 20,
        'order' => [
            'Users.id' => 'asc',
        ],
    ];


    function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Dice');
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // TODO: Check if we can do authorization better than this
        $this->Authorization->skipAuthorization();
        $user = $this->request->getAttribute('identity');
        if ($user->role == "admin") {
            $query = $this->Users->find();
            $users = $this->paginate($query);
            $this->set(compact('users'));
        } else {
            return $this->redirect(['action' => 'view', $user->id]);
        }

    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        Cache::clear();
        $user = $this->Users->get($id, contain: ['Campaigns']);
        $this->Authorization->authorize($user);

        $scenesTable = $this->fetchTable('Scenes');
        $campaignsTable = $this->fetchTable('Campaigns');
        $last_scene = $scenesTable->find()->orderDesc('modified')->first();
        $last_campaign = $campaignsTable->find('all')->where(['id' => $last_scene->campaign_id])->first();
        
        $this->set(compact('user', 'last_scene', 'last_campaign'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   
        $user = $this->Users->newEmptyEntity();
        $this->Authorization->authorize($user);
            
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been created.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.') . $this->ValidationErrors);
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        $this->Authorization->authorize($user);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            $old_picture = "";
            if (isset($data['password'])) {
                if ($data['password'] == '') {
                    unset($data['password']);
                    unset($data['confirm_password']);
                }
            }
            if ($user['role'] != 'user') {
                unset($data['role']);
                unset($data['enabled']);
            }

            if (isset($data['email'])) {
                $data['email'] = strtolower($data['email']);
            }

            if (isset($data['profile_picture_file'])) {
                if (is_file($data['profile_picture_file']->getStream()->getMetadata('uri'))) {
                    $pictures_path = WWW_ROOT . DS . "img" . DS . "users";
                    if (!is_dir($pictures_path)) {
                        mkdir($pictures_path, 0775);
                    }

                    $newfilename = Text::uuid() . "." . pathinfo($data['profile_picture_file']->getClientFilename(), PATHINFO_EXTENSION);
                    $data['profile_picture_file']->moveTo($pictures_path . DS . $newfilename);
                                    
                    $old_picture = WWW_ROOT . DS . "img" . DS . "users" . DS . $user->profile_picture;
                    $user->profile_picture = $newfilename;
                }
            }

            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                if (is_file($old_picture)) {
                    unlink($old_picture);
                }

                $this->Authentication->setIdentity($user); // Update current identity object
                
                if (str_starts_with($data['referer'], "/users/index")) {
                    return $this->redirect(['action' => 'index', $user->id]);
                } else {
                    return $this->redirect(['action' => 'view', $user->id]);
                }
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        
        $referer = $this->request->referer();
        $this->set(compact('user', 'referer'));
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
        $this->Authorization->authorize($user);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    /**
     * Signup method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function signup()
    {
        $this->Authorization->skipAuthorization();
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $activation_nonce = Text::uuid();
            $user->activation_nonce = $activation_nonce;
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role = "user";
            $user->email = strtolower($user->email);
                       
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been created.'));

                $mailer = new Mailer(['transport' => 'mailhog']);
                $mailer->setFrom(['sologm@sologm.com' => 'Solo GM'])
                    ->setTo($user->email)
                    ->setSubject(__('Activation code'))
                    ->deliver(__('This is your activation code: ') . $activation_nonce);

                return $this->redirect(['action' => 'activate']);
            }

            foreach ($user->getErrors() as $error) {
                foreach ($error as $suberror) {
                    $this->Flash->error(__($suberror));
                }
            }
        }
        $this->set(compact('user'));
        $this->viewBuilder()->setLayout('login');
    }


    public function activate()
    {
        $this->Authorization->skipAuthorization();

        $this->request->allowMethod(['get', 'post']);

        $request = $this->request->getData('activation_nonce');

        if ($request) {
            $result = $this->Users
            ->find()
            ->where(['activation_nonce = ' => $request])
            ->all();

            if (sizeof($result) == 0) {
                $this->Flash->error(__('This activation code does not exist'));
            } else {
              
                foreach ($result as $user) {
                    $user->enabled = true;
                    $user->activation_nonce = null;
                    $this->Users->save($user);
                }

                $this->Flash->success(__('Your user was activated'));
                $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
        }

        $this->viewBuilder()->setLayout('login');
    }


    public function login()
    {
        $this->Authorization->skipAuthorization();
        
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $identity = $this->Authentication->getIdentity();

            $user = $this->Users->get($identity->id);
            $user->last_login = date('Y-m-d H:i:s');
            // To avoid modified date being updated when last_login is updated (due to TimestampBehaviour)
            $user->setDirty('modified', true);
            $this->Users->save($user);

            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'view', 
                $user->id
            ]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }

        $this->viewBuilder()->setLayout('login');
    }


    public function logout()
    {
        $this->Authorization->skipAuthorization();

        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }


    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->allowUnauthenticated(['login', 'signup', 'activate']);
           
    }

}
