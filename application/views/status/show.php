<?php
/**
 * Created by PhpStorm.
 * User: junko
 * Date: 2014/05/04
 * Time: 20:25
 */
$this->setLayoutVar('title', $status['user_name']); ?>
<?php echo $this->render('status/status', array('status' => $status)); ?>