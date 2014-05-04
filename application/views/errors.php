<?php
/**
 * Created by PhpStorm.
 * User: bhind
 * Date: 2014/05/02
 * Time: 19:27
 */
?>
<ul class="error_list">
    <?php foreach($errors as $error): ?>
        <li><?php echo $this->escape($error); ?></li>
    <?php endforeach; ?>
</ul>
