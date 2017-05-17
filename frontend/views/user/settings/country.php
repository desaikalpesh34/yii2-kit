<?php
/**
 * @var yii\web\View $this
 * @var \app\models\Profile $model
 */
use app\components\constants\Constants;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('user', 'Profile settings');
?>

<div class="ui form ctr">

    <h2>Country of Eligibility</h2>
    <?php $form = ActiveForm::begin() ?>
    <div class="content ui segment">
        <div class="yourcountry">
            <h3>Select your country of birth:</h3>


            <div class="ui fluid search selection dropdown your-country field">
                <input type="hidden" name="your_country">
                <i class="dropdown icon"></i>
                <input class="search" tabindex="0">
                <div class="<?php if ( ! Constants::isInCountryList($model->country_of_birth)) echo "default"; ?> text"><?php echo ( ! empty($model->country_of_birth) && Constants::isInCountryList($model->country_of_birth)) ? Constants::getCountryFlagHtml($model->country_of_birth) . $model->country_of_birth : 'Select Country'; ?></div>
                <div class="menu" tabindex="-1">
                    <div class="item user-country" data-value="Afghanistan"><i class="af flag"></i>Afghanistan</div>
                    <div class="item user-country" data-value="Albania"><i class="al flag"></i>Albania</div>
                    <div class="item user-country" data-value="Algeria"><i class="dz flag"></i>Algeria</div>
                    <div class="item user-country" data-value="Andorra"><i class="ad flag"></i>Andorra</div>
                    <div class="item user-country" data-value="Angola"><i class="ao flag"></i>Angola</div>
                    <div class="item user-country" data-value="Antigua and Barbuda">
                        <i class="ag flag"></i>Antigua and Barbuda
                    </div>
                    <div class="item user-country" data-value="Argentina"><i class="ar flag"></i>Argentina</div>
                    <div class="item user-country" data-value="Armenia"><i class="am flag"></i>Armenia</div>
                    <div class="item user-country" data-value="Australia"><i class="au flag"></i>Australia</div>
                    <div class="item user-country" data-value="Austria"><i class="at flag"></i>Austria</div>
                    <div class="item user-country" data-value="Azerbaijan"><i class="az flag"></i>Azerbaijan</div>
                    <div class="item user-country" data-value="Bahamas"><i class="bs flag"></i>Bahamas</div>
                    <div class="item user-country" data-value="Bahrain"><i class="bh flag"></i>Bahrain</div>
                    <div class="item user-country" data-value="Barbados"><i class="bb flag"></i>Barbados</div>
                    <div class="item user-country" data-value="Belarus"><i class="by flag"></i>Belarus</div>
                    <div class="item user-country" data-value="Belgium"><i class="be flag"></i>Belgium</div>
                    <div class="item user-country" data-value="Belize"><i class="bz flag"></i>Belize</div>
                    <div class="item user-country" data-value="Benin"><i class="bj flag"></i>Benin</div>
                    <div class="item user-country" data-value="Bhutan"><i class="bt flag"></i>Bhutan</div>
                    <div class="item user-country" data-value="Bolivia"><i class="bo flag"></i>Bolivia</div>
                    <div class="item user-country" data-value="Bosnia and Herzegovina">
                        <i class="ba flag"></i>Bosnia and Herzegovina
                    </div>
                    <div class="item user-country" data-value="Botswana"><i class="bw flag"></i>Botswana</div>
                    <div class="item user-country" data-value="Brunei"><i class="bn flag"></i>Brunei</div>
                    <div class="item user-country" data-value="Bulgaria"><i class="bg flag"></i>Bulgaria</div>
                    <div class="item user-country" data-value="Burkina Faso"><i class="bf flag"></i>Burkina Faso</div>
                    <div class="item user-country" data-value="Burma"><i class="ar flag"></i>Burma</div>
                    <div class="item user-country" data-value="Burundi"><i class="bi flag"></i>Burundi</div>
                    <div class="item user-country" data-value="Cambodia"><i class="kh flag"></i>Cambodia</div>
                    <div class="item user-country" data-value="Cameroon"><i class="cm flag"></i>Cameroon</div>
                    <div class="item user-country" data-value="Cape Verde"><i class="cv flag"></i>Cape Verde</div>
                    <div class="item user-country" data-value="Central African Republic">
                        <i class="cf flag"></i>Central African Republic
                    </div>
                    <div class="item user-country" data-value="Chad"><i class="td flag"></i>Chad</div>
                    <div class="item user-country" data-value="Chile"><i class="cl flag"></i>Chile</div>
                    <div class="item user-country" data-value="Comoros"><i class="km flag"></i>Comoros</div>
                    <div class="item user-country" data-value="Congo, Democratic Republic of the">
                        <i class="cg flag"></i>Congo, Democratic Republic of the
                    </div>
                    <div class="item user-country" data-value="Congo"><i class="cd flag"></i>Congo</div>
                    <div class="item user-country" data-value="Costa Rica"><i class="cr flag"></i>Costa Rica</div>
                    <div class="item user-country" data-value="Cote D’Ivoire (Ivory Coast)">
                        <i class="ci flag"></i>Cote D’Ivoire (Ivory Coast)
                    </div>
                    <div class="item user-country" data-value="Croatia"><i class="hr flag"></i>Croatia</div>
                    <div class="item user-country" data-value="Cuba"><i class="cu flag"></i>Cuba</div>
                    <div class="item user-country" data-value="Cyprus"><i class="cy flag"></i>Cyprus</div>
                    <div class="item user-country" data-value="Czech Republic"><i class="cz flag"></i>Czech Republic
                    </div>
                    <div class="item user-country" data-value="Denmark"><i class="dk flag"></i>Denmark</div>
                    <div class="item user-country" data-value="Djibouti"><i class="dj flag"></i>Djibouti</div>
                    <div class="item user-country" data-value="Dominica"><i class="dm flag"></i>Dominica</div>
                    <div class="item user-country" data-value="Egypt"><i class="eg flag"></i>Egypt</div>
                    <div class="item user-country" data-value="Equatorial Guinea">
                        <i class="gq flag"></i>Equatorial Guinea
                    </div>
                    <div class="item user-country" data-value="Eritrea"><i class="er flag"></i>Eritrea</div>
                    <div class="item user-country" data-value="Estonia"><i class="ee flag"></i>Estonia</div>
                    <div class="item user-country" data-value="Ethiopia"><i class="et flag"></i>Ethiopia</div>
                    <div class="item user-country" data-value="Fiji"><i class="fj flag"></i>Fiji</div>
                    <div class="item user-country" data-value="Finland"><i class="fi flag"></i>Finland</div>
                    <div class="item user-country" data-value="France"><i class="fr flag"></i>France</div>
                    <div class="item user-country" data-value="Gabon"><i class="ga flag"></i>Gabon</div>
                    <div class="item user-country" data-value="Gambia"><i class="gm flag"></i>Gambia</div>
                    <div class="item user-country" data-value="Gaza Stripaza"><i class=""></i>Gaza Strip</div>
                    <div class="item user-country" data-value="Georgia"><i class="ge flag"></i>Georgia</div>
                    <div class="item user-country" data-value="Germany"><i class="de flag"></i>Germany</div>
                    <div class="item user-country" data-value="Ghana"><i class="gh flag"></i>Ghana</div>
                    <div class="item user-country" data-value="Golan Heightslan"><i class=""></i>Golan Heights</div>
                    <div class="item user-country" data-value="Greece"><i class="gr flag"></i>Greece</div>
                    <div class="item user-country" data-value="Grenada"><i class="gd flag"></i>Grenada</div>
                    <div class="item user-country" data-value="Guatemala"><i class="gt flag"></i>Guatemala</div>
                    <div class="item user-country" data-value="Guinea-Bissau"><i class="gw flag"></i>Guinea-Bissau</div>
                    <div class="item user-country" data-value="Guinea"><i class="gn flag"></i>Guinea</div>
                    <div class="item user-country" data-value="Guyana"><i class="gy flag"></i>Guyana</div>
                    <div class="item user-country" data-value="Honduras"><i class="hn flag"></i>Honduras</div>
                    <div class="item user-country" data-value="Hong Kong Special Administrative Region">
                        <i class="hk flag"></i>Hong Kong Special Administrative Region
                    </div>
                    <div class="item user-country" data-value="Hungary"><i class="hu flag"></i>Hungary</div>
                    <div class="item user-country" data-value="Iceland"><i class="is flag"></i>Iceland</div>
                    <div class="item user-country" data-value="Indonesia"><i class="id flag"></i>Indonesia</div>
                    <div class="item user-country" data-value="Iran"><i class="ir flag"></i>Iran</div>
                    <div class="item user-country" data-value="Iraq"><i class="iq flag"></i>Iraq</div>
                    <div class="item user-country" data-value="Ireland"><i class="ie flag"></i>Ireland</div>
                    <div class="item user-country" data-value="Israel"><i class="il flag"></i>Israel</div>
                    <div class="item user-country" data-value="Italy"><i class="it flag"></i>Italy</div>
                    <div class="item user-country" data-value="Japan"><i class="jp flag"></i>Japan</div>
                    <div class="item user-country" data-value="Jordan"><i class="jo flag"></i>Jordan</div>
                    <div class="item user-country" data-value="Kazakhstan"><i class="kz flag"></i>Kazakhstan</div>
                    <div class="item user-country" data-value="Kenya"><i class="ke flag"></i>Kenya</div>
                    <div class="item user-country" data-value="Kiribati"><i class="ki flag"></i>Kiribati</div>
                    <div class="item user-country" data-value="Kosovokos"><i class=""></i>Kosovo</div>
                    <div class="item user-country" data-value="Kuwait"><i class="kw flag"></i>Kuwait</div>
                    <div class="item user-country" data-value="Kyrgyzstan"><i class="kg flag"></i>Kyrgyzstan</div>
                    <div class="item user-country" data-value="Laos"><i class="la flag"></i>Laos</div>
                    <div class="item user-country" data-value="Latvia"><i class="lv flag"></i>Latvia</div>
                    <div class="item user-country" data-value="Lebanon"><i class="lb flag"></i>Lebanon</div>
                    <div class="item user-country" data-value="Lesotho"><i class="ls flag"></i>Lesotho</div>
                    <div class="item user-country" data-value="Liberia"><i class="lr flag"></i>Liberia</div>
                    <div class="item user-country" data-value="Libya"><i class="ly flag"></i>Libya</div>
                    <div class="item user-country" data-value="Liechtenstein"><i class="li flag"></i>Liechtenstein</div>
                    <div class="item user-country" data-value="Lithuania"><i class="lt flag"></i>Lithuania</div>
                    <div class="item user-country" data-value="Luxembourg"><i class="lu flag"></i>Luxembourg</div>
                    <div class="item user-country" data-value="Macau Special Administrative Region">
                        <i class="mo flag"></i>Macau Special Administrative Region
                    </div>
                    <div class="item user-country" data-value="Macedonia"><i class="mk flag"></i>Macedonia</div>
                    <div class="item user-country" data-value="Madagascar"><i class="mg flag"></i>Madagascar</div>
                    <div class="item user-country" data-value="Malawi"><i class="mw flag"></i>Malawi</div>
                    <div class="item user-country" data-value="Malaysia"><i class="my flag"></i>Malaysia</div>
                    <div class="item user-country" data-value="Maldives"><i class="mv flag"></i>Maldives</div>
                    <div class="item user-country" data-value="Mali"><i class="ml flag"></i>Mali</div>
                    <div class="item user-country" data-value="Malta"><i class="mt flag"></i>Malta</div>
                    <div class="item user-country" data-value="Marshall Islands"><i class="mh flag"></i>Marshall Islands
                    </div>
                    <div class="item user-country" data-value="Mauritania"><i class="mr flag"></i>Mauritania</div>
                    <div class="item user-country" data-value="Mauritius"><i class="mu flag"></i>Mauritius</div>
                    <div class="item user-country" data-value="Micronesia, Federated States of">
                        <i class="fm flag"></i>Micronesia, Federated States of
                    </div>
                    <div class="item user-country" data-value="Moldova"><i class="md flag"></i>Moldova</div>
                    <div class="item user-country" data-value="Monaco"><i class="mc flag"></i>Monaco</div>
                    <div class="item user-country" data-value="Mongolia"><i class="mn flag"></i>Mongolia</div>
                    <div class="item user-country" data-value="Montenegro"><i class="me flag"></i>Montenegro</div>
                    <div class="item user-country" data-value="Morocco"><i class="ma flag"></i>Morocco</div>
                    <div class="item user-country" data-value="Mozambique"><i class="mz flag"></i>Mozambique</div>
                    <div class="item user-country" data-value="Namibia"><i class="na flag"></i>Namibia</div>
                    <div class="item user-country" data-value="Nauru"><i class="nr flag"></i>Nauru</div>
                    <div class="item user-country" data-value="Nepal"><i class="np flag"></i>Nepal</div>
                    <div class="item user-country" data-value="Netherlands"><i class="nl flag"></i>Netherlands</div>
                    <div class="item user-country" data-value="New Zealand"><i class="nz flag"></i>New Zealand</div>
                    <div class="item user-country" data-value="Nicaragua"><i class="ni flag"></i>Nicaragua</div>
                    <div class="item user-country" data-value="Niger"><i class="ne flag"></i>Niger</div>
                    <div class="item user-country" data-value="North Korea"><i class="kp flag"></i>North Korea</div>
                    <div class="item user-country" data-value="Northern Ireland"><i class="ie flag"></i>Northern Ireland
                    </div>
                    <div class="item user-country" data-value="Norway"><i class="no flag"></i>Norway</div>
                    <div class="item user-country" data-value="Oman"><i class="om flag"></i>Oman</div>
                    <div class="item user-country" data-value="Palau"><i class="pw flag"></i>Palau</div>
                    <div class="item user-country" data-value="Panama"><i class="pa flag"></i>Panama</div>
                    <div class="item user-country" data-value="Papua New Guinea"><i class="pg flag"></i>Papua New Guinea
                    </div>
                    <div class="item user-country" data-value="Paraguay"><i class="py flag"></i>Paraguay</div>
                    <div class="item user-country" data-value="Poland"><i class="pl flag"></i>Poland</div>
                    <div class="item user-country" data-value="Portugal"><i class="pt flag"></i>Portugal</div>
                    <div class="item user-country" data-value="Qatar"><i class="qa flag"></i>Qatar</div>
                    <div class="item user-country" data-value="Romania"><i class="ro flag"></i>Romania</div>
                    <div class="item user-country" data-value="Russia"><i class="ru flag"></i>Russia</div>
                    <div class="item user-country" data-value="Rwanda"><i class="rw flag"></i>Rwanda</div>
                    <div class="item user-country" data-value="Saint Kitts and Nevis">
                        <i class="kn flag"></i>Saint Kitts and Nevis
                    </div>
                    <div class="item user-country" data-value="Saint Lucia"><i class="lc flag"></i>Saint Lucia</div>
                    <div class="item user-country" data-value="Saint Pierre"><i class="pm flag"></i>Saint Pierre</div>
                    <div class="item user-country" data-value="Saint Vincent and the Grenadines">
                        <i class="vc flag"></i>Saint Vincent and the Grenadines
                    </div>
                    <div class="item user-country" data-value="Samoa"><i class="ws flag"></i>Samoa</div>
                    <div class="item user-country" data-value="San Marino"><i class="sm flag"></i>San Marino</div>
                    <div class="item user-country" data-value="Sao Tome and Principe">
                        <i class="st flag"></i>Sao Tome and Principe
                    </div>
                    <div class="item user-country" data-value="Saudi Arabia"><i class="sa flag"></i>Saudi Arabia</div>
                    <div class="item user-country" data-value="Senegal"><i class="sn flag"></i>Senegal</div>
                    <div class="item user-country" data-value="Serbia"><i class="cs flag"></i>Serbia</div>
                    <div class="item user-country" data-value="Seychelles"><i class="sc flag"></i>Seychelles</div>
                    <div class="item user-country" data-value="Sierra Leone"><i class="sl flag"></i>Sierra Leone</div>
                    <div class="item user-country" data-value="Singapore"><i class="sg flag"></i>Singapore</div>
                    <div class="item user-country" data-value="Slovakia"><i class="sk flag"></i>Slovakia</div>
                    <div class="item user-country" data-value="Slovenia"><i class="si flag"></i>Slovenia</div>
                    <div class="item user-country" data-value="Solomon Islands"><i class="sb flag"></i>Solomon Islands
                    </div>
                    <div class="item user-country" data-value="Somalia"><i class="so flag"></i>Somalia</div>
                    <div class="item user-country" data-value="South Africa"><i class="za flag"></i>South Africa</div>
                    <div class="item user-country" data-value="South Sudan"><i class="sd flag"></i>South Sudan</div>
                    <div class="item user-country" data-value="Spain"><i class="es flag"></i>Spain</div>
                    <div class="item user-country" data-value="Sri Lanka"><i class="lk flag"></i>Sri Lanka</div>
                    <div class="item user-country" data-value="Sudan"><i class="sd flag"></i>Sudan</div>
                    <div class="item user-country" data-value="Suriname"><i class="sr flag"></i>Suriname</div>
                    <div class="item user-country" data-value="Swaziland"><i class="sz flag"></i>Swaziland</div>
                    <div class="item user-country" data-value="Sweden"><i class="se flag"></i>Sweden</div>
                    <div class="item user-country" data-value="Switzerland"><i class="ch flag"></i>Switzerland</div>
                    <div class="item user-country" data-value="Syria"><i class="sy flag"></i>Syria</div>
                    <div class="item user-country" data-value="Taiwan"><i class="tw flag"></i>Taiwan</div>
                    <div class="item user-country" data-value="Tajikistan"><i class="tj flag"></i>Tajikistan</div>
                    <div class="item user-country" data-value="Tanzania"><i class="tz flag"></i>Tanzania</div>
                    <div class="item user-country" data-value="Thailand"><i class="th flag"></i>Thailand</div>
                    <div class="item user-country" data-value="Timor-Leste"><i class="tl flag"></i>Timor-Leste</div>
                    <div class="item user-country" data-value="Togo"><i class="tg flag"></i>Togo</div>
                    <div class="item user-country" data-value="Tonga"><i class="to flag"></i>Tonga</div>
                    <div class="item user-country" data-value="Trinidad and Tobago">
                        <i class="tt flag"></i>Trinidad and Tobago
                    </div>
                    <div class="item user-country" data-value="Tunisia"><i class="tn flag"></i>Tunisia</div>
                    <div class="item user-country" data-value="Turkey"><i class="tr flag"></i>Turkey</div>
                    <div class="item user-country" data-value="Turkmenistan"><i class="tm flag"></i>Turkmenistan</div>
                    <div class="item user-country" data-value="Tuvalu"><i class="tv flag"></i>Tuvalu</div>
                    <div class="item user-country" data-value="Uganda"><i class="ug flag"></i>Uganda</div>
                    <div class="item user-country" data-value="Ukraine"><i class="ua flag"></i>Ukraine</div>
                    <div class="item user-country" data-value="United Arab Emirates">
                        <i class="ae flag"></i>United Arab Emirates
                    </div>
                    <div class="item user-country" data-value="Uruguay"><i class="uy flag"></i>Uruguay</div>
                    <div class="item user-country" data-value="Uzbekistan"><i class="uz flag"></i>Uzbekistan</div>
                    <div class="item user-country" data-value="Vanuatu"><i class="vu flag"></i>Vanuatu</div>
                    <div class="item user-country" data-value="Vatican City"><i class="va flag"></i>Vatican City</div>
                    <div class="item user-country" data-value="Venezuela"><i class="ve flag"></i>Venezuela</div>
                    <div class="item user-country" data-value="Yemen"><i class="ye flag"></i>Yemen</div>
                    <div class="item user-country" data-value="Zambia"><i class="zm flag"></i>Zambia</div>
                    <div class="item user-country" data-value="Zimbabwe"><i class="zw flag"></i>Zimbabwe</div>
                </div>
            </div> <!-- dropdown end -->

            <h4 class="cf-01">If you cannot find your country of birth in the list, <a href="#" class="cant-find-user">click
                    here.</a></h4>
        </div>

        <div class="mar-block inactive">
            <div class="alert alert-success">
                Since you are married, you can use your spouse’s country of birth to register for the Green Card
                Lottery. If you win the Green Card, you must enter the United States together at the same time.
            </div>

            <h3>Select your spouse's country of birth:</h3>
            <div class="ui fluid search selection dropdown your-country field">
                <input type="hidden" name="spouse_country">
                <i class="dropdown icon"></i>
                <input class="search" tabindex="0">
                <div class="<?php if ( ! Constants::isInCountryList($model->spouse_country_of_birth)) echo "default"; ?> text"><?php echo ( ! empty($model->spouse_country_of_birth) && Constants::isInCountryList($model->spouse_country_of_birth)) ? Constants::getCountryFlagHtml($model->spouse_country_of_birth) . $model->spouse_country_of_birth : 'Select Country'; ?></div>
                <div class="menu" tabindex="-1">
                    <div class="item rel-country" data-value="Afghanistan"><i class="af flag"></i>Afghanistan</div>
                    <div class="item rel-country" data-value="Albania"><i class="al flag"></i>Albania</div>
                    <div class="item rel-country" data-value="Algeria"><i class="dz flag"></i>Algeria</div>
                    <div class="item rel-country" data-value="Andorra"><i class="ad flag"></i>Andorra</div>
                    <div class="item rel-country" data-value="Angola"><i class="ao flag"></i>Angola</div>
                    <div class="item rel-country" data-value="Antigua and Barbuda">
                        <i class="ag flag"></i>Antigua and Barbuda
                    </div>
                    <div class="item rel-country" data-value="Argentina"><i class="ar flag"></i>Argentina</div>
                    <div class="item rel-country" data-value="Armenia"><i class="am flag"></i>Armenia</div>
                    <div class="item rel-country" data-value="Australia"><i class="au flag"></i>Australia</div>
                    <div class="item rel-country" data-value="Austria"><i class="at flag"></i>Austria</div>
                    <div class="item rel-country" data-value="Azerbaijan"><i class="az flag"></i>Azerbaijan</div>
                    <div class="item rel-country" data-value="Bahamas"><i class="bs flag"></i>Bahamas</div>
                    <div class="item rel-country" data-value="Bahrain"><i class="bh flag"></i>Bahrain</div>
                    <div class="item rel-country" data-value="Barbados"><i class="bb flag"></i>Barbados</div>
                    <div class="item rel-country" data-value="Belarus"><i class="by flag"></i>Belarus</div>
                    <div class="item rel-country" data-value="Belgium"><i class="be flag"></i>Belgium</div>
                    <div class="item rel-country" data-value="Belize"><i class="bz flag"></i>Belize</div>
                    <div class="item rel-country" data-value="Benin"><i class="bj flag"></i>Benin</div>
                    <div class="item rel-country" data-value="Bhutan"><i class="bt flag"></i>Bhutan</div>
                    <div class="item rel-country" data-value="Bolivia"><i class="bo flag"></i>Bolivia</div>
                    <div class="item rel-country" data-value="Bosnia and Herzegovina">
                        <i class="ba flag"></i>Bosnia and Herzegovina
                    </div>
                    <div class="item rel-country" data-value="Botswana"><i class="bw flag"></i>Botswana</div>
                    <div class="item rel-country" data-value="Brunei"><i class="bn flag"></i>Brunei</div>
                    <div class="item rel-country" data-value="Bulgaria"><i class="bg flag"></i>Bulgaria</div>
                    <div class="item rel-country" data-value="Burkina Faso"><i class="bf flag"></i>Burkina Faso</div>
                    <div class="item rel-country" data-value="Burma"><i class="ar flag"></i>Burma</div>
                    <div class="item rel-country" data-value="Burundi"><i class="bi flag"></i>Burundi</div>
                    <div class="item rel-country" data-value="Cambodia"><i class="kh flag"></i>Cambodia</div>
                    <div class="item rel-country" data-value="Cameroon"><i class="cm flag"></i>Cameroon</div>
                    <div class="item rel-country" data-value="Cape Verde"><i class="cv flag"></i>Cape Verde</div>
                    <div class="item rel-country" data-value="Central African Republic">
                        <i class="cf flag"></i>Central African Republic
                    </div>
                    <div class="item rel-country" data-value="Chad"><i class="td flag"></i>Chad</div>
                    <div class="item rel-country" data-value="Chile"><i class="cl flag"></i>Chile</div>
                    <div class="item rel-country" data-value="Comoros"><i class="km flag"></i>Comoros</div>
                    <div class="item rel-country" data-value="Congo, Democratic Republic of the">
                        <i class="cg flag"></i>Congo, Democratic Republic of the
                    </div>
                    <div class="item rel-country" data-value="Congo"><i class="cd flag"></i>Congo</div>
                    <div class="item rel-country" data-value="Costa Rica"><i class="cr flag"></i>Costa Rica</div>
                    <div class="item rel-country" data-value="Cote D’Ivoire (Ivory Coast)">
                        <i class="ci flag"></i>Cote D’Ivoire (Ivory Coast)
                    </div>
                    <div class="item rel-country" data-value="Croatia"><i class="hr flag"></i>Croatia</div>
                    <div class="item rel-country" data-value="Cuba"><i class="cu flag"></i>Cuba</div>
                    <div class="item rel-country" data-value="Cyprus"><i class="cy flag"></i>Cyprus</div>
                    <div class="item rel-country" data-value="Czech Republic"><i class="cz flag"></i>Czech Republic
                    </div>
                    <div class="item rel-country" data-value="Denmark"><i class="dk flag"></i>Denmark</div>
                    <div class="item rel-country" data-value="Djibouti"><i class="dj flag"></i>Djibouti</div>
                    <div class="item rel-country" data-value="Dominica"><i class="dm flag"></i>Dominica</div>
                    <div class="item rel-country" data-value="Egypt"><i class="eg flag"></i>Egypt</div>
                    <div class="item rel-country" data-value="Equatorial Guinea">
                        <i class="gq flag"></i>Equatorial Guinea
                    </div>
                    <div class="item rel-country" data-value="Eritrea"><i class="er flag"></i>Eritrea</div>
                    <div class="item rel-country" data-value="Estonia"><i class="ee flag"></i>Estonia</div>
                    <div class="item rel-country" data-value="Ethiopia"><i class="et flag"></i>Ethiopia</div>
                    <div class="item rel-country" data-value="Fiji"><i class="fj flag"></i>Fiji</div>
                    <div class="item rel-country" data-value="Finland"><i class="fi flag"></i>Finland</div>
                    <div class="item rel-country" data-value="France"><i class="fr flag"></i>France</div>
                    <div class="item rel-country" data-value="Gabon"><i class="ga flag"></i>Gabon</div>
                    <div class="item rel-country" data-value="Gambia"><i class="gm flag"></i>Gambia</div>
                    <div class="item rel-country" data-value="Gaza Stripaza"><i class=""></i>Gaza Strip</div>
                    <div class="item rel-country" data-value="Georgia"><i class="ge flag"></i>Georgia</div>
                    <div class="item rel-country" data-value="Germany"><i class="de flag"></i>Germany</div>
                    <div class="item rel-country" data-value="Ghana"><i class="gh flag"></i>Ghana</div>
                    <div class="item rel-country" data-value="Golan Heightslan"><i class=""></i>Golan Heights</div>
                    <div class="item rel-country" data-value="Greece"><i class="gr flag"></i>Greece</div>
                    <div class="item rel-country" data-value="Grenada"><i class="gd flag"></i>Grenada</div>
                    <div class="item rel-country" data-value="Guatemala"><i class="gt flag"></i>Guatemala</div>
                    <div class="item rel-country" data-value="Guinea-Bissau"><i class="gw flag"></i>Guinea-Bissau</div>
                    <div class="item rel-country" data-value="Guinea"><i class="gn flag"></i>Guinea</div>
                    <div class="item rel-country" data-value="Guyana"><i class="gy flag"></i>Guyana</div>
                    <div class="item rel-country" data-value="Honduras"><i class="hn flag"></i>Honduras</div>
                    <div class="item rel-country" data-value="Hong Kong Special Administrative Region">
                        <i class="hk flag"></i>Hong Kong Special Administrative Region
                    </div>
                    <div class="item rel-country" data-value="Hungary"><i class="hu flag"></i>Hungary</div>
                    <div class="item rel-country" data-value="Iceland"><i class="is flag"></i>Iceland</div>
                    <div class="item rel-country" data-value="Indonesia"><i class="id flag"></i>Indonesia</div>
                    <div class="item rel-country" data-value="Iran"><i class="ir flag"></i>Iran</div>
                    <div class="item rel-country" data-value="Iraq"><i class="iq flag"></i>Iraq</div>
                    <div class="item rel-country" data-value="Ireland"><i class="ie flag"></i>Ireland</div>
                    <div class="item rel-country" data-value="Israel"><i class="il flag"></i>Israel</div>
                    <div class="item rel-country" data-value="Italy"><i class="it flag"></i>Italy</div>
                    <div class="item rel-country" data-value="Japan"><i class="jp flag"></i>Japan</div>
                    <div class="item rel-country" data-value="Jordan"><i class="jo flag"></i>Jordan</div>
                    <div class="item rel-country" data-value="Kazakhstan"><i class="kz flag"></i>Kazakhstan</div>
                    <div class="item rel-country" data-value="Kenya"><i class="ke flag"></i>Kenya</div>
                    <div class="item rel-country" data-value="Kiribati"><i class="ki flag"></i>Kiribati</div>
                    <div class="item rel-country" data-value="Kosovokos"><i class=""></i>Kosovo</div>
                    <div class="item rel-country" data-value="Kuwait"><i class="kw flag"></i>Kuwait</div>
                    <div class="item rel-country" data-value="Kyrgyzstan"><i class="kg flag"></i>Kyrgyzstan</div>
                    <div class="item rel-country" data-value="Laos"><i class="la flag"></i>Laos</div>
                    <div class="item rel-country" data-value="Latvia"><i class="lv flag"></i>Latvia</div>
                    <div class="item rel-country" data-value="Lebanon"><i class="lb flag"></i>Lebanon</div>
                    <div class="item rel-country" data-value="Lesotho"><i class="ls flag"></i>Lesotho</div>
                    <div class="item rel-country" data-value="Liberia"><i class="lr flag"></i>Liberia</div>
                    <div class="item rel-country" data-value="Libya"><i class="ly flag"></i>Libya</div>
                    <div class="item rel-country" data-value="Liechtenstein"><i class="li flag"></i>Liechtenstein</div>
                    <div class="item rel-country" data-value="Lithuania"><i class="lt flag"></i>Lithuania</div>
                    <div class="item rel-country" data-value="Luxembourg"><i class="lu flag"></i>Luxembourg</div>
                    <div class="item rel-country" data-value="Macau Special Administrative Region">
                        <i class="mo flag"></i>Macau Special Administrative Region
                    </div>
                    <div class="item rel-country" data-value="Macedonia"><i class="mk flag"></i>Macedonia</div>
                    <div class="item rel-country" data-value="Madagascar"><i class="mg flag"></i>Madagascar</div>
                    <div class="item rel-country" data-value="Malawi"><i class="mw flag"></i>Malawi</div>
                    <div class="item rel-country" data-value="Malaysia"><i class="my flag"></i>Malaysia</div>
                    <div class="item rel-country" data-value="Maldives"><i class="mv flag"></i>Maldives</div>
                    <div class="item rel-country" data-value="Mali"><i class="ml flag"></i>Mali</div>
                    <div class="item rel-country" data-value="Malta"><i class="mt flag"></i>Malta</div>
                    <div class="item rel-country" data-value="Marshall Islands"><i class="mh flag"></i>Marshall Islands
                    </div>
                    <div class="item rel-country" data-value="Mauritania"><i class="mr flag"></i>Mauritania</div>
                    <div class="item rel-country" data-value="Mauritius"><i class="mu flag"></i>Mauritius</div>
                    <div class="item rel-country" data-value="Micronesia, Federated States of">
                        <i class="fm flag"></i>Micronesia, Federated States of
                    </div>
                    <div class="item rel-country" data-value="Moldova"><i class="md flag"></i>Moldova</div>
                    <div class="item rel-country" data-value="Monaco"><i class="mc flag"></i>Monaco</div>
                    <div class="item rel-country" data-value="Mongolia"><i class="mn flag"></i>Mongolia</div>
                    <div class="item rel-country" data-value="Montenegro"><i class="me flag"></i>Montenegro</div>
                    <div class="item rel-country" data-value="Morocco"><i class="ma flag"></i>Morocco</div>
                    <div class="item rel-country" data-value="Mozambique"><i class="mz flag"></i>Mozambique</div>
                    <div class="item rel-country" data-value="Namibia"><i class="na flag"></i>Namibia</div>
                    <div class="item rel-country" data-value="Nauru"><i class="nr flag"></i>Nauru</div>
                    <div class="item rel-country" data-value="Nepal"><i class="np flag"></i>Nepal</div>
                    <div class="item rel-country" data-value="Netherlands"><i class="nl flag"></i>Netherlands</div>
                    <div class="item rel-country" data-value="New Zealand"><i class="nz flag"></i>New Zealand</div>
                    <div class="item rel-country" data-value="Nicaragua"><i class="ni flag"></i>Nicaragua</div>
                    <div class="item rel-country" data-value="Niger"><i class="ne flag"></i>Niger</div>
                    <div class="item rel-country" data-value="North Korea"><i class="kp flag"></i>North Korea</div>
                    <div class="item rel-country" data-value="Northern Ireland"><i class="ie flag"></i>Northern Ireland
                    </div>
                    <div class="item rel-country" data-value="Norway"><i class="no flag"></i>Norway</div>
                    <div class="item rel-country" data-value="Oman"><i class="om flag"></i>Oman</div>
                    <div class="item rel-country" data-value="Palau"><i class="pw flag"></i>Palau</div>
                    <div class="item rel-country" data-value="Panama"><i class="pa flag"></i>Panama</div>
                    <div class="item rel-country" data-value="Papua New Guinea"><i class="pg flag"></i>Papua New Guinea
                    </div>
                    <div class="item rel-country" data-value="Paraguay"><i class="py flag"></i>Paraguay</div>
                    <div class="item rel-country" data-value="Poland"><i class="pl flag"></i>Poland</div>
                    <div class="item rel-country" data-value="Portugal"><i class="pt flag"></i>Portugal</div>
                    <div class="item rel-country" data-value="Qatar"><i class="qa flag"></i>Qatar</div>
                    <div class="item rel-country" data-value="Romania"><i class="ro flag"></i>Romania</div>
                    <div class="item rel-country" data-value="Russia"><i class="ru flag"></i>Russia</div>
                    <div class="item rel-country" data-value="Rwanda"><i class="rw flag"></i>Rwanda</div>
                    <div class="item rel-country" data-value="Saint Kitts and Nevis">
                        <i class="kn flag"></i>Saint Kitts and Nevis
                    </div>
                    <div class="item rel-country" data-value="Saint Lucia"><i class="lc flag"></i>Saint Lucia</div>
                    <div class="item rel-country" data-value="Saint Pierre"><i class="pm flag"></i>Saint Pierre</div>
                    <div class="item rel-country" data-value="Saint Vincent and the Grenadines">
                        <i class="vc flag"></i>Saint Vincent and the Grenadines
                    </div>
                    <div class="item rel-country" data-value="Samoa"><i class="ws flag"></i>Samoa</div>
                    <div class="item rel-country" data-value="San Marino"><i class="sm flag"></i>San Marino</div>
                    <div class="item rel-country" data-value="Sao Tome and Principe">
                        <i class="st flag"></i>Sao Tome and Principe
                    </div>
                    <div class="item rel-country" data-value="Saudi Arabia"><i class="sa flag"></i>Saudi Arabia</div>
                    <div class="item rel-country" data-value="Senegal"><i class="sn flag"></i>Senegal</div>
                    <div class="item rel-country" data-value="Serbia"><i class="cs flag"></i>Serbia</div>
                    <div class="item rel-country" data-value="Seychelles"><i class="sc flag"></i>Seychelles</div>
                    <div class="item rel-country" data-value="Sierra Leone"><i class="sl flag"></i>Sierra Leone</div>
                    <div class="item rel-country" data-value="Singapore"><i class="sg flag"></i>Singapore</div>
                    <div class="item rel-country" data-value="Slovakia"><i class="sk flag"></i>Slovakia</div>
                    <div class="item rel-country" data-value="Slovenia"><i class="si flag"></i>Slovenia</div>
                    <div class="item rel-country" data-value="Solomon Islands"><i class="sb flag"></i>Solomon Islands
                    </div>
                    <div class="item rel-country" data-value="Somalia"><i class="so flag"></i>Somalia</div>
                    <div class="item rel-country" data-value="South Africa"><i class="za flag"></i>South Africa</div>
                    <div class="item rel-country" data-value="South Sudan"><i class="sd flag"></i>South Sudan</div>
                    <div class="item rel-country" data-value="Spain"><i class="es flag"></i>Spain</div>
                    <div class="item rel-country" data-value="Sri Lanka"><i class="lk flag"></i>Sri Lanka</div>
                    <div class="item rel-country" data-value="Sudan"><i class="sd flag"></i>Sudan</div>
                    <div class="item rel-country" data-value="Suriname"><i class="sr flag"></i>Suriname</div>
                    <div class="item rel-country" data-value="Swaziland"><i class="sz flag"></i>Swaziland</div>
                    <div class="item rel-country" data-value="Sweden"><i class="se flag"></i>Sweden</div>
                    <div class="item rel-country" data-value="Switzerland"><i class="ch flag"></i>Switzerland</div>
                    <div class="item rel-country" data-value="Syria"><i class="sy flag"></i>Syria</div>
                    <div class="item rel-country" data-value="Taiwan"><i class="tw flag"></i>Taiwan</div>
                    <div class="item rel-country" data-value="Tajikistan"><i class="tj flag"></i>Tajikistan</div>
                    <div class="item rel-country" data-value="Tanzania"><i class="tz flag"></i>Tanzania</div>
                    <div class="item rel-country" data-value="Thailand"><i class="th flag"></i>Thailand</div>
                    <div class="item rel-country" data-value="Timor-Leste"><i class="tl flag"></i>Timor-Leste</div>
                    <div class="item rel-country" data-value="Togo"><i class="tg flag"></i>Togo</div>
                    <div class="item rel-country" data-value="Tonga"><i class="to flag"></i>Tonga</div>
                    <div class="item rel-country" data-value="Trinidad and Tobago">
                        <i class="tt flag"></i>Trinidad and Tobago
                    </div>
                    <div class="item rel-country" data-value="Tunisia"><i class="tn flag"></i>Tunisia</div>
                    <div class="item rel-country" data-value="Turkey"><i class="tr flag"></i>Turkey</div>
                    <div class="item rel-country" data-value="Turkmenistan"><i class="tm flag"></i>Turkmenistan</div>
                    <div class="item rel-country" data-value="Tuvalu"><i class="tv flag"></i>Tuvalu</div>
                    <div class="item rel-country" data-value="Uganda"><i class="ug flag"></i>Uganda</div>
                    <div class="item rel-country" data-value="Ukraine"><i class="ua flag"></i>Ukraine</div>
                    <div class="item rel-country" data-value="United Arab Emirates">
                        <i class="ae flag"></i>United Arab Emirates
                    </div>
                    <div class="item rel-country" data-value="Uruguay"><i class="uy flag"></i>Uruguay</div>
                    <div class="item rel-country" data-value="Uzbekistan"><i class="uz flag"></i>Uzbekistan</div>
                    <div class="item rel-country" data-value="Vanuatu"><i class="vu flag"></i>Vanuatu</div>
                    <div class="item rel-country" data-value="Vatican City"><i class="va flag"></i>Vatican City</div>
                    <div class="item rel-country" data-value="Venezuela"><i class="ve flag"></i>Venezuela</div>
                    <div class="item rel-country" data-value="Yemen"><i class="ye flag"></i>Yemen</div>
                    <div class="item rel-country" data-value="Zambia"><i class="zm flag"></i>Zambia</div>
                    <div class="item rel-country" data-value="Zimbabwe"><i class="zw flag"></i>Zimbabwe</div>
                </div>
            </div> <!-- dropdown end -->

            <h4 class="cf-01">If you cannot find your spouse's country of birth in the list, <a href="#"
                                                                                                class="cant-find-wife">click
                    here.</a></h4>
        </div> <!-- end wife inactive -->


        <!--div class="parents inactive">
          <div class="father-born inactive">
            <h3 class="test father-born">Was your father born in your country of birth?</h3>
            <button class="ui primary button father-yes">Yes</button>
            <button class="ui primary button father-no">No</button>
          </div-->

        <div class="parents inactive">

            <div class="father-born">

                <h3 class="child_title">Was your father born in your country of birth?</h3>
                <div class="ui selection dropdown field" tabindex="0">
                    <input type="hidden" name="father_born">
                    <i class="dropdown icon"></i>
                    <div class="default text">Select</div>
                    <div class="menu" tabindex="-1">
                        <div class="item father-yes" data-value="fr_yes">Yes</div>
                        <div class="item father-no" data-value="fr_no">No</div>
                    </div>
                </div>

            </div>

        </div>


        <!--div class="father-resident inactive">
          <h3 class="test father-resident">Was your father a legal resident of your country of birth at the time of your birth? </h3>
          <button class="ui primary button father-res-yes">Yes</button>
          <button class="ui primary button father-res-no">No</button>
        </div-->

        <div class="father-resident inactive">
            <h3 class="child_title">Was your father a legal resident of your country of birth at the time of your
                birth?</h3>
            <div class="ui selection dropdown field" tabindex="0">
                <input type="hidden" name="father_resident">
                <i class="dropdown icon"></i>
                <div class="default text">Select</div>
                <div class="menu" tabindex="-1">
                    <div class="item father-res-yes" data-value="fr2_yes">Yes</div>
                    <div class="item father-res-no" data-value="fr2_no">No</div>
                </div>
            </div>
        </div>


        <div class="father-country inactive">

            <div class="alert alert-success">You can use your father’s country of birth to register for the Green Card
                Lottery!
            </div>


            <h3 class="test-03">
                Select your father's country of birth:
            </h3>


            <div class="ui fluid search selection dropdown father-country-selector field">
                <input type="hidden" name="father_country">
                <i class="dropdown icon"></i>
                <input class="search" tabindex="0">
                <div class="<?php if ( ! Constants::isInCountryList($model->father_country_of_birth)) echo "default"; ?> text"><?php echo ( ! empty($model->father_country_of_birth) && Constants::isInCountryList($model->father_country_of_birth)) ? Constants::getCountryFlagHtml($model->father_country_of_birth) . $model->father_country_of_birth : 'Select Country'; ?></div>
                <div class="menu" tabindex="-1">
                    <div class="item rel-country" data-value="Afghanistan"><i class="af flag"></i>Afghanistan</div>
                    <div class="item rel-country" data-value="Albania"><i class="al flag"></i>Albania</div>
                    <div class="item rel-country" data-value="Algeria"><i class="dz flag"></i>Algeria</div>
                    <div class="item rel-country" data-value="Andorra"><i class="ad flag"></i>Andorra</div>
                    <div class="item rel-country" data-value="Angola"><i class="ao flag"></i>Angola</div>
                    <div class="item rel-country" data-value="Antigua and Barbuda">
                        <i class="ag flag"></i>Antigua and Barbuda
                    </div>
                    <div class="item rel-country" data-value="Argentina"><i class="ar flag"></i>Argentina</div>
                    <div class="item rel-country" data-value="Armenia"><i class="am flag"></i>Armenia</div>
                    <div class="item rel-country" data-value="Australia"><i class="au flag"></i>Australia</div>
                    <div class="item rel-country" data-value="Austria"><i class="at flag"></i>Austria</div>
                    <div class="item rel-country" data-value="Azerbaijan"><i class="az flag"></i>Azerbaijan</div>
                    <div class="item rel-country" data-value="Bahamas"><i class="bs flag"></i>Bahamas</div>
                    <div class="item rel-country" data-value="Bahrain"><i class="bh flag"></i>Bahrain</div>
                    <div class="item rel-country" data-value="Barbados"><i class="bb flag"></i>Barbados</div>
                    <div class="item rel-country" data-value="Belarus"><i class="by flag"></i>Belarus</div>
                    <div class="item rel-country" data-value="Belgium"><i class="be flag"></i>Belgium</div>
                    <div class="item rel-country" data-value="Belize"><i class="bz flag"></i>Belize</div>
                    <div class="item rel-country" data-value="Benin"><i class="bj flag"></i>Benin</div>
                    <div class="item rel-country" data-value="Bhutan"><i class="bt flag"></i>Bhutan</div>
                    <div class="item rel-country" data-value="Bolivia"><i class="bo flag"></i>Bolivia</div>
                    <div class="item rel-country" data-value="Bosnia and Herzegovina">
                        <i class="ba flag"></i>Bosnia and Herzegovina
                    </div>
                    <div class="item rel-country" data-value="Botswana"><i class="bw flag"></i>Botswana</div>
                    <div class="item rel-country" data-value="Brunei"><i class="bn flag"></i>Brunei</div>
                    <div class="item rel-country" data-value="Bulgaria"><i class="bg flag"></i>Bulgaria</div>
                    <div class="item rel-country" data-value="Burkina Faso"><i class="bf flag"></i>Burkina Faso</div>
                    <div class="item rel-country" data-value="Burma"><i class="ar flag"></i>Burma</div>
                    <div class="item rel-country" data-value="Burundi"><i class="bi flag"></i>Burundi</div>
                    <div class="item rel-country" data-value="Cambodia"><i class="kh flag"></i>Cambodia</div>
                    <div class="item rel-country" data-value="Cameroon"><i class="cm flag"></i>Cameroon</div>
                    <div class="item rel-country" data-value="Cape Verde"><i class="cv flag"></i>Cape Verde</div>
                    <div class="item rel-country" data-value="Central African Republic">
                        <i class="cf flag"></i>Central African Republic
                    </div>
                    <div class="item rel-country" data-value="Chad"><i class="td flag"></i>Chad</div>
                    <div class="item rel-country" data-value="Chile"><i class="cl flag"></i>Chile</div>
                    <div class="item rel-country" data-value="Comoros"><i class="km flag"></i>Comoros</div>
                    <div class="item rel-country" data-value="Congo, Democratic Republic of the">
                        <i class="cg flag"></i>Congo, Democratic Republic of the
                    </div>
                    <div class="item rel-country" data-value="Congo"><i class="cd flag"></i>Congo</div>
                    <div class="item rel-country" data-value="Costa Rica"><i class="cr flag"></i>Costa Rica</div>
                    <div class="item rel-country" data-value="Cote D’Ivoire (Ivory Coast)">
                        <i class="ci flag"></i>Cote D’Ivoire (Ivory Coast)
                    </div>
                    <div class="item rel-country" data-value="Croatia"><i class="hr flag"></i>Croatia</div>
                    <div class="item rel-country" data-value="Cuba"><i class="cu flag"></i>Cuba</div>
                    <div class="item rel-country" data-value="Cyprus"><i class="cy flag"></i>Cyprus</div>
                    <div class="item rel-country" data-value="Czech Republic"><i class="cz flag"></i>Czech Republic
                    </div>
                    <div class="item rel-country" data-value="Denmark"><i class="dk flag"></i>Denmark</div>
                    <div class="item rel-country" data-value="Djibouti"><i class="dj flag"></i>Djibouti</div>
                    <div class="item rel-country" data-value="Dominica"><i class="dm flag"></i>Dominica</div>
                    <div class="item rel-country" data-value="Egypt"><i class="eg flag"></i>Egypt</div>
                    <div class="item rel-country" data-value="Equatorial Guinea">
                        <i class="gq flag"></i>Equatorial Guinea
                    </div>
                    <div class="item rel-country" data-value="Eritrea"><i class="er flag"></i>Eritrea</div>
                    <div class="item rel-country" data-value="Estonia"><i class="ee flag"></i>Estonia</div>
                    <div class="item rel-country" data-value="Ethiopia"><i class="et flag"></i>Ethiopia</div>
                    <div class="item rel-country" data-value="Fiji"><i class="fj flag"></i>Fiji</div>
                    <div class="item rel-country" data-value="Finland"><i class="fi flag"></i>Finland</div>
                    <div class="item rel-country" data-value="France"><i class="fr flag"></i>France</div>
                    <div class="item rel-country" data-value="Gabon"><i class="ga flag"></i>Gabon</div>
                    <div class="item rel-country" data-value="Gambia"><i class="gm flag"></i>Gambia</div>
                    <div class="item rel-country" data-value="Gaza Stripaza"><i class=""></i>Gaza Strip</div>
                    <div class="item rel-country" data-value="Georgia"><i class="ge flag"></i>Georgia</div>
                    <div class="item rel-country" data-value="Germany"><i class="de flag"></i>Germany</div>
                    <div class="item rel-country" data-value="Ghana"><i class="gh flag"></i>Ghana</div>
                    <div class="item rel-country" data-value="Golan Heightslan"><i class=""></i>Golan Heights</div>
                    <div class="item rel-country" data-value="Greece"><i class="gr flag"></i>Greece</div>
                    <div class="item rel-country" data-value="Grenada"><i class="gd flag"></i>Grenada</div>
                    <div class="item rel-country" data-value="Guatemala"><i class="gt flag"></i>Guatemala</div>
                    <div class="item rel-country" data-value="Guinea-Bissau"><i class="gw flag"></i>Guinea-Bissau</div>
                    <div class="item rel-country" data-value="Guinea"><i class="gn flag"></i>Guinea</div>
                    <div class="item rel-country" data-value="Guyana"><i class="gy flag"></i>Guyana</div>
                    <div class="item rel-country" data-value="Honduras"><i class="hn flag"></i>Honduras</div>
                    <div class="item rel-country" data-value="Hong Kong Special Administrative Region">
                        <i class="hk flag"></i>Hong Kong Special Administrative Region
                    </div>
                    <div class="item rel-country" data-value="Hungary"><i class="hu flag"></i>Hungary</div>
                    <div class="item rel-country" data-value="Iceland"><i class="is flag"></i>Iceland</div>
                    <div class="item rel-country" data-value="Indonesia"><i class="id flag"></i>Indonesia</div>
                    <div class="item rel-country" data-value="Iran"><i class="ir flag"></i>Iran</div>
                    <div class="item rel-country" data-value="Iraq"><i class="iq flag"></i>Iraq</div>
                    <div class="item rel-country" data-value="Ireland"><i class="ie flag"></i>Ireland</div>
                    <div class="item rel-country" data-value="Israel"><i class="il flag"></i>Israel</div>
                    <div class="item rel-country" data-value="Italy"><i class="it flag"></i>Italy</div>
                    <div class="item rel-country" data-value="Japan"><i class="jp flag"></i>Japan</div>
                    <div class="item rel-country" data-value="Jordan"><i class="jo flag"></i>Jordan</div>
                    <div class="item rel-country" data-value="Kazakhstan"><i class="kz flag"></i>Kazakhstan</div>
                    <div class="item rel-country" data-value="Kenya"><i class="ke flag"></i>Kenya</div>
                    <div class="item rel-country" data-value="Kiribati"><i class="ki flag"></i>Kiribati</div>
                    <div class="item rel-country" data-value="Kosovokos"><i class=""></i>Kosovo</div>
                    <div class="item rel-country" data-value="Kuwait"><i class="kw flag"></i>Kuwait</div>
                    <div class="item rel-country" data-value="Kyrgyzstan"><i class="kg flag"></i>Kyrgyzstan</div>
                    <div class="item rel-country" data-value="Laos"><i class="la flag"></i>Laos</div>
                    <div class="item rel-country" data-value="Latvia"><i class="lv flag"></i>Latvia</div>
                    <div class="item rel-country" data-value="Lebanon"><i class="lb flag"></i>Lebanon</div>
                    <div class="item rel-country" data-value="Lesotho"><i class="ls flag"></i>Lesotho</div>
                    <div class="item rel-country" data-value="Liberia"><i class="lr flag"></i>Liberia</div>
                    <div class="item rel-country" data-value="Libya"><i class="ly flag"></i>Libya</div>
                    <div class="item rel-country" data-value="Liechtenstein"><i class="li flag"></i>Liechtenstein</div>
                    <div class="item rel-country" data-value="Lithuania"><i class="lt flag"></i>Lithuania</div>
                    <div class="item rel-country" data-value="Luxembourg"><i class="lu flag"></i>Luxembourg</div>
                    <div class="item rel-country" data-value="Macau Special Administrative Region">
                        <i class="mo flag"></i>Macau Special Administrative Region
                    </div>
                    <div class="item rel-country" data-value="Macedonia"><i class="mk flag"></i>Macedonia</div>
                    <div class="item rel-country" data-value="Madagascar"><i class="mg flag"></i>Madagascar</div>
                    <div class="item rel-country" data-value="Malawi"><i class="mw flag"></i>Malawi</div>
                    <div class="item rel-country" data-value="Malaysia"><i class="my flag"></i>Malaysia</div>
                    <div class="item rel-country" data-value="Maldives"><i class="mv flag"></i>Maldives</div>
                    <div class="item rel-country" data-value="Mali"><i class="ml flag"></i>Mali</div>
                    <div class="item rel-country" data-value="Malta"><i class="mt flag"></i>Malta</div>
                    <div class="item rel-country" data-value="Marshall Islands"><i class="mh flag"></i>Marshall Islands
                    </div>
                    <div class="item rel-country" data-value="Mauritania"><i class="mr flag"></i>Mauritania</div>
                    <div class="item rel-country" data-value="Mauritius"><i class="mu flag"></i>Mauritius</div>
                    <div class="item rel-country" data-value="Micronesia, Federated States of">
                        <i class="fm flag"></i>Micronesia, Federated States of
                    </div>
                    <div class="item rel-country" data-value="Moldova"><i class="md flag"></i>Moldova</div>
                    <div class="item rel-country" data-value="Monaco"><i class="mc flag"></i>Monaco</div>
                    <div class="item rel-country" data-value="Mongolia"><i class="mn flag"></i>Mongolia</div>
                    <div class="item rel-country" data-value="Montenegro"><i class="me flag"></i>Montenegro</div>
                    <div class="item rel-country" data-value="Morocco"><i class="ma flag"></i>Morocco</div>
                    <div class="item rel-country" data-value="Mozambique"><i class="mz flag"></i>Mozambique</div>
                    <div class="item rel-country" data-value="Namibia"><i class="na flag"></i>Namibia</div>
                    <div class="item rel-country" data-value="Nauru"><i class="nr flag"></i>Nauru</div>
                    <div class="item rel-country" data-value="Nepal"><i class="np flag"></i>Nepal</div>
                    <div class="item rel-country" data-value="Netherlands"><i class="nl flag"></i>Netherlands</div>
                    <div class="item rel-country" data-value="New Zealand"><i class="nz flag"></i>New Zealand</div>
                    <div class="item rel-country" data-value="Nicaragua"><i class="ni flag"></i>Nicaragua</div>
                    <div class="item rel-country" data-value="Niger"><i class="ne flag"></i>Niger</div>
                    <div class="item rel-country" data-value="North Korea"><i class="kp flag"></i>North Korea</div>
                    <div class="item rel-country" data-value="Northern Ireland"><i class="ie flag"></i>Northern Ireland
                    </div>
                    <div class="item rel-country" data-value="Norway"><i class="no flag"></i>Norway</div>
                    <div class="item rel-country" data-value="Oman"><i class="om flag"></i>Oman</div>
                    <div class="item rel-country" data-value="Palau"><i class="pw flag"></i>Palau</div>
                    <div class="item rel-country" data-value="Panama"><i class="pa flag"></i>Panama</div>
                    <div class="item rel-country" data-value="Papua New Guinea"><i class="pg flag"></i>Papua New Guinea
                    </div>
                    <div class="item rel-country" data-value="Paraguay"><i class="py flag"></i>Paraguay</div>
                    <div class="item rel-country" data-value="Poland"><i class="pl flag"></i>Poland</div>
                    <div class="item rel-country" data-value="Portugal"><i class="pt flag"></i>Portugal</div>
                    <div class="item rel-country" data-value="Qatar"><i class="qa flag"></i>Qatar</div>
                    <div class="item rel-country" data-value="Romania"><i class="ro flag"></i>Romania</div>
                    <div class="item rel-country" data-value="Russia"><i class="ru flag"></i>Russia</div>
                    <div class="item rel-country" data-value="Rwanda"><i class="rw flag"></i>Rwanda</div>
                    <div class="item rel-country" data-value="Saint Kitts and Nevis">
                        <i class="kn flag"></i>Saint Kitts and Nevis
                    </div>
                    <div class="item rel-country" data-value="Saint Lucia"><i class="lc flag"></i>Saint Lucia</div>
                    <div class="item rel-country" data-value="Saint Pierre"><i class="pm flag"></i>Saint Pierre</div>
                    <div class="item rel-country" data-value="Saint Vincent and the Grenadines">
                        <i class="vc flag"></i>Saint Vincent and the Grenadines
                    </div>
                    <div class="item rel-country" data-value="Samoa"><i class="ws flag"></i>Samoa</div>
                    <div class="item rel-country" data-value="San Marino"><i class="sm flag"></i>San Marino</div>
                    <div class="item rel-country" data-value="Sao Tome and Principe">
                        <i class="st flag"></i>Sao Tome and Principe
                    </div>
                    <div class="item rel-country" data-value="Saudi Arabia"><i class="sa flag"></i>Saudi Arabia</div>
                    <div class="item rel-country" data-value="Senegal"><i class="sn flag"></i>Senegal</div>
                    <div class="item rel-country" data-value="Serbia"><i class="cs flag"></i>Serbia</div>
                    <div class="item rel-country" data-value="Seychelles"><i class="sc flag"></i>Seychelles</div>
                    <div class="item rel-country" data-value="Sierra Leone"><i class="sl flag"></i>Sierra Leone</div>
                    <div class="item rel-country" data-value="Singapore"><i class="sg flag"></i>Singapore</div>
                    <div class="item rel-country" data-value="Slovakia"><i class="sk flag"></i>Slovakia</div>
                    <div class="item rel-country" data-value="Slovenia"><i class="si flag"></i>Slovenia</div>
                    <div class="item rel-country" data-value="Solomon Islands"><i class="sb flag"></i>Solomon Islands
                    </div>
                    <div class="item rel-country" data-value="Somalia"><i class="so flag"></i>Somalia</div>
                    <div class="item rel-country" data-value="South Africa"><i class="za flag"></i>South Africa</div>
                    <div class="item rel-country" data-value="South Sudan"><i class="sd flag"></i>South Sudan</div>
                    <div class="item rel-country" data-value="Spain"><i class="es flag"></i>Spain</div>
                    <div class="item rel-country" data-value="Sri Lanka"><i class="lk flag"></i>Sri Lanka</div>
                    <div class="item rel-country" data-value="Sudan"><i class="sd flag"></i>Sudan</div>
                    <div class="item rel-country" data-value="Suriname"><i class="sr flag"></i>Suriname</div>
                    <div class="item rel-country" data-value="Swaziland"><i class="sz flag"></i>Swaziland</div>
                    <div class="item rel-country" data-value="Sweden"><i class="se flag"></i>Sweden</div>
                    <div class="item rel-country" data-value="Switzerland"><i class="ch flag"></i>Switzerland</div>
                    <div class="item rel-country" data-value="Syria"><i class="sy flag"></i>Syria</div>
                    <div class="item rel-country" data-value="Taiwan"><i class="tw flag"></i>Taiwan</div>
                    <div class="item rel-country" data-value="Tajikistan"><i class="tj flag"></i>Tajikistan</div>
                    <div class="item rel-country" data-value="Tanzania"><i class="tz flag"></i>Tanzania</div>
                    <div class="item rel-country" data-value="Thailand"><i class="th flag"></i>Thailand</div>
                    <div class="item rel-country" data-value="Timor-Leste"><i class="tl flag"></i>Timor-Leste</div>
                    <div class="item rel-country" data-value="Togo"><i class="tg flag"></i>Togo</div>
                    <div class="item rel-country" data-value="Tonga"><i class="to flag"></i>Tonga</div>
                    <div class="item rel-country" data-value="Trinidad and Tobago">
                        <i class="tt flag"></i>Trinidad and Tobago
                    </div>
                    <div class="item rel-country" data-value="Tunisia"><i class="tn flag"></i>Tunisia</div>
                    <div class="item rel-country" data-value="Turkey"><i class="tr flag"></i>Turkey</div>
                    <div class="item rel-country" data-value="Turkmenistan"><i class="tm flag"></i>Turkmenistan</div>
                    <div class="item rel-country" data-value="Tuvalu"><i class="tv flag"></i>Tuvalu</div>
                    <div class="item rel-country" data-value="Uganda"><i class="ug flag"></i>Uganda</div>
                    <div class="item rel-country" data-value="Ukraine"><i class="ua flag"></i>Ukraine</div>
                    <div class="item rel-country" data-value="United Arab Emirates">
                        <i class="ae flag"></i>United Arab Emirates
                    </div>
                    <div class="item rel-country" data-value="Uruguay"><i class="uy flag"></i>Uruguay</div>
                    <div class="item rel-country" data-value="Uzbekistan"><i class="uz flag"></i>Uzbekistan</div>
                    <div class="item rel-country" data-value="Vanuatu"><i class="vu flag"></i>Vanuatu</div>
                    <div class="item rel-country" data-value="Vatican City"><i class="va flag"></i>Vatican City</div>
                    <div class="item rel-country" data-value="Venezuela"><i class="ve flag"></i>Venezuela</div>
                    <div class="item rel-country" data-value="Yemen"><i class="ye flag"></i>Yemen</div>
                    <div class="item rel-country" data-value="Zambia"><i class="zm flag"></i>Zambia</div>
                    <div class="item rel-country" data-value="Zimbabwe"><i class="zw flag"></i>Zimbabwe</div>
                </div>
            </div> <!-- dropdown end -->
            <h4 class="cf-01">If you cannot find your father's country of birth in the list, <a href="#"
                                                                                                class="father-cant-find">click
                    here.</a></h4>
        </div>

        <div class="mother-born inactive">
            <!--h3 class="test mother-born">Was your mother born in your country of birth?</h3>
            <button class="ui primary button mother-yes">Yes</button>
            <button class="ui primary button mother-no">No</button-->

            <h3 class="child_title">Was your mother born in your country of birth?</h3>
            <div class="ui selection dropdown field" tabindex="0">
                <input type="hidden" name="mother_born">
                <i class="dropdown icon"></i>
                <div class="default text">Select</div>
                <div class="menu" tabindex="-1">
                    <div class="item mother-yes" data-value="mr_yes">Yes</div>
                    <div class="item mother-no" data-value="mr_no">No</div>
                </div>
            </div>


        </div>

        <div class="mother-resident inactive">
            <!--h3 class="test mother-resident">Was your mother a legal resident of your country of birth at the time of your birth? </h3>
            <button class="ui primary button mother-res-yes">Yes</button>
            <button class="ui primary button mother-res-no">No</button-->


            <h3 class="child_title">Was your mother a legal resident of your country of birth at the time of your
                birth?</h3>
            <div class="ui selection dropdown field" tabindex="0">
                <input type="hidden" name="mother_resident">
                <i class="dropdown icon"></i>
                <div class="default text">Select</div>
                <div class="menu" tabindex="-1">
                    <div class="item mother-res-yes" data-value="mr2_yes">Yes</div>
                    <div class="item mother-res-no" data-value="mr2_no">No</div>
                </div>
            </div>

        </div>

        <div class="mother-country inactive">

            <div class="alert alert-success">You can use your mother’s country of birth to register for the Green Card
                Lottery!
            </div>

            <h3 class="test-04">
                Select your mother's country of birth:
            </h3>


            <div class="ui fluid search selection dropdown mother-country-selector field">
                <input type="hidden" name="mother_country">
                <i class="dropdown icon"></i>
                <input class="search" tabindex="0">
                <div class="<?php if ( ! Constants::isInCountryList($model->father_country_of_birth)) echo "default"; ?> text"><?php echo ( ! empty($model->father_country_of_birth) && Constants::isInCountryList($model->father_country_of_birth)) ? Constants::getCountryFlagHtml($model->father_country_of_birth) . $model->father_country_of_birth : 'Select Country'; ?></div>
                <div class="menu" tabindex="-1">
                    <div class="item rel-country" data-value="Afghanistan"><i class="af flag"></i>Afghanistan</div>
                    <div class="item rel-country" data-value="Albania"><i class="al flag"></i>Albania</div>
                    <div class="item rel-country" data-value="Algeria"><i class="dz flag"></i>Algeria</div>
                    <div class="item rel-country" data-value="Andorra"><i class="ad flag"></i>Andorra</div>
                    <div class="item rel-country" data-value="Angola"><i class="ao flag"></i>Angola</div>
                    <div class="item rel-country" data-value="Antigua and Barbuda">
                        <i class="ag flag"></i>Antigua and Barbuda
                    </div>
                    <div class="item rel-country" data-value="Argentina"><i class="ar flag"></i>Argentina</div>
                    <div class="item rel-country" data-value="Armenia"><i class="am flag"></i>Armenia</div>
                    <div class="item rel-country" data-value="Australia"><i class="au flag"></i>Australia</div>
                    <div class="item rel-country" data-value="Austria"><i class="at flag"></i>Austria</div>
                    <div class="item rel-country" data-value="Azerbaijan"><i class="az flag"></i>Azerbaijan</div>
                    <div class="item rel-country" data-value="Bahamas"><i class="bs flag"></i>Bahamas</div>
                    <div class="item rel-country" data-value="Bahrain"><i class="bh flag"></i>Bahrain</div>
                    <div class="item rel-country" data-value="Barbados"><i class="bb flag"></i>Barbados</div>
                    <div class="item rel-country" data-value="Belarus"><i class="by flag"></i>Belarus</div>
                    <div class="item rel-country" data-value="Belgium"><i class="be flag"></i>Belgium</div>
                    <div class="item rel-country" data-value="Belize"><i class="bz flag"></i>Belize</div>
                    <div class="item rel-country" data-value="Benin"><i class="bj flag"></i>Benin</div>
                    <div class="item rel-country" data-value="Bhutan"><i class="bt flag"></i>Bhutan</div>
                    <div class="item rel-country" data-value="Bolivia"><i class="bo flag"></i>Bolivia</div>
                    <div class="item rel-country" data-value="Bosnia and Herzegovina">
                        <i class="ba flag"></i>Bosnia and Herzegovina
                    </div>
                    <div class="item rel-country" data-value="Botswana"><i class="bw flag"></i>Botswana</div>
                    <div class="item rel-country" data-value="Brunei"><i class="bn flag"></i>Brunei</div>
                    <div class="item rel-country" data-value="Bulgaria"><i class="bg flag"></i>Bulgaria</div>
                    <div class="item rel-country" data-value="Burkina Faso"><i class="bf flag"></i>Burkina Faso</div>
                    <div class="item rel-country" data-value="Burma"><i class="ar flag"></i>Burma</div>
                    <div class="item rel-country" data-value="Burundi"><i class="bi flag"></i>Burundi</div>
                    <div class="item rel-country" data-value="Cambodia"><i class="kh flag"></i>Cambodia</div>
                    <div class="item rel-country" data-value="Cameroon"><i class="cm flag"></i>Cameroon</div>
                    <div class="item rel-country" data-value="Cape Verde"><i class="cv flag"></i>Cape Verde</div>
                    <div class="item rel-country" data-value="Central African Republic">
                        <i class="cf flag"></i>Central African Republic
                    </div>
                    <div class="item rel-country" data-value="Chad"><i class="td flag"></i>Chad</div>
                    <div class="item rel-country" data-value="Chile"><i class="cl flag"></i>Chile</div>
                    <div class="item rel-country" data-value="Comoros"><i class="km flag"></i>Comoros</div>
                    <div class="item rel-country" data-value="Congo, Democratic Republic of the">
                        <i class="cg flag"></i>Congo, Democratic Republic of the
                    </div>
                    <div class="item rel-country" data-value="Congo"><i class="cd flag"></i>Congo</div>
                    <div class="item rel-country" data-value="Costa Rica"><i class="cr flag"></i>Costa Rica</div>
                    <div class="item rel-country" data-value="Cote D’Ivoire (Ivory Coast)">
                        <i class="ci flag"></i>Cote D’Ivoire (Ivory Coast)
                    </div>
                    <div class="item rel-country" data-value="Croatia"><i class="hr flag"></i>Croatia</div>
                    <div class="item rel-country" data-value="Cuba"><i class="cu flag"></i>Cuba</div>
                    <div class="item rel-country" data-value="Cyprus"><i class="cy flag"></i>Cyprus</div>
                    <div class="item rel-country" data-value="Czech Republic"><i class="cz flag"></i>Czech Republic
                    </div>
                    <div class="item rel-country" data-value="Denmark"><i class="dk flag"></i>Denmark</div>
                    <div class="item rel-country" data-value="Djibouti"><i class="dj flag"></i>Djibouti</div>
                    <div class="item rel-country" data-value="Dominica"><i class="dm flag"></i>Dominica</div>
                    <div class="item rel-country" data-value="Egypt"><i class="eg flag"></i>Egypt</div>
                    <div class="item rel-country" data-value="Equatorial Guinea">
                        <i class="gq flag"></i>Equatorial Guinea
                    </div>
                    <div class="item rel-country" data-value="Eritrea"><i class="er flag"></i>Eritrea</div>
                    <div class="item rel-country" data-value="Estonia"><i class="ee flag"></i>Estonia</div>
                    <div class="item rel-country" data-value="Ethiopia"><i class="et flag"></i>Ethiopia</div>
                    <div class="item rel-country" data-value="Fiji"><i class="fj flag"></i>Fiji</div>
                    <div class="item rel-country" data-value="Finland"><i class="fi flag"></i>Finland</div>
                    <div class="item rel-country" data-value="France"><i class="fr flag"></i>France</div>
                    <div class="item rel-country" data-value="Gabon"><i class="ga flag"></i>Gabon</div>
                    <div class="item rel-country" data-value="Gambia"><i class="gm flag"></i>Gambia</div>
                    <div class="item rel-country" data-value="Gaza Stripaza"><i class=""></i>Gaza Strip</div>
                    <div class="item rel-country" data-value="Georgia"><i class="ge flag"></i>Georgia</div>
                    <div class="item rel-country" data-value="Germany"><i class="de flag"></i>Germany</div>
                    <div class="item rel-country" data-value="Ghana"><i class="gh flag"></i>Ghana</div>
                    <div class="item rel-country" data-value="Golan Heightslan"><i class=""></i>Golan Heights</div>
                    <div class="item rel-country" data-value="Greece"><i class="gr flag"></i>Greece</div>
                    <div class="item rel-country" data-value="Grenada"><i class="gd flag"></i>Grenada</div>
                    <div class="item rel-country" data-value="Guatemala"><i class="gt flag"></i>Guatemala</div>
                    <div class="item rel-country" data-value="Guinea-Bissau"><i class="gw flag"></i>Guinea-Bissau</div>
                    <div class="item rel-country" data-value="Guinea"><i class="gn flag"></i>Guinea</div>
                    <div class="item rel-country" data-value="Guyana"><i class="gy flag"></i>Guyana</div>
                    <div class="item rel-country" data-value="Honduras"><i class="hn flag"></i>Honduras</div>
                    <div class="item rel-country" data-value="Hong Kong Special Administrative Region">
                        <i class="hk flag"></i>Hong Kong Special Administrative Region
                    </div>
                    <div class="item rel-country" data-value="Hungary"><i class="hu flag"></i>Hungary</div>
                    <div class="item rel-country" data-value="Iceland"><i class="is flag"></i>Iceland</div>
                    <div class="item rel-country" data-value="Indonesia"><i class="id flag"></i>Indonesia</div>
                    <div class="item rel-country" data-value="Iran"><i class="ir flag"></i>Iran</div>
                    <div class="item rel-country" data-value="Iraq"><i class="iq flag"></i>Iraq</div>
                    <div class="item rel-country" data-value="Ireland"><i class="ie flag"></i>Ireland</div>
                    <div class="item rel-country" data-value="Israel"><i class="il flag"></i>Israel</div>
                    <div class="item rel-country" data-value="Italy"><i class="it flag"></i>Italy</div>
                    <div class="item rel-country" data-value="Japan"><i class="jp flag"></i>Japan</div>
                    <div class="item rel-country" data-value="Jordan"><i class="jo flag"></i>Jordan</div>
                    <div class="item rel-country" data-value="Kazakhstan"><i class="kz flag"></i>Kazakhstan</div>
                    <div class="item rel-country" data-value="Kenya"><i class="ke flag"></i>Kenya</div>
                    <div class="item rel-country" data-value="Kiribati"><i class="ki flag"></i>Kiribati</div>
                    <div class="item rel-country" data-value="Kosovokos"><i class=""></i>Kosovo</div>
                    <div class="item rel-country" data-value="Kuwait"><i class="kw flag"></i>Kuwait</div>
                    <div class="item rel-country" data-value="Kyrgyzstan"><i class="kg flag"></i>Kyrgyzstan</div>
                    <div class="item rel-country" data-value="Laos"><i class="la flag"></i>Laos</div>
                    <div class="item rel-country" data-value="Latvia"><i class="lv flag"></i>Latvia</div>
                    <div class="item rel-country" data-value="Lebanon"><i class="lb flag"></i>Lebanon</div>
                    <div class="item rel-country" data-value="Lesotho"><i class="ls flag"></i>Lesotho</div>
                    <div class="item rel-country" data-value="Liberia"><i class="lr flag"></i>Liberia</div>
                    <div class="item rel-country" data-value="Libya"><i class="ly flag"></i>Libya</div>
                    <div class="item rel-country" data-value="Liechtenstein"><i class="li flag"></i>Liechtenstein</div>
                    <div class="item rel-country" data-value="Lithuania"><i class="lt flag"></i>Lithuania</div>
                    <div class="item rel-country" data-value="Luxembourg"><i class="lu flag"></i>Luxembourg</div>
                    <div class="item rel-country" data-value="Macau Special Administrative Region">
                        <i class="mo flag"></i>Macau Special Administrative Region
                    </div>
                    <div class="item rel-country" data-value="Macedonia"><i class="mk flag"></i>Macedonia</div>
                    <div class="item rel-country" data-value="Madagascar"><i class="mg flag"></i>Madagascar</div>
                    <div class="item rel-country" data-value="Malawi"><i class="mw flag"></i>Malawi</div>
                    <div class="item rel-country" data-value="Malaysia"><i class="my flag"></i>Malaysia</div>
                    <div class="item rel-country" data-value="Maldives"><i class="mv flag"></i>Maldives</div>
                    <div class="item rel-country" data-value="Mali"><i class="ml flag"></i>Mali</div>
                    <div class="item rel-country" data-value="Malta"><i class="mt flag"></i>Malta</div>
                    <div class="item rel-country" data-value="Marshall Islands"><i class="mh flag"></i>Marshall Islands
                    </div>
                    <div class="item rel-country" data-value="Mauritania"><i class="mr flag"></i>Mauritania</div>
                    <div class="item rel-country" data-value="Mauritius"><i class="mu flag"></i>Mauritius</div>
                    <div class="item rel-country" data-value="Micronesia, Federated States of">
                        <i class="fm flag"></i>Micronesia, Federated States of
                    </div>
                    <div class="item rel-country" data-value="Moldova"><i class="md flag"></i>Moldova</div>
                    <div class="item rel-country" data-value="Monaco"><i class="mc flag"></i>Monaco</div>
                    <div class="item rel-country" data-value="Mongolia"><i class="mn flag"></i>Mongolia</div>
                    <div class="item rel-country" data-value="Montenegro"><i class="me flag"></i>Montenegro</div>
                    <div class="item rel-country" data-value="Morocco"><i class="ma flag"></i>Morocco</div>
                    <div class="item rel-country" data-value="Mozambique"><i class="mz flag"></i>Mozambique</div>
                    <div class="item rel-country" data-value="Namibia"><i class="na flag"></i>Namibia</div>
                    <div class="item rel-country" data-value="Nauru"><i class="nr flag"></i>Nauru</div>
                    <div class="item rel-country" data-value="Nepal"><i class="np flag"></i>Nepal</div>
                    <div class="item rel-country" data-value="Netherlands"><i class="nl flag"></i>Netherlands</div>
                    <div class="item rel-country" data-value="New Zealand"><i class="nz flag"></i>New Zealand</div>
                    <div class="item rel-country" data-value="Nicaragua"><i class="ni flag"></i>Nicaragua</div>
                    <div class="item rel-country" data-value="Niger"><i class="ne flag"></i>Niger</div>
                    <div class="item rel-country" data-value="North Korea"><i class="kp flag"></i>North Korea</div>
                    <div class="item rel-country" data-value="Northern Ireland"><i class="ie flag"></i>Northern Ireland
                    </div>
                    <div class="item rel-country" data-value="Norway"><i class="no flag"></i>Norway</div>
                    <div class="item rel-country" data-value="Oman"><i class="om flag"></i>Oman</div>
                    <div class="item rel-country" data-value="Palau"><i class="pw flag"></i>Palau</div>
                    <div class="item rel-country" data-value="Panama"><i class="pa flag"></i>Panama</div>
                    <div class="item rel-country" data-value="Papua New Guinea"><i class="pg flag"></i>Papua New Guinea
                    </div>
                    <div class="item rel-country" data-value="Paraguay"><i class="py flag"></i>Paraguay</div>
                    <div class="item rel-country" data-value="Poland"><i class="pl flag"></i>Poland</div>
                    <div class="item rel-country" data-value="Portugal"><i class="pt flag"></i>Portugal</div>
                    <div class="item rel-country" data-value="Qatar"><i class="qa flag"></i>Qatar</div>
                    <div class="item rel-country" data-value="Romania"><i class="ro flag"></i>Romania</div>
                    <div class="item rel-country" data-value="Russia"><i class="ru flag"></i>Russia</div>
                    <div class="item rel-country" data-value="Rwanda"><i class="rw flag"></i>Rwanda</div>
                    <div class="item rel-country" data-value="Saint Kitts and Nevis">
                        <i class="kn flag"></i>Saint Kitts and Nevis
                    </div>
                    <div class="item rel-country" data-value="Saint Lucia"><i class="lc flag"></i>Saint Lucia</div>
                    <div class="item rel-country" data-value="Saint Pierre"><i class="pm flag"></i>Saint Pierre</div>
                    <div class="item rel-country" data-value="Saint Vincent and the Grenadines">
                        <i class="vc flag"></i>Saint Vincent and the Grenadines
                    </div>
                    <div class="item rel-country" data-value="Samoa"><i class="ws flag"></i>Samoa</div>
                    <div class="item rel-country" data-value="San Marino"><i class="sm flag"></i>San Marino</div>
                    <div class="item rel-country" data-value="Sao Tome and Principe">
                        <i class="st flag"></i>Sao Tome and Principe
                    </div>
                    <div class="item rel-country" data-value="Saudi Arabia"><i class="sa flag"></i>Saudi Arabia</div>
                    <div class="item rel-country" data-value="Senegal"><i class="sn flag"></i>Senegal</div>
                    <div class="item rel-country" data-value="Serbia"><i class="cs flag"></i>Serbia</div>
                    <div class="item rel-country" data-value="Seychelles"><i class="sc flag"></i>Seychelles</div>
                    <div class="item rel-country" data-value="Sierra Leone"><i class="sl flag"></i>Sierra Leone</div>
                    <div class="item rel-country" data-value="Singapore"><i class="sg flag"></i>Singapore</div>
                    <div class="item rel-country" data-value="Slovakia"><i class="sk flag"></i>Slovakia</div>
                    <div class="item rel-country" data-value="Slovenia"><i class="si flag"></i>Slovenia</div>
                    <div class="item rel-country" data-value="Solomon Islands"><i class="sb flag"></i>Solomon Islands
                    </div>
                    <div class="item rel-country" data-value="Somalia"><i class="so flag"></i>Somalia</div>
                    <div class="item rel-country" data-value="South Africa"><i class="za flag"></i>South Africa</div>
                    <div class="item rel-country" data-value="South Sudan"><i class="sd flag"></i>South Sudan</div>
                    <div class="item rel-country" data-value="Spain"><i class="es flag"></i>Spain</div>
                    <div class="item rel-country" data-value="Sri Lanka"><i class="lk flag"></i>Sri Lanka</div>
                    <div class="item rel-country" data-value="Sudan"><i class="sd flag"></i>Sudan</div>
                    <div class="item rel-country" data-value="Suriname"><i class="sr flag"></i>Suriname</div>
                    <div class="item rel-country" data-value="Swaziland"><i class="sz flag"></i>Swaziland</div>
                    <div class="item rel-country" data-value="Sweden"><i class="se flag"></i>Sweden</div>
                    <div class="item rel-country" data-value="Switzerland"><i class="ch flag"></i>Switzerland</div>
                    <div class="item rel-country" data-value="Syria"><i class="sy flag"></i>Syria</div>
                    <div class="item rel-country" data-value="Taiwan"><i class="tw flag"></i>Taiwan</div>
                    <div class="item rel-country" data-value="Tajikistan"><i class="tj flag"></i>Tajikistan</div>
                    <div class="item rel-country" data-value="Tanzania"><i class="tz flag"></i>Tanzania</div>
                    <div class="item rel-country" data-value="Thailand"><i class="th flag"></i>Thailand</div>
                    <div class="item rel-country" data-value="Timor-Leste"><i class="tl flag"></i>Timor-Leste</div>
                    <div class="item rel-country" data-value="Togo"><i class="tg flag"></i>Togo</div>
                    <div class="item rel-country" data-value="Tonga"><i class="to flag"></i>Tonga</div>
                    <div class="item rel-country" data-value="Trinidad and Tobago">
                        <i class="tt flag"></i>Trinidad and Tobago
                    </div>
                    <div class="item rel-country" data-value="Tunisia"><i class="tn flag"></i>Tunisia</div>
                    <div class="item rel-country" data-value="Turkey"><i class="tr flag"></i>Turkey</div>
                    <div class="item rel-country" data-value="Turkmenistan"><i class="tm flag"></i>Turkmenistan</div>
                    <div class="item rel-country" data-value="Tuvalu"><i class="tv flag"></i>Tuvalu</div>
                    <div class="item rel-country" data-value="Uganda"><i class="ug flag"></i>Uganda</div>
                    <div class="item rel-country" data-value="Ukraine"><i class="ua flag"></i>Ukraine</div>
                    <div class="item rel-country" data-value="United Arab Emirates">
                        <i class="ae flag"></i>United Arab Emirates
                    </div>
                    <div class="item rel-country" data-value="Uruguay"><i class="uy flag"></i>Uruguay</div>
                    <div class="item rel-country" data-value="Uzbekistan"><i class="uz flag"></i>Uzbekistan</div>
                    <div class="item rel-country" data-value="Vanuatu"><i class="vu flag"></i>Vanuatu</div>
                    <div class="item rel-country" data-value="Vatican City"><i class="va flag"></i>Vatican City</div>
                    <div class="item rel-country" data-value="Venezuela"><i class="ve flag"></i>Venezuela</div>
                    <div class="item rel-country" data-value="Yemen"><i class="ye flag"></i>Yemen</div>
                    <div class="item rel-country" data-value="Zambia"><i class="zm flag"></i>Zambia</div>
                    <div class="item rel-country" data-value="Zimbabwe"><i class="zw flag"></i>Zimbabwe</div>
                </div>
            </div> <!-- dropdown end -->
            <h4 class="cf-01">If you cannot find your mother's country of birth in the list, <a href="#"
                                                                                                class="mother-cant-find">click
                    here.</a></h4>
        </div>


        <div class="alert alert-warning sorry inactive">Based on your input, you are unfortunately not eligible to
            register for the Green Card Lottery. <br>
            Please contact customer support for a full refund via email at <?php echo Yii::$app->params['contactEmail']; ?> <br>
            You can also contact customer support via telephone by dialing: <?php echo Yii::$app->params['contactPhone'] ?>
        </div>

    </div>

    <!--form class="ui form ctr" action="#" -->

    <div class="city inactive" id="city">
        <br>
        <h3 class="cf-1">Please fill in:</h3>
        <h4 class="cf-1">What city were you born in?</h4>
        <div class="ui input field">
            <input name="cityof" type="text" placeholder="Enter City of Birth" value="<?php echo $model->city_born_in; ?>">
        </div>
    </div>

    <div class="countr inactive" id="countr">
        <br>
        <h3 class="cf-1">Please fill in:</h3>
        <h4 class="cf-1">What country were you born in?</h4>
        <div class="ui input field">
            <input name="cofb" type="text" placeholder="Enter Country of Birth" value="<?php if ( ! Constants::isInCountryList($model->country_of_birth)) echo $model->country_of_birth; ?>">
        </div>

        <h4 class="cf-1">What city were you born in?</h4>
        <div class="ui input field">
            <input name="ciofb" type="text" placeholder="Enter City of Birth" value="<?php echo $model->city_born_in; ?>">
        </div>
    </div>

    <br>
    <div class="ui error message"></div>
    <?=Html::submitButton('Save', ['class' => 'ui primary button big'])?>
    <?=Html::submitButton('Save &amp; Continue', ['class' => 'ui primary button big', 'name' => 'continue'])?>
    <?=Html::submitButton('Reset', ['class' => 'ui red button big', 'name' => 'reset'])?>
    <?=Html::submitButton('', ['id' => 'are-you-leaving-modal', 'class' => 'hidden', 'name' => 'modal'])?>

    <?php ActiveForm::end(); ?>

</div>