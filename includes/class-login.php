<?php
class Login {
    public $user;

    public function __construct() {
        global $db;
        if (session_status() == PHP_SESSION_NONE){
        session_start();
        }

        $this->db = $db;
    }

    public function verify_session() {
        $email = $_SESSION['email'];
        $user =  $this->email_exists( $email );

        if ( false !== $user ) {
            $this->user = $user;

            return true;
        }

        return false;
    }

    public function verify_login($post) {
        if ( ! isset( $post['email'] ) || ! isset( $post['password'] ) ) {
            return false;
        }

        // Check if user exists
        $user = $this->email_exists( $post['email'] );

        if ( false !== $user ) {
            if ( password_verify( $post['password'], $user->password ) ) {
                $_SESSION['email'] = $user->email;

                return true;
            }
        }

        return false;
    }

    public function register($post) {
        // Required fields
        $required = array( 'username', 'password', 'email', 'platformId' );

        foreach ( $required as $key ) {
            if ( empty( $post[$key] ) ) {
                return array('status'=>0,'message'=>sprintf('Please enter your %s', $key));
            }
        }

        // Check if username exists already
        if ( false !== $this->user_exists( $post['username'] ) ) {
            return array('status'=>0,'message'=>'Username already exists');
        }

        // Check if email exists already
        if ( false !== $this->email_exists( $post['email'] ) ) {
            return array('status'=>0,'message'=>'Email already exists');
        }

        // Create if doesn't exist
        $insert = $this->db->insert('USERS',
            array(
                'username'  =>  $post['username'],
                'password'  =>  password_hash($post['password'], PASSWORD_DEFAULT),
                'email'     =>  $post['email'],
                'platform'  =>  $post['platform'],
                'platformId'  =>  $post['platformId'],
            )
        );

        if ( $insert == true ) {
            return array('status'=>1,'message'=>'Account created successfully, You can now login in');
        }

        return array('status'=>0,'message'=>'An unknown error occurred.');
    }

    private function user_exists($where_value, $where_field = 'username') {
        $user = $this->db->get_results("
            SELECT * FROM USERS
            WHERE {$where_field} = :where_value",
            ['where_value'=>$where_value]
        );

        if ( false !== $user ) {
            return $user[0];
        }

        return false;
    }

    private function email_exists($where_value, $where_field = 'email') {
        $user = $this->db->get_results("
            SELECT * FROM USERS
            WHERE {$where_field} = :where_value",
            ['where_value'=>$where_value]
        );

        if ( false !== $user ) {
            return $user[0];
        }

        return false;
    }
}

$login = new Login;
