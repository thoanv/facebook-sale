<?php

namespace frontend\controllers;

use Yii;
use yii\web\Response;
use yii\helpers\Json;
use yii\httpclient\Client;
use common\models\FacebookAccount;
use frontend\controllers\base\BaseController;

class FacebookToolController extends BaseController
{
    /**
     * @param $action
     *
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;

        return parent::beforeAction($action);
    }

    /**
     * @return bool|mixed
     */
    public function actionVerifyAccount()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $post = Yii:: $app->request->post();

        if (isset($post['username']) && isset($post['password'])) {

            $username = $post['username'];
            $password = $post['password'];

            $secret_key = 'c1e620fa708a1d5696fb991c1bde5662';
            $api_key = '3e7c78e35a76a9299309885393b02d97';

            $post_data = array(
                "api_key" => $api_key,
                "email" => $username,
                "format" => "JSON",
                "locale" => "vi_vn",
                "method" => "auth.login",
                "password" => $password,
                "return_ssl_resources" => "0",
                "v" => "1.0"
            );

            $post_data['sig'] = $this->generate_sig($post_data, $secret_key);

            $rest_server = 'https://api.facebook.com/restserver.php?';

            foreach ($post_data as $key => $value) {
                $rest_server .= $key . '=' . $value . '&';
            }

            return $rest_server;
        }

        return false;
    }

    /**
     * @return bool
     * @throws \yii\httpclient\Exception
     */
    public function actionAddAccount()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $post = Yii:: $app->request->post();

        if (isset($post['result'])) {

            $result = Json::decode($post['result'], true);

            if (isset($result['access_token']) && isset($result['uid'])) {
                $client = new Client();

                $url = 'https://graph.facebook.com/v3.0/me?fields=name,email,gender&access_token=' . $result['access_token'];

                $info = Json::decode($client->get($url)->send()->content, true);

                if (isset($info['name']) && isset($info['id']) && $info['id'] == $result['uid']) {

                    $facebook_account = FacebookAccount::find()->where(['uid' => $info['id']])->one();

                    if (!$facebook_account) {
                        $facebook_account = new FacebookAccount();
                    }

                    $facebook_account->user_id = $this->user->id;

                    $facebook_account->access_token = $result['access_token'];
                    $facebook_account->uid = (string)$info['id'];
                    $facebook_account->identifier = $result['identifier'];
                    $facebook_account->secret = $result['secret'];
                    $facebook_account->session_key = $result['session_key'];

                    $facebook_account->avatar = 'https://graph.facebook.com/' . (string)$info['id'] . '/picture';
                    $facebook_account->name = $info['name'];
                    $facebook_account->email = $result['identifier'];
                    $facebook_account->status = 1;

                    return $facebook_account->save();
                }
            }

            return false;
        }

        return false;
    }

    /**
     * @param $post_data
     * @param $secret_key
     *
     * @return string
     */
    private function generate_sig($post_data, $secret_key)
    {
        $text_sig = '';
        foreach ($post_data as $key => $value) {
            $text_sig .= "$key=$value";
        }

        $text_sig .= $secret_key;

        return md5($text_sig);
    }
}