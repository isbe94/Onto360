<?php foreach ($list as $user) { ?>
    <a class="dummy-media-object" href="#">
        <img style="border-radius: 50%;width: 30px;"
            src="<?php echo Yii::$app->params['housing_users_url'].'/'.$user->avatar ?>"
            alt="<?php echo $user->username ?>"/>

        <h3><?php echo $user->username ?></h3>
    </a>
<?php } ?>