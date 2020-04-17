<?php
namespace App\src\DAO;

//use App\src\model\User;
use App\config\Parameter;

class UserDAO extends DAO
{
    public function createUser(Parameter $post)
    {
        $query = 'INSERT INTO user (surname, name, mail, pwd, pseudo, role_id) VALUES (?, ?, ?, ?, ?, 2)';
        $this->createQuery($query, [$post->get('userSurname'), $post->get('userName'), $post->get('userMail'),password_hash($post->get('userPassword'), PASSWORD_BCRYPT), $post->get('userPseudo')]);
    }

    //Avoir un pseudo unique
     public function checkUser(Parameter $post)
    {
        $query = 'SELECT COUNT(pseudo) FROM user WHERE pseudo = ?';
        $result = $this->createQuery($query, [$post->get('userPseudo')]);
        $isUnique = $result->fetchColumn();
        if($isUnique) {
            return '<p>Le pseudo existe déjà</p>';
        }
    }
    
    //Vérifier que les identifiants sont corrects
    public function login(Parameter $post)
    {
        $query = 'SELECT user.id, user.pwd, role.name FROM user, role WHERE user.role_id = role.id AND pseudo = ?';
        $data = $this->createQuery($query, [$post->get('logPseudo')]);
        $result = $data->fetch();
        $isPasswordValid = password_verify($post->get('logPassword'), $result['pwd']);
        return [
            'result' => $result,
            'isPasswordValid' => $isPasswordValid
        ];
    }
    
    //Catch user information thanks to userId which is store on session variable (otherwise we only have the pseudo)
    //Pour alimenter la page d'administration du compte
    public function getUser($userId)
    {
        $query = 'SELECT id, name, surname, mail, pwd, pseudo FROM user WHERE id = ?';
        $result =  $this->createQuery($query, [$userId]);
        
        $user = $result->fetch();
        $result->closeCursor();
        return $user;
    }
    
    //Update user password
    public function updatePassword(Parameter $post, $userId)
    {
        $query = 'UPDATE user SET pwd = ? WHERE id = ? ';
        $this->createQuery($query, [password_hash($post->get('secondPassword'), PASSWORD_BCRYPT), $userId]);
    }
    
    //Update user account
    public function updateAccount(Parameter $post, $userId)
    {
        $query = 'UPDATE user SET name = ?, surname = ?, pseudo = ?, mail = ? WHERE id = ? ';
        $this->createQuery($query, [$post->get('userUpdateName'), $post->get('userUpdateSurname'), $post->get('userUpdatePseudo'), $post->get('userUpdateMail'), $userId ]);
    }
    
    public function deleteAccount($id)
    {
        $sql = 'DELETE FROM user id = ?';
        $this->createQuery($sql, [$id]);
    }
}