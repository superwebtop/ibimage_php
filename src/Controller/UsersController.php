<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Component\AuthComponent;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;
use App\Controller\Component\OptionComponent;

class UsersController extends AppController
{

    /**
     * ftp root path
     * @var string
     */
    var $ftpRootPath = '';

    /**
     * Photo root path
     * @var string
     */
    var $photoRootPath = '';

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');

        $this->ftpRootPath = $this->Option->getOption('ftp_root_path');
        $this->photoRootPath = $this->Option->getOption('ftp_root_path');
    }

    public function index()
    {
        $users = $this->Paginator->paginate($this->Users->find());
        $this->set(compact('users'));
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        //$ftp_dirs = $this->File->getDirectories($this->ftpRootPath);

        if($this->getRequest()->is('post')) {
            $user = $this->Users->patchEntity($user, $this->getRequest()->getData());
            $hashedPassworod = $this->Auth->getAuthenticate('Form')->passwordHasher()->hash($this->getRequest()->getData('password'));
            $user->set('password', $hashedPassworod);
            if($this->Users->save($user)) {
            $this->Flash->success('User has been saved');
                return $this->redirect(['action' => 'index']);
            }
            Log::Debug($user->errors());
            $this->Flash->error(__('Unable to add your article.'));
        }
        $this->set(compact('user'));


        $this->render('edit');
    }



    /**
     * Save and new user
     * @param $id
     * @return \Cake\Http\Response|null
     */
    public function edit($id)
    {
        //$ftp_dirs = $this->File->getDirectories($this->ftpRootPath);

        $user = $this->Users->findById($id)->first();
        if($this->getRequest()->is('put')) {
            $user = $this->Users->patchEntity($user, $this->getRequest()->getData());
            if($this->Users->save($user)) {
                $this->Flash->success('User has been saved');
                return $this->redirect(['action' => 'index']);
            }
            Log::Debug($user->errors());
            $this->Flash->error(__('Unable to add your article.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete users
     */
    public function del() {
        $checkedUsers = $this->getRequest()->getData('chk_users');
        $this->Users->deleteAll(['id IN' => $checkedUsers]);
        //var_dump(implode(',', $checkedUsers));
        return $this->redirect(['action' => 'index']);


    }

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
}
