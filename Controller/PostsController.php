<?php

App::uses('AppController','Controller');

class PostsController extends AppController {
	
	public $helpers = array('Html','Form','Session' ); //Declare an array of all the Helpers that will be used
	
	public function isAuthorised($user) {
		// All registered users can add posts
		if ($this->action === 'add') {
			return true;
		}
		// The owner of a post can edit and delete it
		if (in_array($this->action, array('edit', 'delete'))) {
			$postId = $this->request->params['pass'][0];
			if ($this->Post->isOwnedBy($postId, $user['id'])) {
				return true;
			}
		}
		return parent::isAuthorised($users);
	}


	/*
	 * The single instruction in the action uses set() to pass data from the 
	 * controller to the view. The line sets the view variable called ‘posts’ 
	 * equal to the return value of the find('all') method
	 * of the Post model. Our Post model(Database Table) is automatically 
	 * available at $this->Post because we’ve followed Cake’s naming conventions.
	 */
	public function index(){
		$this->set('posts',$this->Post->find('all'));
	}
	
    /**
     * The $id param is passed to this action through the arguments specified in the URL.
     * The id variable for the $this->Post instance (object) is set to the current id
     * passed by the URL thus setting the $this->Post object.
     * The read() method returns one row and the set() method stores it in 
     * the $post variable which is used in the view file.
     */
	public function view($id = NULL){			
		$this->Post->id = $id;										
		$this->set('post',$this->Post->read()); 
	}
	
	public function add(){
		if($this->request->is('POST')) {                 // used instead of $this->data
			$this->request->data['Post']['user_id'] = $this->Auth->user('id'); // 
			if($this->Post->save($this->request->data)){   // used instead of $this->data
				$this->Session->setFlash('Your post has been saved.');			
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Unable to add your post.');
			}
		}
	}
	
	public function edit($id = null){
		
		$this->Post->id = $id;
		if($this->request->is('get')){
			$this->request->data = $this->Post->read();
		} else {
			if ($this->Post->save($this->request->data)){
				$this->Session->setFlash('Your post has been updated.');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Your post failed to update.');
			}
		}
	}
	
	public function delete($id){
		if ($this->request->is('get')){
			throw new MethodNotAllowedException();
		}
		if ($this->Post->delete($id)){
			$this->Session->setFlash('The post with id '. $id . ' has been deleted.');
		}
		$this->redirect(array('action'=>'index'));
	}
}
?>