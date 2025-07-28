<?php foreach ($list as $owner) {?>
    <a class="dummy-media-object" href="#">
        <img style="border-radius: 50%;width: 30px;"
            src="<?php echo YYii::$app->params['housing_owners_url'].'/'.$owner->getPhotoUrl() ?>"
            alt="<?php echo $user->name_owner ?>"/>
        <h3><?php echo $user->name_owner.' '.$user->lastname_owner ?></h3>
    </a>
<?php } ?>