<?php
/**
 * @var yii\web\View        $this
 * @var \app\models\Profile $model
 */
use app\models\Person;
use yii\bootstrap\Html;
use yii\helpers\Url;

$this->title = Yii::t('user', 'Profile settings');
?>

<h2>Photographs</h2>
<div class="content ui segment">
    <div class="row">
        <div class="col-md-6">
            <p>Please upload a photograph of yourself and of your spouse and/or children if applicable.
                Group photos will not be accepted - you must upload a photograph for each individual listed in your
                registration.
            </p>
            <p>
                The photos you upload, must have been taken within the past 6 months, to reflect current appearance.
            </p>

            <h4 class="htip">TIP:</h4>

            <p>
                It is best to use a professional visa photo service and ask for passport photos that meet the US
                Government's requirements.
                They will provide you with physical passport photos (which you should keep in case you win the Green
                Card Lottery). <br>
                You can also ask to receive a digital copy of the passport photos via email or CD.<br>
                You can then choose to either scan the actual physical passport photo or upload the digital copy.
            </p>

            <h3>
                If you do decide to take the picture on your own, please follow these guidelines:
                <!--3-->

            </h3><h4>Compositional Specifications</h4>

            <strong class="mt20">Head Position</strong>

            <ul class="photo">
                <li>The subject must directly face the camera.</li>
                <li>The subject’s head should not be tilted up, down, or to the side.
                </li>
                <li>The head height or facial region size (measured from the top of the head, including the
                    hair, to the bottom of the chin) must be between 50 percent and 69 percent of the image's total
                    height. The eye height (measured from the bottom of the image to the level of the eyes) should be
                    between 56 percent and 69 percent of the image's height.
                </li>
            </ul>

            <strong class="mt20">Digital Image Head Size Template</strong>
            <br><br>
            <?php echo Html::img('/img/photo.jpg'); ?>
            <br><br>

            <ul class="photo">
                <li>Light-colored Background: The subject should be in front of a neutral, light-colored background.
                </li>
                <li>Focus: The photograph must be in focus.
                </li>
                <li>No Decorative Items: The subject must not wear sunglasses or other items that detract from the face.
                </li>
                <li>No Head Coverings or Hats: Head coverings or hats worn for religious reasons are acceptable, but the
                    head covering may not obscure any portion of the face. Tribal or other headgear not religious in
                    nature may not be worn. Photographs of military, airline, or other personnel wearing hats will not
                    be accepted.
                </li>
            </ul>

            <strong class="mt20">Technical Specifications</strong>
            <br><br>
            <ul class="photo">
                <li><strong>Taking a New Digital Image.</strong> <br>
                    If you take a new digital image, it must meet the following specifications:
                    <ul class="spec">
                        <li>Image File Format: The image must be in the Joint Photographic Experts Group (JPEG)
                            format.
                        </li>
                        <li>Image File Size: The maximum image file size is 240 kilobytes (240 KB).</li>
                        <li>Image Resolution and Dimensions: Minimum acceptable dimensions are 600 pixels (width) x 600
                            pixels (height) up to 1200 pixels x 1200 pixels. Image pixel dimensions must be in a square
                            aspect ratio (meaning the height must be equal to the width).
                        </li>
                        <li>Image Color Depth: Image must be in color (24 bits per pixel). 24-bit black and white or
                            8-bit images will not be accepted.
                        </li>
                    </ul>
                </li>
                <br>
                <li><strong>Scanning a Submitted Photograph.</strong><br>
                    Before you scan a photographic print, make sure it meets the color and compositional specifications
                    listed above. Scan the print using the following scanner specifications:
                    <ul class="spec">
                        <li>Scanner Resolution: Scanned at a resolution of at least 300 dots per inch (dpi).
                        </li>
                        <li>Image File Format: The image must be in the Joint Photographic Experts Group (JPEG) format.
                        </li>
                        <li>Image File Size: The maximum image file size is 240 kilobytes (240 KB)
                        </li>
                        <li>Image Resolution: 600 by 600 pixels to 1200 by 1200 pixels
                        </li>
                        <li>Image Color Depth: 24-bit color. Please note: Black and white, monochrome, or grayscale
                            images will not be accepted.
                        </li>
                    </ul>
                </li>
            </ul>
            <br>
            <h4 class="toddler">Taking photos of a baby or toddler:</h4>
            <br><br>
            <p><strong>Tip 1:</strong></p>
            <p>Lay your baby on his or her back on a plain white or off-white sheet. This will ensure your baby's head
                is supported and provide a plain background for the photo. Make certain there are no shadows on your
                baby's face, especially if you take a picture from above with the baby lying down.</p>
            <p><strong>Tip 2:</strong></p>
            <p>Cover a car seat with a plain white or off-white sheet and take a picture of your child in the car seat.
                This will also ensure your baby’s head is supported.</p>

            <h3>Change of Appearance</h3>
            <p>If your photo(s) or digital image does not reflect your current appearance, the U.S. embassy or consulate
                will request that you provide a new photo with your application, even if the photo is not older than 6
                months.</p>

            <h3>Applicants will be requested to obtain a new photo if they have:</h3>
            <ul class="photo">
                <li>Undergone significant facial surgery or trauma</li>
                <li>Added or removed numerous/large facial piercings or tattoos</li>
                <li>Undergone a significant amount of weight loss or gain</li>
                <li>Made a gender transition</li>
            </ul>

            <p>Generally, if you can still be identified from the photo in your visa application, you will not need to
                submit a new photo. For example, growing a beard or coloring your hair would not generally be considered
                a significant change of appearance.</p>
            <p>If the appearance of your child under the age of 16 has changed due to the normal aging process, he or
                she will generally not have to provide a new photo.</p>

            <h3>Photo Tool</h3>
            <p>Here is a great tool (offered by the US Government) you can use to crop your photo to meet the minimum
                acceptable dimensions of 600 pixels (width) by 600 pixels (height):</p>

            <button class="ui primary button"><a class="phototool" target="_blank"
                                                 href="https://travel.state.gov/content/dam/passports/FIG_cropper.swf">Start
                    Photo Tool</a></button>

            <h3>Upload Photos</h3>
            <?php $form = \yii\bootstrap\ActiveForm::begin([
                'enableClientValidation' => false,
                'options'                => [
                    'enctype' => 'multipart/form-data',
                ],
            ]); ?>


            <?php $counter = 1; ?>
            <!--User photo-->
            <p><?php echo "$counter. ", $model->getFullName(); ?></p>
            <div class="ui photo">

                <div class="ui fluid image">
                    <?=Html::a('<i class="remove icon"></i>',
                        Url::to(['/user/settings/delete-avatar', 'id' => Yii::$app->user->id, 'whom' => 'user']),
                        ['class' => 'ui red right corner label', 'data-method' => 'POST']);?>
                    <?php echo Html::img($model->getImageUrl()); ?>
                </div>

            </div>
            <?=$form->field($model, 'avatar')->fileInput()->label(false);?>
            <?php $counter++; ?>
            <!--Spouse photo-->
            <?php if ($model->hasSpouse()) : ?>
                <p><?php
                    /**
                     * @var Person $spouse
                     */
                    echo "$counter. ", $spouse->getFullName(); ?></p>
                <div class="ui photo">

                    <div class="ui fluid image">
                        <?=Html::a('<i class="remove icon"></i>',
                            Url::to(['/user/settings/delete-avatar', 'id' => Yii::$app->user->id, 'whom' => 'spouse']),
                            ['class' => 'ui red right corner label', 'data-method' => 'POST']);?>
                        <?php echo Html::img($spouse->getImageUrl()); ?>
                    </div>

                </div>
                <?=$form->field($spouse, 'photo')->fileInput()->label(false);?>
                <?php $counter++; ?>
            <?php endif; ?>
            <!--Children photos-->
            <?php
            /**
             * @var array  $children
             * @var Person $child
             */
            foreach ($children as $i => $child): ?>
                <p><?php /** @var Person $child */
                    echo "$counter. ", $child->getFullName(); ?></p>
                <div class="ui photo">

                    <div class="ui fluid image">
                        <?=Html::a('<i class="remove icon"></i>', Url::to([
                            '/user/settings/delete-avatar',
                            'id'       => Yii::$app->user->id,
                            'whom'     => 'child',
                            'child-id' => $child->id,
                        ]), ['class' => 'ui red right corner label', 'data-method' => 'POST']);?>
                        <?php echo Html::img($child->getImageUrl()); ?>
                    </div>

                </div>
                <input type="file" name="child_<?php echo $i ?>">
                <?php $counter++; ?>
            <?php endforeach; ?>
            <br>
            <?php if (Yii::$app->session->getFlash('photoUploadStatus')) : ?>
                <div class="alert alert-success">
                    <?php echo Yii::$app->session->getFlash('photoUploadStatus'); ?>
                    <i class="fa fa-check" aria-hidden="true"></i>
                </div>
            <?php endif; ?>

            <?=Html::submitButton('Save', ['class' => 'ui primary button big'])?>
            <?=Html::submitButton('Save &amp; Continue', ['class' => 'ui primary button big', 'name' => 'continue'])?>
            <?=Html::submitButton('', ['id' => 'are-you-leaving-modal', 'class' => 'hidden', 'name' => 'modal'])?>
            <?php \yii\bootstrap\ActiveForm::end(); ?>
            <!--button class="ui primary button big">Save & Continue</button-->
        </div>
    </div>
</div> <!-- ui segment -->