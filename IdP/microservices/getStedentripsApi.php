<?php
include_once('../IdP.php');
class GetStedentripsApi {
    protected $bearerToken = "";
    protected $bearerCredentials = "";
    protected $returnData = "";
    protected $geverifieerd = "";
    public function __constuct() {

    }

    public function checkToken() {

        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        $allHeaders = getallheaders();
        $authorization = $allHeaders['Authorization'];
        list($type, $data) = explode(' ', $authorization, 2);
        $this->bearerToken = $data;

        $this->bearerCredentials = array();
        $this->bearerCredentials['username '] = $username;
        $this->bearerCredentials['password'] = $password;

        $idc = new IdC($this->bearerToken, $this->bearerCredentials);

        return $idc->decodeToken();
    }
}