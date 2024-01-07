<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Campaigns Controller
 *
 * @property \App\Model\Table\CampaignsTable $Campaigns
 */
class CampaignsController extends AppController
{
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {        
        $campaign = $this->Campaigns->newEmptyEntity();
        $this->Authorization->authorize($campaign);
        if ($this->request->is('post')) {
            $campaign = $this->Campaigns->patchEntity($campaign, $this->request->getData());
            if ($this->Campaigns->save($campaign)) {
                $this->Flash->success(__('The campaign has been saved.'));

                return $this->redirect(['controller' => 'scenes', 'action' => 'add', $campaign->id]);
            }
            $this->Flash->error(__('The campaign could not be saved. Please, try again.'));
        }
        $users = $this->Campaigns->Users->find('list', limit: 200)->all();
        $user = $this->Authentication->getIdentity();
        $this->set(compact('campaign', 'users', 'user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Campaign id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

     
    public function edit($id = null)
    {
        if ($this->request->is('ajax')) {
            $id = $this->request->getData("id");
            $campaign = $this->Campaigns->get($id, contain: []);
            $this->Authorization->authorize($campaign);
            $campaign->name = $this->request->getData("name");
            if ($this->Campaigns->save($campaign)) {
                echo json_encode(array("status" => "success")); 
                exit;
            } else {
                echo json_encode(array("status" => "error")); 
                exit;
            }
        }
    }
    /*
    public function edit($id = null)
    {
        $campaign = $this->Campaigns->get($id, contain: []);
        $this->Authorization->authorize($campaign);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $campaign = $this->Campaigns->patchEntity($campaign, $this->request->getData());
            if ($this->Campaigns->save($campaign)) {
                $this->Flash->success(__('The campaign has been saved.'));

                return $this->redirect(['action' => 'index', $campaign->id]);
            }
            $this->Flash->error(__('The campaign could not be saved. Please, try again.'));
        }
        $users = $this->Campaigns->Users->find('list', limit: 200)->all();
        $this->set(compact('campaign', 'users'));
    }
*/
    /**
     * Delete method
     *
     * @param string|null $id Campaign id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['get', 'post', 'delete']);
        $campaign = $this->Campaigns->get($id);
        $this->Authorization->authorize($campaign);
        if ($this->Campaigns->delete($campaign)) {
            $this->Flash->success(__('The campaign has been deleted.'));
        } else {
            $this->Flash->error(__('The campaign could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'users', 'action' => 'view', $campaign->user_id]);
    }


    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
          
    }

}
