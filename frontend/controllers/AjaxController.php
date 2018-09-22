<?php

namespace frontend\controllers;

use Yii;
use yii\web\Response;
use yii\web\Controller;
use common\models\Page;
use common\models\Post;


class AjaxController extends Controller
{
	/**
	 * @param $action
	 *
	 * @return bool
	 * @throws \yii\web\BadRequestHttpException
	 */
	public function beforeAction( $action ) {
		$this->enableCsrfValidation = false;

		return parent::beforeAction( $action );
	}

	public function actionSavePage()
	{
		Yii::$app->response->format = Response::FORMAT_JSON;
        $post = Yii:: $app->request->post();

        if(isset($post['id']) && isset($post['name'])&& isset($post['status'])){
        	$request = Page::find()->where(['page_id' => $post['id']])->one();

        	if ($request) {
        		return false;
        	}
        		$page = new Page();
	        	$page->page_id = $post['id'];
	        	$page->title   = $post['name'];
	        	$page->status   = $post['status'];

	        	return $page->save(false);
        	
		}
		return false;
	}

	// Xử lý on-off
	/**
	 * 
	 */
    // xử lý nút on-off
    public function actionEnableColumn()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $post = Yii:: $app->request->post();

        if (isset($post['id']) && isset($post['table']) && isset($post['api']) && isset($post['column'])) {
            $model = null;

            switch ($post['table']) {
                case 'page':
                    $model = Page::findOne($post['id']);
                    break;

                case 'post':
                    $model = Post::findOne($post['id']);
                    break;

                case 'setting':
                    $model = Setting::findOne($post['id']);
                    break;

                case 'product':
                    $model = Product::findOne($post['id']);
                    break;

                case 'supporter':
                    $model = Supporter::findOne($post['id']);
                    break;
                case 'category-product':
                    $model = CategoryProduct::findOne($post['id']);
                    break;

                default:
                    break;
            }

            if ($model) {
                $model[$post['column']] = $model[$post['column']] ? 0 : 1;

                return $model->save();
            }
        }

        return false;
    }


    // xóa page
    public function actionDeletePage()
    {
    	Yii::$app->response->format = Response::FORMAT_JSON;
		$post                       = Yii:: $app->request->post();

		if(isset($post['id'])){
			$page = Page::find()->where(['id'=> $post['id']])->one();
			return $page->delete(false);
		}

		return false;
    }

    // lưu bài viết
    
    public function actionSavePost()
    {
    	Yii::$app->response->format = Response::FORMAT_JSON;
		$post                       = Yii:: $app->request->post();


		if(isset($post['id']) && isset($post['message']) && isset($post['story']) && isset($post['post_id'])  && isset($post['date'])  && isset($post['created_time'])) {

			$request = Post::find()->where(['post_id'=> $post['post_id']])->one();

			if($request){
				return false;
			}
			$model = new Post();

			$model->post_id    =   $post['post_id'];
			$model->page_id   =   $post['id'];
			$model->describe   =   $post['story'];
			$model->content    =   $post['message'];
			$model->created_at =   $post['date'];

			return $model->save(false);
		}
		return false;	
    }

    // Xóa từng bài post
	public function actionDeletePost()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $post                       = Yii:: $app->request->post();

        if(isset($post['id'])){
            $posts = Post::find()->where(['id'=> $post['id']])->one();
            return $posts->delete(false);
        }
        return false;
    }


    public function actionDeleteAllPost()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $post                       = Yii:: $app->request->post();

        $postall = Post::find()->all();
        foreach ($postall as $key => $value) {
            $value->delete(false);
        }
        return true;

    }
}
