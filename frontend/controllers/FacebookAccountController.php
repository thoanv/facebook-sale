<?php

namespace frontend\controllers;

use frontend\controllers\base;
use common\models\FacebookAccount;

class FacebookAccountController extends base\BaseController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $facebook_account = FacebookAccount::find()->where(['user_id' => $this->user->id])->one();

        $page = 'index';

        if (!$facebook_account) {
            $page = 'connect';
        }

        return $this->render($page, [
            'user' => $this->user,
            'facebook_account' => $facebook_account
        ]);
    }
}