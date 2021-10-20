<?php
//Add read more
$post = '<p>' . preg_replace('[<!--more-->]', '<span class="rmore">Read more...</span><span class="moretext">', $p) . '</span></p>';
echo $post;
?>