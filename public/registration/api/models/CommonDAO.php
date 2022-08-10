<?php

class CommonDAO extends Database {
	
    private $tblUserToken = 'tbl_user_token';
    private $tblUser = 'tbl_user';

    function getUserByToken($token) {
        $sql = " SELECT tut.*, tu.role FROM $this->tblUserToken tut";
        $sql .= " INNER JOIN $this->tblUser tu on tu.id = tut.user_id";
        $sql .= " WHERE token=:token";
        $this->query($sql);
        $this->bind(':token', $token);
        return $this->single();
    }

}
