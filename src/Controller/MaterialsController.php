<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Materials Controller
 *
 * @property \App\Model\Table\MaterialsTable $Materials
 */
class MaterialsController extends AppController
{
    public $paginate = [
        'limit' => 20
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Paginator');

    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MaterialTypes']
        ];
        $materials = $this->paginate($this->Materials);

        $this->set(compact('materials'));
        $this->set('_serialize', ['materials']);
    }

    /**
     * View method
     *
     * @param string|null $id Material id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $material = $this->Materials->get($id, [
            'contain' => ['MaterialTypes', 'Barracks', 'Events', 'Teams', 'UserMaterials']
        ]);

        $this->set('material', $material);
        $this->set('_serialize', ['material']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $types = $this->Materials->MaterialTypes->find('list',[
                'keyField' => 'type',
                'valueField' => 'type'
            ]
        );
        $this->set('types',$types);
    }

    public function addajax($cat = null)
    {
        $material = $this->Materials->newEntity();
        $materialTypes = $this->Materials->MaterialTypes->find('list', [
            'conditions' => [
                'type' => $this->request->data['cat']
            ]
        ]);
        $barracks = $this->Materials->Barracks->find('list', ['limit' => 200]);
        $this->set(compact('material', 'materialTypes','barracks'));
        $this->set('_serialize', ['material']);
    }

    public function saveajax()
    {
        $this->autoRender = false;
        $material = $this->Materials->newEntity();
        if ($this->request->is('post')) {
            $material = $this->Materials->patchEntity($material, $this->request->data);
            if ($this->Materials->save($material)) {
                $this->Flash->success(__('The material has been saved.'));
            } else {
                $this->Flash->error(__('The material could not be saved. Please, try again.'));
            }
        }

    }
    /**
     * Edit method
     *
     * @param string|null $id Material id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $material = $this->Materials->get($id, [
            'contain' => ['Barracks', 'Events', 'Teams']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $material = $this->Materials->patchEntity($material, $this->request->data);
            if ($this->Materials->save($material)) {
                $this->Flash->success(__('The material has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The material could not be saved. Please, try again.'));
            }
        }
        $materialTypes = $this->Materials->MaterialTypes->find('list', ['limit' => 200]);
        $barracks = $this->Materials->Barracks->find('list', ['limit' => 200]);
        $this->set(compact('material', 'materialTypes', 'barracks'));
        $this->set('_serialize', ['material']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Material id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $material = $this->Materials->get($id);
        if ($this->Materials->delete($material)) {
            $this->Flash->success(__('The material has been deleted.'));
        } else {
            $this->Flash->error(__('The material could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function deleteliaison($id = null)
    {
        $this->autoRender = false;
        $id = $this->request->data['id'];
        $entity = $this->Materials->get($id);
        $this->Materials->delete($entity);
    }

    public function editliaison()
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
        $id = $this->request->data['id'];
        $stock = $this->request->data['stock'];

        $this->Materials->updateAll(
            ['stock' => $stock],
            ['id' => $id]);

    }
    }

    public function rented($id = null)
    {
        $this->loadModel('UserMaterials');
        $materials = $this->Materials->find('all',[
            'contain' => [
                'MaterialTypes',
                'UserMaterials.Users'
            ],
            'conditions' => [
                'barrack_id' => $id,
                'Materials.id IN' => $this->UserMaterials->find('all',[
                    'fields' => [
                        'id' => 'material_id'
                    ]
                ])
            ]
        ]);
        $materials = $this->paginate($materials);
        $this->set(compact('materials'));
    }
}