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


    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('MythicGM');
    }

    public function viewClasses(): array
    {
        return [JsonView::class];
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
            $block->blocktype = $this->request->getData("blocktype");
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
        if ($this->request->is('ajax')) {
            $id = $this->request->getData("id");
            $block = $this->Blocks->get($id);
            $this->Authorization->authorize($block);
            if ($this->Blocks->delete($block)) {
                echo json_encode(array("status" => "success")); 
                exit;
            } else {
                echo json_encode(array("status" => "error")); 
                exit;
            }
        }
    }



    public function fateroll() 
    {
        // TODO: Check if odds and scene_id are present

        if ($this->request->is('ajax')) {
            $block = $this->Blocks->newEmptyEntity();
            $this->Authorization->authorize($block);
            $query = $this->Blocks->find('all');
            $maxpos = $query->select(['maxpos' => $query->func()->max('pos')])->first()->maxpos;
            
            if ($maxpos = null) {
                $maxpos = 0;
            }

            
            $block->scene_id = $this->request->getData("scene_id");
            $block->blocktype = 'fate';
            $block->pos = $maxpos + 1;

            $scenestable = $this->fetchTable('Scenes');
            $scene = $scenestable->get($block->scene_id);

            $odds = $this->request->getData("odds");
            $question = $this->request->getData("question");
            $fate = $this->MythicGM->fateRoll($odds, $scene->chaos);
            $answer = $fate['answer'];
            $random_event = $fate['random_event'];

            $block->content = json_encode(['question' => $question, 'odds' => $odds, 'answer' => $answer, 'random_event' => $random_event]);

            if ($this->Blocks->save($block)) {

                $scenestable->touch($scene);
                $scenestable->save($scene);
                echo json_encode(["status" => "success", "block_id" => $block->id, 'answer' => $answer, 'random_event' => $random_event]);
                exit;
            } else {
                echo json_encode(array("status" => "error")); 
                exit;
            }
        }
    }

    public function randomevent() {
        if ($this->request->is('ajax')) {
            $block = $this->Blocks->newEmptyEntity();
            $this->Authorization->authorize($block);
            $query = $this->Blocks->find('all');
            $maxpos = $query->select(['maxpos' => $query->func()->max('pos')])->first()->maxpos;
            
            if ($maxpos = null) {
                $maxpos = 0;
            }
            
            $block->scene_id = $this->request->getData("scene_id");
            $block->blocktype = 'eventfocus';
            $block->pos = $maxpos + 1;

            $scenestable = $this->fetchTable('Scenes');
            $scene = $scenestable->get($block->scene_id);
 
            $eventfocus = $this->MythicGM->randomEvent();
            
            $block->content = json_encode(['eventfocus' => $eventfocus]);

            if ($this->Blocks->save($block)) {
                $scenestable->touch($scene);
                $scenestable->save($scene);
                echo json_encode(["status" => "success", "block_id" => $block->id, 'eventfocus' => $eventfocus]);
                exit;
            } else {
                echo json_encode(array("status" => "error")); 
                exit;
            }
        }
    }

}
