<?php
$this->render('blocks/admin/header');
$this->render('blocks/admin/sidenav');
$this->render('blocks/admin/navbar', $sub_content);
$this->render($content, $sub_content);
$this->render('blocks/admin/setting');
$this->render('blocks/admin/script', $sub_content);
?>
