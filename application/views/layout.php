<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" media="screen" href="/css/style.css" />
    <title><?php if(isset($title)): echo $this->escape($title) . ' - '; endif; ?>Mini Blog</title>
</head>
<body>
    <div id="header">
        <h1><a href="<?php echo $base_url; ?>/">Mini Blog</a></h1>
    </div>
    <div id="nav">
        <p>
            <?php if($session->isAuthenticated()): ?>
                <a href="<?php echo $base_url; ?>/">ホーム</a>
                <a href="<?php echo $base_url; ?>/account">アカウント</a>
            <?php else: ?>
                <a href="<?php echo $base_url; ?>/account/signin">ログイン</a>
                <a href="<?php echo $base_url; ?>/account/signup">アカウント登録</a>
            <?php endif; ?>
        </p>
    </div>
    <div id="main">
        <?php echo $_content; ?>
    </div>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: bhind
 * Date: 2014/04/29
 * Time: 23:05
 */ 