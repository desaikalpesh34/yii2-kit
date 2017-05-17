<?php
namespace common\components\userMenu;

use frontend\models\Profile;
use Underscore\Types\Arrays;
use Yii;
use yii\base\Widget;
use yii\helpers\Url;

/**
 * {@inheritDoc}
 */
class UserMenu extends Widget
{
    protected $links;

    /**
     * @var array $filledPages
     */
    protected $filledPages;


    /**
     * {@inheritDoc}
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);

        $this->links = [
            'personal'    => Url::toRoute('settings/personal'),
            'spouse'      => Url::toRoute('settings/spouse'),
            'children'    => Url::toRoute('settings/children'),
            'country'     => Url::toRoute('settings/country'),
            'education'   => Url::toRoute('settings/education'),
            'photographs' => Url::toRoute('settings/photographs'),
        ];

        $this->filledPages = Yii::$app->user->identity->profile->getFilledPages();
    }


    /**
     * @param $alias
     *
     * @return bool
     * @throws \yii\base\InvalidConfigException
     */
    public function isActive($alias)
    {
        return $this->links[$alias] == \yii\helpers\Url::base() . '/' . Yii::$app->request->getPathInfo();
    }


    public function getCircle($page)
    {
        $circle = '';
        if ($this->filledPages[$page]) {
            return 'fa fa-check-circle';
        } elseif ($this->isActive($page)) {
            return 'fa fa-circle';
        } else {
            return 'fa fa-circle-thin';
        }
    }


    /**
     * {@inheritDoc}
     */
    public function run()
    {
        return $this->render('menu');
    }

}