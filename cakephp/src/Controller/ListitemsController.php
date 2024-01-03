<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\View\JsonView;

/**
 * Listitems Controller
 *
 * @property \App\Model\Table\ListitemsTable $Listitems
 */
class ListitemsController extends AppController
{

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
            $listitem = $this->Listitems->newEmptyEntity();
            $this->Authorization->authorize($listitem);
            
            $listitem->campaign_id = $this->request->getData("campaign_id");
            $listitem->content = $this->request->getData("content");
            $listitem->list_type = $this->request->getData("list_type");
            

            if ($this->Listitems->save($listitem)) {
                $campaignstable = $this->fetchTable('Campaigns');
                $campaign = $campaignstable->get($listitem->campaign_id);
                $campaignstable->touch($campaign);
                $campaignstable->save($campaign);
                echo json_encode(["status" => "success", "listitem_id" => $listitem->id]);
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
            $listitem = $this->Listitems->get($id, contain: []);
            $this->Authorization->authorize($listitem);
            $listitem->content = $this->request->getData("content");
            if ($this->Listitems->save($listitem)) {
                $campaignstable = $this->fetchTable('Campaign');
                $campaign = $campaignstable->get($listitem->campaign_id);
                $campaignstable->touch($campaign);
                $campaignstable->save($campaign);
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
            $listitem = $this->Listitems->get($id);
            $this->Authorization->authorize($listitem);
            if ($this->Listitems->delete($listitem)) {
                echo json_encode(array("status" => "success")); 
                exit;
            } else {
                echo json_encode(array("status" => "error")); 
                exit;
            }
        }
    }

}
