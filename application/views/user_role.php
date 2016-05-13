<?php

echo (!empty($this->user['role']))? $this->user['name'].' is a(an) '.$this ->user['role'] .'!': "User ". $this->user['name'] . " does not exist. :(";

?>