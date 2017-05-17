<?php
/** @var app\models\User $user */
use yii\bootstrap\Modal;

$Parser = new PhpMimeMailParser\Parser();
$Parser->setText($user->registration_email);

$html = $Parser->getMessageBody('html');

echo $html;
?>
