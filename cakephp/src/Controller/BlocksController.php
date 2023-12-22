<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\View\JsonView;

/**
 * Blocks Controller
 *
 * @property \App\Model\Table\BlocksTable $Blocks
 */
class BlocksController extends AppController
{


    public function viewClasses(): array
    {
        return [JsonView::class];
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Blocks->find()
            ->contain(['Scenes']);
        $blocks = $this->paginate($query);

        $this->set(compact('blocks'));
    }

    /**
     * View method
     *
     * @param string|null $id Block id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $block = $this->Blocks->get($id, contain: ['Scenes']);
        $this->Authorization->authorize($block);
        $this->set(compact('block'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        if ($this->request->is('ajax')) {
            $block = $this->Blocks->newEmptyEntity();
            $this->Authorization->authorize($block);
            $query = $this->Blocks->find('all');
            $maxpos = $query->select(['maxpos' => $query->func()->max('pos')])->first()->maxpos;
            
            if ($maxpos = null) {
                $maxpos = 0;
            }

            $block->scene_id = $this->request->getData("scene_id");
            $block->content = $this->request->getData("content");
            $block->type = "text";
            $block->pos = $maxpos + 1;

            if ($this->Blocks->save($block)) {
                $scenestable = $this->fetchTable('Scenes');
                $scene = $scenestable->get($block->scene_id);
                $scenestable->touch($scene);
                $scenestable->save($scene);
                echo json_encode(["status" => "success", "block_id" => $block->id]);
                exit;
            } else {
                echo json_encode(array("status" => "error")); 
                exit;
            }
                
        }

/*
        if ($this->request->is('post')) {

            $block = $this->Blocks->patchEntity($block, $this->request->getData());
            debug($this->Blocks->save($block));
            if ($this->Blocks->save($block)) {
                $this->Flash->success(__('The block has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The block could not be saved. Please, try again.'));
        }
        $scenes = $this->Blocks->Scenes->find('list', limit: 200)->all();
        $this->set(compact('block', 'scenes'));*/
    }

    /**
     * Edit method
     *
     * @param string|null $id Block id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        if ($this->request->is('ajax')) {
            $id = $this->request->getData("id");
            $block = $this->Blocks->get($id, contain: []);
            $this->Authorization->authorize($block);
            $block->content = $this->request->getData("content");
            if ($this->Blocks->save($block)) {
                $scenestable = $this->fetchTable('Scenes');
                $scene = $scenestable->get($block->scene_id);
                $scenestable->touch($scene);
                $scenestable->save($scene);
                echo json_encode(array("status" => "success")); 
                exit;
            } else {
                echo json_encode(array("status" => "error")); 
                exit;
            }
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Block id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $block = $this->Blocks->get($id);
        if ($this->Blocks->delete($block)) {
            $this->Flash->success(__('The block has been deleted.'));
        } else {
            $this->Flash->error(__('The block could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
