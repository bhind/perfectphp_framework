<?php
/**
 * Created by PhpStorm.
 * User: bhind
 * Date: 2014/05/02
 * Time: 19:31
 */
?>
<div class="status">
    <div class="status_contetnt">
        <a href="<?php echo $base_url; ?>/user/<?php echo $this->escape($status['user_name']); ?>">
            <?php echo $this->escape($status['user_name']); ?>
        </a>
        <?php echo $this->escape($status['body']); ?>
    </div>
    <div>
        <a href="<?php echo $base_url; ?>/user/<?php echo $this->escape($status['user_name']);
        ?>/status/<?php echo $this->escape($status['id']); ?>">
            <?php echo $this->escape($status['created_at']); ?>
        </a>
    </div>
</div>
