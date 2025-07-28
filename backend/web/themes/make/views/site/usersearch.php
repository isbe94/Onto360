<?php foreach ($list as $owner) { ?>
    <a class="dummy-media-object" href="#">
        <img style="border-radius: 50%;width: 30px;"
             src="<?php echo Yii::$app->params['housing_owners_url'] . '/' . $owner->getPhotoUrl() ?>"
             alt="<?php echo $owner->name_owner . ' ' . $owner->lastname_owner ?>"/>

        <h3><?php echo $owner->name_owner . ' ' . $owner->lastname_owner ?></h3>
    </a>
<?php } ?>
