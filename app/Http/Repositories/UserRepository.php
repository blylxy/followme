<?php

namespace App\Http\Repositories;

use App\Models\user;

class UserRepository {
    /*
     *    将需要使用的Model通过构造函数实例化
     */

    protected $user;

    public function __construct(user $user) {
        $this->user = $user;
    }

    public function get_arr() {
        $return = $this->user->all();
        return $return->toArray();
    }

}
