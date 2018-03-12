<?php

namespace app\modules\api\controllers;

use yii\web\Controller;
use app\models\ApiUser as User;
use app\models\TblList as Lister;

use Yii;
/**
 * Default controller for the `api` module
 */
class DefaultController extends Controller
{
    private $user;
    private $is_ios;

    public function beforeAction($action){

      if($action->id=="login"){

      }else{
        $id = Yii::$app->request->get('id');
        $token = Yii::$app->request->get('token');
        $this->user = User::findOne(['id'=>$id, 'token'=>$token]);

      }
      return true;

    }

    public function actionIndex()
    {
      return [1,2,3];
    }

    private function generate_token($email){
      $privateKey = hash_hmac('md5', rand(1000,9999), 'randomness');
      $login_id = strtolower($email);
      $token = hash_hmac('md5', $email.$privateKey, '');
      return $token;

    }

    public function actionLogin(){
      if(null==Yii::$app->request->post('email') or null==Yii::$app->request->post('password') or Yii::$app->request->post('email')=='' or Yii::$app->request->post('email')==''){
        return ['status'=>['code'=>400, "message"=>'Email or password cannot be empty']];
      }else{
        if($user = User::findOne(['email'=>Yii::$app->request->post('email'), 'password'=>Yii::$app->request->post('password')])){
          $user->token=$this->generate_token($user->email);
          $user->save(false);
          return ['id'=>$user->id, 'token'=>$user->token, "status"=>["code"=>200, "message"=>"Access Granted"]];
        }else{
          return ['status'=>['code'=>400, "message"=>'Invalid email or password']];
        }
      }

    }

    public function actionListing(){
      if($this->user){
        $list = Lister::find()->select("id, list_name, distance")->where(['user_id'=>$this->user->id])->asArray()->all();
        return ['status'=>['code'=>200, "message"=>'Listing successfully retrieved'],"listing"=>$list];
      }else{
        return ['status'=>['code'=>400, "message"=>'Invalid token']];
      }
    }
}
