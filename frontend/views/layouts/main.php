<?php

use yii\helpers\Url;

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use frontend\assets\AdminAsset;
use common\models\User;

AdminAsset::register($this);

$user = null;

if (!Yii::$app->user->isGuest) {
    try {
        $user = findModel(Yii::$app->user->identity->getId());
    } catch (NotFoundHttpException $e) {
    }
}

/**
 * @param $id
 *
 * @return User|null
 * @throws NotFoundHttpException
 */
function findModel($id)
{
    if (($model = User::findOne($id)) !== null) {
        return $model;
    } else {
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="skin-blue sidebar-mini sidebar-mini-expand-feature fixed">
    <?php $this->beginBody() ?>
    <div class="wrapper" style="overflow: hidden">
        <header class="main-header">
            <a href="<?= Url::to(['site/index']) ?>" class="logo">
                <span class="logo-mini"><b>A</b>RT</span>
                <span class="logo-lg"><b>Admin</b>RT</span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu" style="height: 50px;">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" style="height: 50px;">
                                <img src="/uploads/core/images/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs" style="float:right;">
                                    <?= $user['email'] ?>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="/uploads/core/images/user2-160x160.jpg" class="img-circle"
                                         alt="User Image">
                                    <p>
                                        <?= $user['email'] ?>
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?= Url::to(['site/profile']) ?>" class="btn btn-default btn-flat">
                                            <?= Yii::t('app', 'Profile') ?>
                                        </a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= Url::to(['site/logout']) ?>" class="btn btn-default btn-flat">
                                            <?= Yii::t('app', 'Sign out') ?>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu" data-widget="tree">
                    <li>
                        <a href="<?= Url::to(['site/index']) ?>">
                            <i class="fa fa-home"></i>
                            <span>
                                <?= Yii::t('app', 'Homepage') ?>
                            </span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-facebook"></i>
                            <span>Kết nối Facebook</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="<?= Url::to(['facebook-account/index']) ?>">
                                    <i class="fa fa-circle-o"></i>
                                    <span>Tài khoản facebook</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['photo-location/index']) ?>">
                                    <i class="fa fa-circle-o"></i>
                                    <span>Màn hình chat</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['setting/index']) ?>">
                                    <i class="fa fa-dot-circle-o"></i>
                                    <span>Cấu hình</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['extension/simple-data']) ?>">
                                    <i class="fa fa-dot-circle-o"></i>
                                    <span>Dữ liệu mẫu</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['unit/index']) ?>">
                                    <i class="fa fa-circle-o"></i>
                                    <span>Giá</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i>
                            <span>Cài đặt nâng cao</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="<?= Url::to(['page/index']) ?>">
                                    <i class="fa fa-clone"></i>
                                    <span>Trang</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['photo-location/index']) ?>">
                                    <i class="fa fa-picture-o"></i>
                                    <span>Vị trí ảnh</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['setting/index']) ?>">
                                    <i class="fa fa-cog"></i>
                                    <span>Cấu hình</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['extension/simple-data']) ?>">
                                    <i class="fa fa-database"></i>
                                    <span>Dữ liệu mẫu</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['unit/index']) ?>">
                                    <i class="fa fa-truck"></i>
                                    <span>Giá</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= Url::to(['general-information/index']) ?>">
                            <i class="fa fa-sliders"></i>
                            <span>
                                <?= Yii::t('app', 'General configuration') ?>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['setting/index']) ?>">
                            <i class="fa fa-cog"></i>
                            <span>
                                <?= Yii::t('app', 'Configuration') ?>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['category/index']) ?>">
                            <i class="fa fa-tags"></i>
                            <span>
                                <?= Yii::t('app', 'Categories') ?>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['post/index']) ?>">
                            <i class="fa fa-thumb-tack"></i>
                            <span>
                                <?= Yii::t('app', 'Posts') ?>
                            </span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['library/index']) ?>">
                            <i class="fa fa-folder-open"></i>
                            <span>
                                <?= Yii::t('app', 'Library') ?>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['image/index']) ?>">
                            <i class="fa fa-picture-o"></i>
                            <span>
                                <?= Yii::t('app', 'Images') ?>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['supporter/index']) ?>">
                            <i class="fa fa-shield"></i>
                            <span>
                                <?= Yii::t('app', 'Supporters') ?>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['extension/index']) ?>">
                            <i class="fa fa-plug"></i>
                            <span>
                                <?= Yii::t('app', 'Extensions') ?>
                            </span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>
        <div class="content-wrapper" style="height: fit-content;">
            <?= $content ?>
        </div>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2017 <a href="">Red tiger solutions jsc</a>.</strong> All rights
            reserved.
        </footer>
        <div id="loader" class="opacity loader">
            <div class="loader-inner ball-scale-ripple-multiple vh-center">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <script>
        let client = "<?= Yii::$app->getHomeUrl() ?>";
        console.log(client);
    </script>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>