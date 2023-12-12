<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Adventurelists Controller
 *
 * @property \App\Model\Table\AdventurelistsTable $Adventurelists
 */
class AdventurelistsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Adventurelists->find()
            ->contain(['Campaigns']);
        $adventurelists = $this->paginate($query);

        $this->set(compact('adventurelists'));
    }

    /**
     * View method
     *
     * @param string|null $id Adventurelist id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adventurelist = $this->Adventurelists->get($id, contain: ['Campaigns']);
        $this->set(compact('adventurelist'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adventurelist = $this->Adventurelists->newEmptyEntity();
        if ($this->request->is('post')) {
            $adventurelist = $this->Adventurelists->patchEntity($adventurelist, $this->request->getData());
            if ($this->Adventurelists->save($adventurelist)) {
                $this->Flash->success(__('The adventurelist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adventurelist could not be saved. Please, try again.'));
        }
        $campaigns = $this->Adventurelists->Campaigns->find('list', limit: 200)->all();
        $this->set(compact('adventurelist', 'campaigns'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Adventurelist id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adventurelist = $this->Adventurelists->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adventurelist = $this->Adventurelists->patchEntity($adventurelist, $this->request->getData());
            if ($this->Adventurelists->save($adventurelist)) {
                $this->Flash->success(__('The adventurelist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adventurelist could not be saved. Please, try again.'));
        }
        $campaigns = $this->Adventurelists->Campaigns->find('list', limit: 200)->all();
        $this->set(compact('adventurelist', 'campaigns'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Adventurelist id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adventurelist = $this->Adventurelists->get($id);
        if ($this->Adventurelists->delete($adventurelist)) {
            $this->Flash->success(__('The adventurelist has been deleted.'));
        } else {
            $this->Flash->error(__('The adventurelist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
