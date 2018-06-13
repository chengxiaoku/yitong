<?php
namespace Member\Model;
use Think\Model;

/**
 * 用户登录信息的验证
 * Class UserModel
 * @package Member\Model
 */
class UserModel extends Model{
    protected $tableName    = 'member';
    /**
     * 根据条件拉取用户信息
     */
    public function sel($username,$password){
        $data = $this->where("identity='$username'")->find();
        if(empty($data)){
            $error = '没有此用户！';
            return $error;
        }
        $da = $this->field("status")->where("identity='$username'")->find();
        if($da["status"] !=1){
            $error = '此用户等待管理员审核！';
            return $error;
        }
        $pass = $data['password'];
        if(md5($password) != $pass){
            $error = '密码错误！';
            return $error;
        }
        //记录用户信息
        session('user_id', $data['id']);
        session('user_name', $data['name']);
    }
}