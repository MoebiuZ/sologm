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
    public function add($campaign_id)
    {
        $scene = $this->Scenes->newEmptyEntity();
        $this->Authorization->authorize($scene);
        if ($this->request->is('post')) {
            $query = $this->Scenes->find('all',['conditions' => ['campaign_id' => $campaign_id]]);
            $maxpos = $query->select(['maxpos' => $query->func()->max('pos')])->first()->maxpos;
            // TODO: FIX POS
            debug($maxpos);
            $scene = $this->Scenes->patchEntity($scene, $this->request->getData());

            if ($maxpos == null) {
                $maxpos = 0;
            }

            $scene->pos = $maxpos + 1;
            $scene->campaign_id = $campaign_id;

            if ($this->Scenes->save($scene)) {
                $campaignstable = $this->fetchTable('Campaigns');
                $campaign = $campaignstable->get($scene->campaign_id);
                $campaign->current_chaos = $scene->chaos;
                $campaignstable->save($campaign);
                $this->Flash->success(__('The scene has been saved.'));

                return $this->redirect(['action' => 'view', $scene->id]);
            }
            $this->Flash->error(__('The scene could not be saved. Please, try again.'));
        }
        //$campaign = $this->Scenes->Campaigns->find('list', limit: 200)->where(['campaignid' => $campaign_id]);
        $campaign = $scenes = $this->fetchtable("Campaigns")->get($campaign_id);
        $this->set(compact('scene', 'campaign'));
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
        $this->request->allowMethod(['get', 'post', 'delete']);
        $scene = $this->Scenes->get($id);
        $this->Authorization->authorize($scene);
        if ($this->Scenes->delete($scene)) {
            $this->Flash->success(__('The scene has been deleted.'));
        } else {
            $this->Flash->error(__('The scene could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'users', 'action' => 'view', $this->request->getAttribute('identity')->id]);
    }
}
