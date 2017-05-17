<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'USA Immigrations Organization';
?>

<div class="content-wrap">
    <a name="home"></a>

    <div class="bgwrapper flex-container">
        <div class="container-fluid">

            <div class="row">
                <div class="tagline">
                    <h1 class="mp">We will make your dream come true!</h1>
                    <h2 class="mp">Trustworthy guidance and support for applicants of the US Diversity
                        Visa.</h2>
                    <a href="#eligible"><span class="cta-main">Check My Eligibility</span></a>
                    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

                        <div class="alert alert-success fade in" style="margin-top:18px;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                            <strong>Success!</strong> The letter has been sent successfully.
                        </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div> <!-- end main block -->

    <div id="our-services" class="services-block"><a name="services"></a>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 block-title">

                    <h2>Our Services</h2>
                </div>
            </div> <!-- end row -->
            <div class="row serv-margin">
                <div class="col-md-3">
                    <div class="one-service-block">
                        <img src="/img/app-04.png" alt="">
                        <div class="service-title">
                            <h3>CHECK YOUR ELIGEBILITY</h3>
                        </div>
                        <div class="service-description">
                            <span>Not everyone is eligible to register for the Green Card Lottery. To make it easier for our clients and their families we created a free and simple eligibility test that will let you know immediately if you are eligible. If you are eligible do not miss out on this opportunity and register today! You might win a Green Card!</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="one-service-block">
                        <img src="/img/submission-01.png" alt=""> <!-- путь к папке темы здесь -->
                        <div class="service-title">
                            <h3>ONLINE SUBMISSION</h3>
                        </div>
                        <div class="service-description">
                            <span>We provide our clients with online registration with the US government’s Diversity Visa (DV) program – which gives out tens of thousands of Green Card’s every year to the winners of the lottery! Your applications are checked by our experts before submission to the Lottery to make sure they meet the official US Government standards. We are here to help you!</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="one-service-block">
                        <img src="/img/photo-02.png" alt=""> <!-- путь к папке темы здесь -->
                        <div class="service-title">
                            <h3>RESULT NOTIFICATION</h3>
                        </div>
                        <div class="service-description">
                            <span>After the US Government releases the lottery results we will notify you and let you know if you won the Green Card! You will be notified whether you won or did not win the Green Card Lottery. We will always keep you updated!</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="one-service-block">
                        <img src="/img/customer-03.png" alt=""> <!-- путь к папке темы здесь -->
                        <div class="service-title">
                            <h3>EXTENDED SERVICE</h3>
                        </div>
                        <div class="service-description">
                            <span>Our customers enjoy many benefits that are not available to people who apply to the Green Card Lottery on their own. If you win the Green Card Lottery, our experts will tell you what to do in order to schedule your Consular Interview in a US Consulate or Embassy near you, so that you can get your Green Card You will then be able to live and work permanently and legally in the United States!</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end services -->

    <!-- eligibility test -->
    <?php //get_template_part(test); ?>
    <!-- eligibility test -->

    <!-- counter start -->
    <div class="counter-block">
        <div class="container-fluid">
            <div class="row stat">
                <div class="statsbar">
                    <!--img src="/img/year-2015.png" alt="" class="y15"/-->
                    <div class="stat-one col-md-3">
                        <div class="stat-number" data-n="9399747"><span class="Single">0</span>
                        </div>
                        <div class="stat-title">Applicants</div>
                    </div>
                    <div class="stat-two col-md-3">
                        <div class="stat-number" data-n="5018316">0</div>
                        <div class="stat-title">Family Members</div>
                    </div>
                    <div class="stat-three col-md-3">
                        <div class="stat-number" data-n="14418063">0</div>
                        <div class="stat-title">Total Registered</div>
                    </div>
                    <div class="stat-four col-md-3">
                        <div class="stat-number" data-n="125514">0</div>
                        <div class="stat-title">Winners</div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="year text-center">
                    <h4>Year 2015</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- counter end -->

    <div class="plane-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center planes-text">
                    <h2>We help people achieve their dreams!</h2>
                    <h3>Win the Green Card Lottery and immigrate to the US from around the world!</h3>
                </div>
                <div class="planes"><img src="/img/planes.gif" alt=""></div>
            </div>
        </div>
    </div>
    <div class="cta-block">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center clearfix">

                    <?php echo common\components\eligibility\EligibilityTest::widget(); ?>

                </div>
            </div>
        </div>
    </div>

    <div id="about-us" class="aboutus-block"><a name="about"></a>
        <div class="container">
            <div class="row">
                <div class="col-md-12 block-title">
                    <h2 class="wt">About Us</h2>
                </div>
            </div>
            <div class="row">
                <div class="card flex-container">
                    <div class="col-md-2 col-xs-12">
                        <img src="/img/the_best_way_to_progress.jpg" alt="" class="about-img"></div>
                    <div class="col-md-9 col-xs-12 about-text-body">
                        <h2 class="wt wth">THE BEST WAY TO PROGRESS</h2>
                        <p class="wt">We promote the opportunities that the United States has to offer by
                            allowing people from all over the world the chance to receive the DV Visa. We
                            are helping clients make a better life for themselves and their families. We
                            understand that the U.S. immigration experience that can turn dreams into
                            reality. Join our clients, and change your life, and your family’s life
                            forever!</p>
                    </div>
                </div>
            </div>

            <div class="row about-margin">
                <div class="card flex-container">
                    <div class="col-md-2 col-xs-12">
                        <img src="/img/why_choose_us.jpg" alt="" class="about-img"></div>
                    <div class="col-md-9 col-xs-12 about-text-body">
                        <h2 class="wt wth">WHY CHOOSE US</h2>
                        <p class="wt">There are many companies that offer immigration services but many,
                            if not all, do not fully satisfy their clients and charge an outrageous
                            amount of money for their services. We will offer you prime, top of the line
                            service, and for a fair price. We use state of the art technology to make
                            sure our clients are registered with the US government via the Diversity Visa
                            program during the proper enrollment period. We GUARANTEE our service and if
                            we cannot enroll you on time for the Diversity Visa lottery program then we
                            will give you a full refund!</p>
                    </div>
                </div>
            </div>

            <div class="row about-margin">
                <div class="card flex-container">
                    <div class="col-md-2 col-xs-12">
                        <img src="/img/our_mission.jpg" alt="" class="about-img"></div>
                    <div class="col-md-9 col-xs-12 about-text-body">
                        <h2 class="wt wth">OUR MISSION</h2>
                        <p class="wt">Our mission is to be dedicated, honest, and committed to our
                            clients and to provide them with the best service possible. If our clients
                            are satisfied, then we have done our job properly and only then will our
                            mission be complete.</p>
                    </div>
                </div>
            </div>

            <div class="row about-margin">
                <div class="card flex-container">
                    <div class="col-md-2 col-xs-12">
                        <img src="/img/what_we_do.jpg" alt="" class="about-img"></div>
                    <div class="col-md-9 col-xs-12 about-text-body">
                        <h2 class="wt wth">WHAT WE DO</h2>
                        <p class="wt">We offer our clients registration with the Diversity Visa program
                            that is operated by the United States. We help give our clients the chance to
                            become US citizens! Every year the US has a lottery and grants tens of
                            thousands of lucky registrant’s that have been selected in the lottery a visa
                            to live in the US! Once they get the US DV Visa they can move to the US and
                            live there legally! They will then in time be granted citizenship!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="contact-us" class="contact-block flex-container">
        <div class="container"><a name="contact"></a>
            <div class="row">
                <div class="col-md12 block-title">
                    <h2>Contact Us</h2>
                    <?php echo Html::a('', '#contact-us'); ?>
                </div>
            </div>
            <div class="row  margin28">
                <div class="contact-content">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <p>If you have any questions or need specific assistance please do not hesitate to contact
                            us.<br>
                            You can reach us by email at
                            <a href="#"><?php echo Yii::$app->params['contactEmail']; ?></a>.<br>
                            You can also call us at <?php echo Yii::$app->params['contactPhone'] ?>.<br>
                            If you prefer using paper-mail you can write to our headquarters located at <br>
                            <?php echo Yii::$app->params['contactAddress']; ?>
                        </p>
                        <p>You can also use the form below.</p>
                    </div>
                </div>
            </div>

            <?php $form = ActiveForm::begin([
                'fieldConfig' => [
                    'inputOptions' => ['class' => ''],
                ]
            ]); ?>
            <div class="row  margin28">
                <div class="col-md-8 col-md-offset-2">
                    <div class="col-md-6">
                        <?php echo $form->field($contactUsModel, 'firstName', ['inputOptions' => ['placeholder' => 'First Name']]); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $form->field($contactUsModel, 'lastName', ['inputOptions' => ['placeholder' => 'Last Name']])
                            ->label('Not visible', ['class' => 'label-hidden']); ?>
                    </div>
                </div>
            </div>
            <div class="row  margin28">
                <div class="col-md-8 col-md-offset-2">
                    <div class="col-md-6">
                        <?php echo $form->field($contactUsModel, 'email', ['inputOptions' => ['placeholder' => 'example@website.com']]); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $form->field($contactUsModel, 'phone', ['inputOptions' => ['placeholder' => '(xxx) xxx xxxx']]);
                        //->widget(MaskedInput::className(), [
                        //    'mask'    => '+7 (999) 999 99 99',
                        //    'options' => [
                        //        'class' => ''
                        //    ]
                        //]);
                        ?>
                    </div>
                </div>
            </div>
            <div class="row  margin28">
                <div class="col-md-8 col-md-offset-2">
                    <div class="col-md-12">
                        <?php echo $form->field($contactUsModel, 'message', ['inputOptions' => ['placeholder' => 'Input message here.']])->textarea([
                            'class' => 'contact-us',
                            'rows' => 8,
                            'col' => 40
                        ]); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-right">
                    <div class="col-md-12 text-center">
                        <button class="btn-contact">Submit</button>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <div class="container-fluid prf">
        <div class="row">
            <div class="prefooter text-center">
                <p><strong>Disclaimer:</strong> USA Immigrations Organization is a private company and is
                    not affiliated with any Government or Embassy.</p>
                <p>USA Immigrations Organization is owned and operated by Wipranik Enterprise LLC</p>
            </div>
        </div>
    </div>

</div>