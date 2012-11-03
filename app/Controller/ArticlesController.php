<?php
App::uses ( 'AppController', 'Controller' );
/**
 * Articles Controller
 *
 * @property Article $Article
 */
class ArticlesController extends AppController {
	
	public function sacoimagen($id = null){
		
		$img = $this->Article->Image->find('all', array('conditions' => array('Image.article_id' => $id)));
		if ($this->request->is('requested')){
			
			return $img;
			
		}
		$this->set(compact('img'));
		
	}
	
	
	public function destacados(){
	
		
		$destacados = $this->Article->find('all', array('conditions' => array('Article.leading_article' => '1')));
		
		if ($this->request->is ( 'requested' )) {
				
			return $destacados;
		
		}
		$this->set(compact('destacados'));
	}
	
	

		
	public function contarart() {
		if ($this->request->is ( 'requested' )) {
			
			$total = $this->Article->find ( 'count' );
			return $total;
		
		}
		
		$this->set ( 'total', $total );
	}
	
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		if ($this->request->is ( 'ajax' )) {
			$this->layout = 'ajax';
		} else {
			$this->layout = 'default';
		}
		
		$this->paginate = array ('limit' => 9 );
		$this->Article->recursive = 0;
		$articles = $this->paginate ();
		if ($this->request->is ( 'requested' )) {
			
			return $articles;
		
		}
		
		$this->set ( 'articles', $articles );
	
	}
	
	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param $id string       	
	 * @return void
	 */
	public function view($id = null) {
		
		if ($this->request->is ( 'ajax' )) {
			$this->layout = 'ajax';
		} else {
			$this->layout = 'default';
		}
		$this->Article->id = $id;
		if (! $this->Article->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid article' ) );
		}
		$article = $this->Article->read ( null, $id );
		//$ship = $this->Article->find ( 'first', array ('conditions' => array ('Article.id' => $id ) ) );
		$articles = $this->Article->find ( 'all', array ('conditions' => array ('User.id' => $id ) ) );
		
		//$this->set ( 'ship', $ship );
		//$this->set ( 'moneda', $moneda );
		$img = $this->Article->Image->find ( 'all', array ('conditions' => array ('article_id' => $id ) ) );
		$this->set ( 'article', $article );
		$this->set('img', $img);
	}
	
	/**
	 * Ver de Usuario method
	 *
	 * @return void
	 */
	
	public function verDeUsuario($id = null) {
		
		if (! $this->Auth->loggedIn ()) {
			$this->Session->setFlash ( __ ( 'User not logged, please log in' ), 'default', array ('class' => 'error' ) );
			$this->redirect ( $this->Auth->redirect () );
		
		}
		
		if ($this->request->is ( 'requested' )) {
			
			return $articles;
		
		}
		
		if ($this->request->is ( 'ajax' )) {
			
			$this->layout = 'ajax';
		} else {
			$this->layout = 'default';
		}
		
		
		$articles = $this->Article->find ( 'all', array ('conditions' => array ('User.id' => $id ) ) );
		
		$this->set ( 'articles', $articles );
	
	}
	
	/**
	 * add method
	 *
	 * @return void
	 *
	 */
	public function add() {
		
		if ($this->request->is ( 'ajax' )) {
			$this->layout = 'ajax';
		} else {
			$this->layout = 'default';
		}
		
		
		
		if ($this->request->is ( 'post' )) {
			
			$this->Article->create ();
			
			$this->request->data ['Article'] ['time_stamp'] = date ( 'Y-m-d H:i:s', time () );	

			

		
			if ($this->Article->save($this->request->data) ) { 



			
			for ($i=0; $i<4; $i++){

				

				$img_path = "./images/";
				$extension[$i] = end(explode('.', $this->request->data['Image'][$i]['image']['name']));
			
				$this->Article->Image->create();
				$this->request->data['Image'][$i]['image'] = array('name'=>$this->Article->id."-".$i,  'tmp_name' => $this->request->data['Image'][$i]['image']['tmp_name']);
				$this->request->data['Image'][$i]['name'] = $this->Article->id."-".$i;
				$this->request->data['Image'][$i]['article_id'] = $this->Article->id;
				$this->request->data['Image'][$i]['ext']= $extension[$i];

				$this->Article->Image->save($this->request->data['Image'][$i]);
					
				$target_path[$i] = $img_path . basename($this->request->data['Image'][$i]['image']['name'].".".$extension[$i]);
					
					
				if(!move_uploaded_file($this->request->data['Image'][$i]['image']['tmp_name'], $target_path[$i])) {

					if(isset($this->request->data['Image'][$i]['iamge']['tmp_name'])){
					die(__ ( 'Fatal error, we are all going to die.' ));
					}
				}else{
						
					$this->Resize->img($target_path[$i]);
					$this->Resize->setNewImage($img_path.basename($this->request->data['Image'][$i]['image']['name']."t.".$extension[$i]));
					$this->Resize->setProportionalFlag('V');
					$this->Resize->setProportional(1);
					$this->Resize->setNewSize(45, 45);
					$this->Resize->make();
					
					
					if($this->request->data['Article']['leading_article'] == '1' && $i == 0 ){
					
						$this->Resize->img($target_path[0]);
						$this->Resize->setNewImage($img_path.basename($this->request->data['Image']['0']['image']['name']."d.".$extension['0']));
						$this->Resize->setProportionalFlag('V');
						$this->Resize->setProportional(1);
						$this->Resize->setNewSize(277, 277);
						$this->Resize->make();
					}

						
				}
				

				
			}				
				
				
				$this->Article->Image->save($this->request->data['Image']);
			
				
				
				$this->redirect ( array ('action' => 'view', $this->Article->id ) );
	
				$this->Session->setFlash ( __ ( 'Article "' . $this->request->data ["Article"] ["name"] . '" has been saved' ) );

				
			} else {
				$this->Session->setFlash ( __ ( 'The article could not be saved. Please, try again.' ) );
			}
			
	}
					
				
		
		$items = $this->Article->Item->find ( 'list' );
		$payments = $this->Article->Payment->find ( 'list' );
		$shippings = $this->Article->Shipping->find ( 'list' );
		
		$this->set ( compact ( 'items', 'payments', 'shippings' ) );
	}
	
	/**
	 * delete method
	 *
	 * @throws MethodNotAllowedException
	 * @throws NotFoundException
	 * @param $id string       	
	 * @return void
	 */
	public function delete($id = null) {
		if (! $this->request->is ( 'post' )) {
			throw new MethodNotAllowedException ();
		}
		$this->Article->id = $id;
		if (! $this->Article->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid article' ) );
		}
		if ($this->Article->delete ()) {
			$this->Session->setFlash ( __ ( 'Article deleted' ) );
			$this->redirect ( array ('action' => 'index' ) );
		}
		$this->Session->setFlash ( __ ( 'Article was not deleted' ) );
		$this->redirect ( array ('action' => 'index' ) );
	}

}
