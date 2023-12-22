<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Scenes Controller
 *
 * @property \App\Model\Table\ScenesTable $Scenes
 */
class ScenesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $query = $this->Scenes->find()
            ->contain(['Campaigns']);
        $scenes = $this->paginate($query);

        $this->set(compact('scenes'));
    }

    /**
     * View method
     *
     * @param string|null $id Scene id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $scene = $this->Scenes->get($id, contain: ['Campaigns', 'Blocks' => ['sort' => ['pos' => 'ASC']]]);
        $this->Authorization->authorize($scene);
        $this->set(compact('scene'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $scene = $this->Scenes->newEmptyEntity();
        $this->Authorization->authorize($scene);
        if ($this->request->is('post')) {
            $scene = $this->Scenes->patchEntity($scene, $this->request->getData());
            if ($this->Scenes->save($scene)) {
                $campaignstable = $this->fetchTable('Campaigns');
                $campaign = $campaignstable->get($scene->campaign_id);
                $campaignstable->touch($campaign);
                $campaignstable->save($campaign);
                $this->Flash->success(__('The scene has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scene could not be saved. Please, try again.'));
        }
        $campaigns = $this->Scenes->Campaigns->find('list', limit: 200)->all();
        $this->set(compact('scene', 'campaigns'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Scene id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $scene = $this->Scenes->get($id, contain: []);
        $this->Authorization->authorize($scene);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $scene = $this->Scenes->patchEntity($scene, $this->request->getData());
            if ($this->Scenes->save($scene)) {
                $campaignstable = $this->fetchTable('Campaigns');
                $campaign = $campaignstable->get($scene->campaign_id);
                $campaignstable->touch($campaign);
                $campaignstable->save($campaign);
                $this->Flash->success(__('The scene has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scene could not be saved. Please, try again.'));
        }
        $campaigns = $this->Scenes->Campaigns->find('list', limit: 200)->all();
        $this->set(compact('scene', 'campaigns'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Scene id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $scene = $this->Scenes->get($id);
        $this->Authorization->authorize($scene);
        if ($this->Scenes->delete($scene)) {
            $this->Flash->success(__('The scene has been deleted.'));
        } else {
            $this->Flash->error(__('The scene could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
