<?php
class Likes {

    public function __construct(){
        $this->bdd = bdd();
    }

    //Cerate

    public function addLikes($dateLikes,$userId,$pubId){
        $query = "INSERT INTO likes(date_likes, user_id, pub_id)
            VALUES (:dateLikes, :userId, :pubId)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "dateLikes" => $dateLikes,
            "userId" => $userId,
            "pubId" => $pubId
        ));

        $nb = $rs->rowCount();

        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }


    // Read
    public function getLikesAll(){

        $query = "SELECT * FROM likes
        ORDER BY id_likes DESC";
        $rs = $this->bdd->query($query);

        return $rs;
    }

    public function getLikesById($id){

        $query = "SELECT * FROM likes
        WHERE id_likes = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));

        return $rs;
    }

    public function getLikesByUser($userId,$pubId){

        $query = "SELECT * FROM likes
        WHERE user_id = :userId AND pub_id = :pubId";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userId" => $userId,
            "pubId" => $pubId
        ));

        return $rs;
    }

    public function getLikesNbrByPub($userId){

        $query = "SELECT COUNT(*) as nb FROM likes
        WHERE pub_id = :userId";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userId" => $userId
        ));

        return $rs;
    }


    // Update




    // Delete
    public function deleteLikes($userId,$pubId){

        $query = "DELETE FROM likes WHERE user_id = :userId AND pub_id = :pubId";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userId" => $userId,
            "pubId" => $pubId
        ));

        $nb = $rs->rowCount();
        return $nb;

    }

}

// Instance

$likes = new Likes();