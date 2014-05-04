<?php
/**
 * Created by PhpStorm.
 * User: junko
 * Date: 2014/05/02
 * Time: 19:09
 */

class StatusController extends Controller
{
    protected $auth_actions = array('index', 'post');
    public function indexAction()
    {
        $user = $this->session->get('user');
        $statuses = $this->db_manager->get('Status')
            ->fetchAllPersonalArchivesByUserId($user['id']);
        return $this->render(array(
            'statuses' => $statuses,
            'body' => '',
            '_token' => $this->generateCsrfToken('status/post'),
        ));
    }
    public function postAction()
    {
        if(!$this->request->isPost())
        {
            $this->forward404();
        }
        $token = $this->request->getPost('_token');
        if(!$this->checkCsrfToken('status/post', $token))
        {
            return $this->redirect('/');
        }
        $body = $this->request->getPost('body');
        $errors = array();
        if(strlen($body) <= 0)
        {
            $errors[] = 'ひとことを入力してください';
        }
        else if(mb_strlen($body) > 200)
        {
            $errors[] = 'ひとことは200文字以内で入力してください';
        }
        if(count($errors) === 0)
        {
            $user = $this->session->get('user');
            $this->db_manager->get('Status')->insert($user['id'], $body);
            return $this->redirect('/');
        }
        $user = $this->session->get('user');
        $statuses = $this->db_manager->get('status')->fetchAllPersonalArchivesByUserId($user['id']);
        return $this->render(array(
            'errors' => $errors,
            'body' => $body,
            'statuses' => $statuses,
            '_token' => $this->generateCsrfToken('status/post'),
        ), 'index');
    }
    public function userAction($params)
    {
        $user = $this->db_manager->get('User')->fetchByUserName($params['user_name']);
        if( !$user )
        {
            $this->forward404();
        }
        $statuses = $this->db_manager->get('Status')->fetchAllByUserId($user['id']);
        $following = null;
        if($this->session->isAuthenticated())
        {
            $my = $this->session->get('user');
            if($my['id'] !== $user['id'])
            {
                $following = $this->db_manager->get('Following')->isFollowing($my['id'], $user['id']);
            }
        }
        return $this->render(array(
            'user' => $user,
            'statuses' => $statuses,
            'following' => $following,
            '_token' =>  $this->generateCsrfToken('account/follow'),
        ));
    }
    public function showAction($params)
    {
        $status = $this->db_manager->get('Status')->fetchByIdAndUserName($params['id'], $params['user_name']);
        if( !$status )
        {
            $this->forward404();
        }
        return $this->render(array('status' => $status));
    }
} 