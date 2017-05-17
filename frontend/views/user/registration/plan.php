<?php
/* @var $this \yii\web\View */
?>

<div class="container">
    <div class="reg-block clearfix">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="cir-container clearfix">
                    <div class="step-container">
                        <div class="circle text-center floatl s1 of">
                            <span class="of-num">1</span> of <span class="of-num">3</span>
                        </div>
                        <div class="step-text">
                            <span>Choose the Service</span>
                        </div>
                    </div>

                    <div class="step-container">
                        <div class="circle text-center floatl s1 of">
                            <span class="of-num">2</span>

                        </div>
                        <div class="step-text">
                            <span>Process Payment</span>
                        </div>
                    </div>

                    <div class="step-container">
                        <div class="circle text-center floatl s1 of">
                            <span class="of-num">3</span>

                        </div>
                        <div class="step-text">
                            <span>Register</span>
                        </div>
                    </div>

                </div>
            </div> <!-- circles end -->
        </div>
        <div class="row m40">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h2>Select you registration plan for the 2016 Green Card Lottery!</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="col-md-6">
                    <div class="card-1 text-center" id="single">
                        <div class="price-head">
                            <h2>Single</h2>
                            <p class="price">$180</p>
                        </div>

                        <p>Individual Registration</p>
                        <p>Guaranteed Entry into Green Card Lottery – or your money back!</p>
                        <p>Immediate Result Notification</p>
                        <p>Unlimited Customer Support</p>
                        <p>24/7 Personal Portal Access </p>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card-1 text-center" id="family">
                        <div class="price-head">
                            <h2>Family</h2>
                            <p class="price">$260</p>
                        </div>
                        <p>Full Family Registration</p>
                        <p>Guaranteed Entry into Green Card Lottery – or your money back!</p>
                        <p>Immediate Result Notification</p>
                        <p>Unlimited Customer Support</p>
                        <p>24/7 Personal Portal Access </p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="question married  inactive">
                    <h2>Just to confirm:</h2>
                    <h2 class="are-you-married">Are you married?</h2>
                    <button class="ui primary button married-yes">Yes</button>
                    <button class="ui primary button married-no">No</button>
                </div>

                <div class="question kids inactive">
                    <h2 class="do-you-have-kids">Do you have any children?</h2>
                    <button class="ui primary button kids-yes">Yes</button>
                    <button class="ui primary button kids-no">No</button>
                </div>

                <div class="alert alert-warning inactive" role="alert">
                    Please select the Family plan because if we register you as an individual while you
                    currently have a spouse
                    and/or children and you end up winning the Green Card Lottery, your case will be
                    disqualified at the time of
                    your visa interview and no visas will be issued to you or any of your family members.
                </div>

                <div class="alert alert-success inactive">
                    Alright, you are all set. You can continue with the Single registration plan!
                </div>

            </div>

        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <button class="huge ui button primary disabled" id="confirm">
                    Sign Up
                </button>
            </div>
        </div> <!-- end chosing plan -->
    </div>
</div>