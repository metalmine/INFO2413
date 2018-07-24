<?php
class Login
{
    public $user;
    public $runid = null;
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

        //$userId = $this->userId = $_SESSION["userId"];
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
                'platform' => $post['platform'],
                'platformId' => $post['platformId'],
            )
        );

        if ($insert == true) {
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
       //$user = $this->email_exists($post['email']);
      $user = $this->getWeapon($post['weaponName']);
      $weaponId = $user->weaponId;
      $weaponTree = $user->tree;

      /*  $getWeaponTree = $this->db->get_results("
              SELECT tree FROM WEAPONS
              WHERE weaponName = :weapon_value",
              ['weapon_value' => $post['weaponName']]
          );
          */
        $user = $this->getMonster($post['monsterName']);
        $monsterId = $user->monsterId;

        $insert = $this->db->insert('RUNS',
            array(
                'time' => $post['time'],
                'youtube' => $post['youtube'],
            )
        );
    /*    $user = $this->db->get_results("
              SELECT * FROM RUNS
              WHERE youtube = :youtube_value",
              ['youtube_value' => $post['youtube']]
      ); */
      //  $runId = $user->runId;
    //  $last_id = $this->db->lastInsertId();
      $runid = $this->db->lastInsertId;
        $insert2 = $this->db->insert('USERS_RUNS',
                array(
                    'userId' => $userId,
                    'runId' => $runid,
                )
            );

        $insert3 = $this->db->insert('RUNS_WEAPONS_MAPS_MONSTERS',
                    array(
                        'runId' => $runid,
                        'weaponId' => $weaponId,
                        'type' => $post['weaponType'],
                        'tree' => $weaponTree,
                        'monsterId' => $monsterId,
                        'difficulty' => $post['monsterRank'],
                    )
                );


        if ($insert == true || $insert2 == true || $insert3 == true) {
            return array('status' => 1, 'message' => 'Submitted!');
        }

        return array('status' => 0, 'message' => 'An unknown error occurred.');
    }
}

$login = new Login;
