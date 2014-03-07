<?php

use Jenssegers\Mongodb\Model as Eloquent;
class Userprofile extends Eloquent {
    protected $collection = 'userprofiles';
//    protected $connection = 'mongodb';
    protected $fillable = [];

    public function nhosts()
    {
        return $this->embedsMany('Host');
    }

    public function nnetworks()
    {
        return $this->embedsMany('Network');
    }
}

class Host extends Eloquent {

}

class Network extends Eloquent {

}
