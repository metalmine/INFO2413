<?php
class Login
{
    public $user;
    public $lastInsertId = null;
    //public $userId;

    public function __construct()
    {
        global $db;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $this->db = $db;
    }

    public function verify_session()
    {
        $email = $_SESSION['email'];

        $user = $this->email_exists($email);

        if (false !== $user) {
            $this->user = $user;

            return true;
        }

        return false;
    }

    public function verify_login($post)
    {
        if (!isset($post['email']) || !isset($post['password'])) {
            return false;
        }

        // Check if user exists
        $user = $this->email_exists($post['email']);

        if (false !== $user) {
            if (password_verify($post['password'], $user->password)) {
                $_SESSION['email'] = $user->email;
                $_SESSION['userId'] = $user->userId;


                $user = $this->getPlatId($_SESSION['userId']);
                $platId = $user->platId;
                $user = $this->getPlatformId($platId);

                $_SESSION['platformId'] = $user->platformId;

                return true;
            }
        }

        return false;
    }

    public function register($post)
    {
        // Required fields
        $required = array('username', 'password', 'email', 'platformId');

        foreach ($required as $key) {
            if (empty($post[$key])) {
                return array('status' => 0, 'message' => sprintf('Please enter your %s', $key));
            }
        }

        // Check if username exists already
        if (false !== $this->user_exists($post['username'])) {
            return array('status' => 0, 'message' => 'Username already exists');
        }

        // Check if email exists already
        if (false !== $this->email_exists($post['email'])) {
            return array('status' => 0, 'message' => 'Email already exists');
        }

        // Create if doesn't exist
        $insert = $this->db->insert('USERS',
            array(
                'username' => $post['username'],
                'password' => password_hash($post['password'], PASSWORD_DEFAULT),
                'email' => $post['email'],
            )
        );
        $userId = $this->db->lastInsertId;

        $insert2 = $this->db->insert('PLATFORMS',
            array(
                'platform' => $post['platform'],
                'platformId' => $post['platformId'],
            )
        );
        $platId = $this->db->lastInsertId;

        $insert3 = $this->db->insert('USERS_PLATFORMS',
            array(
                'userId' => $userId,
                'platId' => $platId,
            )
        );

        if ($insert == true || $insert2 == true || $insert3 == true) {
            return array('status' => 1, 'message' => 'Account created successfully, You can now login in');
        }

        return array('status' => 0, 'message' => 'An unknown error occurred.');
    }

    private function user_exists($where_value, $where_field = 'username')
    {
        $user = $this->db->get_results("
            SELECT * FROM USERS
            WHERE {$where_field} = :where_value",
            ['where_value' => $where_value]
        );

        if (false !== $user) {
            return $user[0];
        }

        return false;
    }

    private function email_exists($where_value, $where_field = 'email')
    {
        $user = $this->db->get_results("
            SELECT * FROM USERS
            WHERE {$where_field} = :where_value",
            ['where_value' => $where_value]
        );

        if (false !== $user) {
            return $user[0];
        }

        return false;
    }

    private function getPlatformId($where_value, $where_field = 'platId')
    {
        $user = $this->db->get_results("
            SELECT * FROM PLATFORMS
            WHERE {$where_field} = :platId_value",
            ['platId_value' => $where_value]
          );
        if (false !== $user) {
            return $user[0];
        }

        return false;
    }

    private function getPlatId($where_value, $where_field = 'userId')
    {
        $user = $this->db->get_results("
            SELECT * FROM USERS_PLATFORMS
            WHERE {$where_field} = :userId_value",
            ['userId_value' => $where_value]
          );
        if (false !== $user) {
            return $user[0];
        }

        return false;
    }

    private function getWeapon($where_value, $where_field = 'weaponName')
    {
        $user = $this->db->get_results("
            SELECT * FROM WEAPONS
            WHERE {$where_field} = :weapon_value",
            ['weapon_value' => $where_value]
          );
        if (false !== $user) {
            return $user[0];
        }

        return false;
    }

    private function getMonster($where_value, $where_field = 'name')
    {
        $user = $this->db->get_results("
            SELECT * FROM MONSTERS
            WHERE {$where_field} = :monster_value",
            ['monster_value' => $where_value]
              );
        if (false !== $user) {
            return $user[0];
        }

        return false;
    }

    public function submit($post)
    {
        // Required fields
        $required = array('weaponType', 'weaponName', 'monsterRank', 'monsterName', 'youtube', 'time');

        foreach ($required as $key) {
            if (empty($post[$key])) {
                return array('status' => 0, 'message' => sprintf('Please enter your %s', $key));
            }
        }

      $userId = $_SESSION['userId'];

      $user = $this->getWeapon($post['weaponName']);
      $weaponId = $user->weaponId;
      $weaponTree = $user->tree;

      $user = $this->getMonster($post['monsterName']);
      $monsterId = $user->monsterId;

      $insert = $this->db->insert('RUNS',
          array(
                'time' => "00:{$post['time']}",
                'youtube' => $post['youtube'],
              )
        );
      $runId = $this->db->lastInsertId;

      $insert2 = $this->db->insert('USERS_RUNS',
                array(
                    'userId' => $userId,
                    'runId' => $runId,
                  )
            );

        $insert3 = $this->db->insert('RUNS_WEAPONS_MAPS_MONSTERS',
                    array(
                        'runId' => $runId,
                        'weaponId' => $weaponId,
                        'type' => $post['weaponType'],
                        'tree' => $weaponTree,
                        'monsterId' => $monsterId,
                        'difficulty' => $post['monsterRank'],
                    )
                );

        $insert4 = $this->db->insert('APPROVALS',
                          array(
                              'runId' => $runId,
                            )
                      );

        if ($insert == true || $insert2 == true || $insert3 == true || $insert4 == true) {
            return array('status' => 1, 'message' => 'Submitted!');
        }

        return array('status' => 0, 'message' => 'An unknown error occurred.');
    }

    public function changePassword($post)
    {
        // Required fields
        $required = array('oldPassword', 'newPassword', 'confirmPassword');

        foreach ($required as $key) {
            if (empty($post[$key])) {
                return array('status' => 0, 'message' => sprintf('Please enter your %s', $key));
            }
        }

        $email = $_SESSION['email'];
        $user = $this->email_exists($email);

        $newPassword = $post['newPassword'];
        $confirmPassword = $post['confirmPassword'];

        if($newPassword==$confirmPassword){
          if (password_verify($post['oldPassword'], $user->password)) {
            $update = $this->db->updateUser('USERS',
                array(
                    'password'  =>  password_hash($post['newPassword'], PASSWORD_DEFAULT),
                ), $user->userId
            );
          }else{
              return array('status' => 0, 'message' => 'Current Password Is Incorrect.');
          }
        } else{
          return array('status' => 0, 'message' => 'New Password Does Not Match.');
        }

        if ($update == true ) {
            return array('status' => 1, 'message' => 'Password Changed!');
        }

        return array('status' => 0, 'message' => 'An unknown error occurred.');
    }
}

$login = new Login;
