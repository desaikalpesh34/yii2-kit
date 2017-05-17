<?php
use app\models\User;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<?php $form = ActiveForm::begin([
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
]) ?>
    <div class="reg-block clearfix">
        <div class="row">


            <div class="col-md-8 col-md-offset-2">
                <div class="cir-container clearfix">
                    <div class="step-container">
                        <div class="circle text-center floatl s1 of circle-finish">
                            <span class="of-num num-finished">1</span>
                        </div>
                        <div class="step-text">
                        <span class="finish-text">Choose the Service <i class="fa fa-check"
                                                                        aria-hidden="true"></i></span>
                        </div>
                    </div>

                    <div class="step-container">
                        <div class="circle text-center floatl s1 of">
                            <span class="of-num"><span class="of-num">2</span> of <span class="of-num">3</span></span>

                        </div>
                        <div class="step-text">
                            <span>Process Payment</span>
                        </div>
                    </div>

                    <div class="step-container">
                        <div class="circle text-center floatl s1 of">
                            3
                        </div>
                        <div class="step-text">
                            <span>Register</span>
                        </div>
                    </div>

                </div>
            </div> <!-- circles end -->
        </div>
        <div class="row m40">
            <div class="col-md-8 col-md-offset-2 paycard text-center">
                <?php if ($paymentPlan == User::FAMILY_PLAN) : ?>
                    <h2>Family Plan - $260</h2>
                <?php elseif ($paymentPlan == User::SINGLE_PLAN) : ?>
                    <h2>Single Plan - $180</h2>
                <?php else : ?>
                    <h2>Please, return back and choose your plan.</h2>
                <?php endif; ?>

                <h3 class="first">Please insert the email you would like to register with</h3>
                <div class="pay-wrapper ppwrap text-left">
                    <?php echo $form->field($emailModel, 'registrationEmail')->label(false); ?>
                </div>
                <h3 class="second">Select your preferred method of payment</h3>
            </div>
        </div>
        <div class="row">
            <div class="colm-md-12">
                <div class="pay-wrapper">
                    <div class="paycard">
                        <div class="payment_panel">
                            <h3>Credit / Debit Card</h3><img alt='Credit card logos' title='Credit card logos' src='//payments.intuit.com/payments/landing_pages/LB/default.jsp?c=VMAD&l=H&s=1&b=FFFFFF'/>
                        </div>
                        <div class="paymentmethod">

                            <!-- card -->
                            <!-- CREDIT CARD FORM STARTS HERE -->
                            <!--<div class="panel panel-default credit-card-box">-->
                            <!--    <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">-->
                            <!---->
                            <!--    <div class="panel-body">-->
                            <!--        <form role="form" id="payment-form" method="POST" action="javascript:void(0);"-->
                            <!--              novalidate="novalidate">-->
                            <!--            <div class="row">-->
                            <!--                <div class="col-xs-12">-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="cardNumber">CARD NUMBER</label>-->
                            <!--                        <div class="input-group">-->
                            <!--                            <input type="tel" class="form-control unknown" name="cardNumber"-->
                            <!--                                   placeholder="Valid Card Number" autocomplete="cc-number"-->
                            <!--                                   required="" autofocus="" aria-required="true">-->
                            <!--                            <span class="input-group-addon"><i class="fa fa-credit-card"-->
                            <!--                                                               aria-hidden="true"></i></span>-->
                            <!--                        </div>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--            <div class="row">-->
                            <!--                <div class="col-xs-7 col-md-7">-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span-->
                            <!--                                class="visible-xs-inline">EXP</span> DATE</label>-->
                            <!--                        <input type="tel" class="form-control" name="cardExpiry"-->
                            <!--                               placeholder="MM / YY" autocomplete="cc-exp" required=""-->
                            <!--                               aria-required="true">-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--                <div class="col-xs-5 col-md-5 pull-right">-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="cardCVC">CV CODE</label>-->
                            <!--                        <input type="tel" class="form-control" name="cardCVC" placeholder="CVC"-->
                            <!--                               autocomplete="cc-csc" required="" aria-required="true">-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--            <div class="row">-->
                            <!--                <div class="col-xs-12">-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="couponCode">CARD HOLDER FIRST NAME</label>-->
                            <!--                        <input type="text" class="form-control" name="holderFirstName">-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!---->
                            <!--            <div class="row">-->
                            <!--                <div class="col-xs-12">-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="couponCode">CARD HOLDER MIDDLE NAME</label>-->
                            <!--                        <input type="text" class="form-control" name="holderMiddleName">-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!---->
                            <!--            <div class="row">-->
                            <!--                <div class="col-xs-12">-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="couponCode">CARD HOLDER LAST NAME</label>-->
                            <!--                        <input type="text" class="form-control" name="holderLastName">-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->


                            <?php //echo $form->field($creditCardModel, 'email')?>
                            <!---->
                            <?php //echo Html::submitButton(Yii::t('user', 'Sign up'),
                            //    ['class' => 'btn btn-success btn-block', 'name' => 'credit-card'])?>


                            <!--            <div class="row">-->
                            <!--                <div class="col-xs-12">-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="email">EMAIL ADDRESS</label>-->
                            <!--                        <input type="text" class="form-control" name="email">-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!---->
                            <!--            <div class="row">-->
                            <!--                <div class="col-xs-12 theterms">-->
                            <!--                    <input type="checkbox" name="terms">-->
                            <!--                    <span>I agree with the <a target="_blank"-->
                            <!--                                              href="http://usaimmigrations.org/en/terms-of-use/">Terms of Use</a><span>-->
                            <!--  </span></span></div>-->
                            <!--            </div>-->
                            <!---->
                            <!--            <div class="row">-->
                            <!--                <div class="col-xs-12">-->
                            <!--                    <button class="subscribe btn btn-success btn-lg btn-block" type="button"-->
                            <!--                            disabled="">Submit-->
                            <!--                    </button>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--            <div class="row" style="display:none;">-->
                            <!--                <div class="col-xs-12">-->
                            <!--                    <p class="payment-errors"></p>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--        </form>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!-- CREDIT CARD FORM ENDS HERE -->


                        </div>
                    </div>

                </div>
                <div class="pay-wrapper ppwrap">
                    <div class="paypal">
                        <div class="payment_panel">

                            <?= Html::submitButton(Yii::t('user', ''), ['class' => 'reset-this', 'name' => 'paypal']) ?>

                            <!--<a href="--><?php //echo $paypalLink; ?><!--">-->
                            <!--<img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png"-->
                            <!--border="0" alt="PayPal Logo">-->
                            <!--</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>