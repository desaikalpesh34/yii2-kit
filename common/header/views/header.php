<?php
/**
 * @var yii\web\View $this
 */
use kartik\icons\Icon;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var bool $scroll */
if ($scroll) {
    $this->registerJs(<<<JS
    $(function () {

  var screenSize = $(window).height();
  var scrollHeight = ( screenSize ) + 100;


  function comma(num) {
    var parts = num.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
};

    var fx = function fx() {
    $(".stat-number").each(function (i, el) {
        var data = parseInt(this.dataset.n, 10);
        var props = {
            "from": {
                "count": 0
            },
                "to": {
                "count": data
            }
        };
        $(props.from).animate(props.to, {
            duration: 1000 * 1,
            step: function (now, fx) {
                $(el).text(comma(Math.ceil(now)));
            },
            complete:function() {
                if (el.dataset.sym !== undefined) {
                  el.textContent = el.textContent.concat(el.dataset.sym)
                }
            }
        });
    });
    };


    var reset = function reset() {
        console.log($(this).scrollTop())
        if ($(this).scrollTop() > scrollHeight) {
            $(this).off("scroll");
          fx()
        }

    };

    $(window).on("scroll", reset);

    $('.bgwrapper').hover(function() {
      $(window).on('scroll', function() { //func goes here
        console.log('wowwwwwww');
        if ($(window).scrollTop() > 2) {
          $('.header').addClass('fixed-head');
        } else {
          $('.header').removeClass('fixed-head');
        }
      });
      /* var headOff = $('.header').offset();
      console.log('Franky');
      if (headOff.top == 0) {
        $('.header').removeClass('fixed-head');

      } else {
        $('.header').addClass('fixed-head');
      } */
    });



});

 $(function () {

  $(window).scroll(function(){
      if ($(window).scrollTop() > 2) {
        $('.header').addClass('fixed-head');
      } else {
        $('.header').removeClass('fixed-head');
      }
  });

  /* $('.header').on('click', function () {
    console.log( $('.header').offset() );
  }); */


});
JS
    );
}
?>

<div class="header-section clearfix">

    <div class="contaier header <?php echo $scroll ? '' : 'fixed-head'; ?>">

        <div class="row">
            <div class="col-md-12">
                <div class="logo">
                    <a href="<?php echo Url::home(); ?>">
                        <?php echo Html::img('@web/img/logo.png', ['alt' => Yii::$app->name, 'class' => 'logo-img']); ?>
                    </a>
                </div>
                <div class="menu-top full-menu">

                    <div class="menu-mainmenu-container">
                        <ul id="menu-mainmenu" class="menu">
                            <li id="menu-item-26"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26">
                                <a href="<?php echo Url::home(); ?>">Home</a>
                            </li>
                            <li id="menu-item-27"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27">
                                <a href="<?php echo Url::home(); ?>#services">Our Services</a>
                            </li>
                            <li id="menu-item-28"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-28">
                                <a href="<?php echo Url::home(); ?>#eligible">Eligibility Test</a>
                            </li>
                            <li id="menu-item-30"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-30">
                                <a href="<?php echo Url::home(); ?>#about">About Us</a>
                            </li>
                            <li id="menu-item-31"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-31">
                                <a href="<?php echo Url::home(); ?>#contact">Contact Us</a>
                            </li>
                            <?php
                            $menuItems = [];

                            if (Yii::$app->user->isGuest) {
                                $menuItems[] = [
                                    'url' => Url::to('/user/registration'),
                                    'label' => 'Register',
                                    'class' => 'menu-item-register'
                                ];

                                $menuItems[] = [
                                    'url' => Url::to('/user/login'),
                                    'label' => 'Login',
                                    'class' => 'menu-item-login'
                                ];
                            } elseif (Yii::$app->user->identity->isAdmin) {
                                $menuItems[] = [
                                    'url' => Url::to('/user/admin'),
                                    'label' => 'Admin'
                                ];
                            } else {
                                $menuItems[] = [
                                    'url' => Url::to('/user/settings/status'),
                                    'label' => 'Client portal',
                                    'class' => 'menu-item-register'
                                ];
                            }
                            if (!Yii::$app->user->isGuest) {
                                $menuItems[] = [
                                    'url' => Url::to('/user/logout'),
                                    'label' => 'Sign out',
                                    'dataMethod' => 'POST',
                                    'class' => 'menu-item-login'
                                ];

                            }

                            foreach ($menuItems as $item) {
                                $url = $item['url'];
                                $label = $item['label'];
                                $dataMethod = isset($item['dataMethod']) ? $item['dataMethod'] : 'GET';
                                $class = isset($item['class']) ? $item['class'] : '';

                                echo "<li class=\"menu-item menu-item-type-custom menu-item-object-custom $class\">
                                    <a href=\"$url\" data-method=\"$dataMethod\">$label</a>
                                </li>";
                            }
                            ?>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-languages">
                                <a href="#"><?php echo Icon::show('us') . '<span>English</span>'; ?></a>
                            </li>

                            <!--<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-languages">-->
                            <!--    <div class="dropdown">-->
                            <!--        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Languages-->
                            <!--            <b class="caret"></b></a>-->
                            <!--        --><?php
                            //        echo Dropdown::widget([
                            //            'items'        => [
                            //                [
                            //                    'label' => Icon::show('us') . 'English',
                            //                    'url'   => '/'
                            //                ],
                            //                ['label' => Icon::show('ru') . 'Russian', 'url' => '#'],
                            //            ],
                            //            'options'      => [
                            //                'class' => 'dropdown-menu dropdown-menu-right'
                            //            ],
                            //            'encodeLabels' => false
                            //        ]);
                            //        ?>
                            <!--    </div>-->
                            <!--</li>-->

                        </ul>
                    </div>
                    <img class="ham" src="<?php echo Url::base(); ?>/img/hamb.png" height="23px">
                </div>
            </div>
        </div>
    </div>
</div>