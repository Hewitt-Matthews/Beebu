<?php

  $post_id = get_the_ID();
	$permalink = get_permalink($post_id);
	$title = get_the_title(); ?>

<div class="share">

  Share:

  <div class="icons">

    <a target="_blank" 
        href="https://www.facebook.com/sharer/sharer.php?u=<?= $permalink ?>"
        onclick="window.open(this.href, \'facebook-share\',\'width=580,height=296\');return false;">
        <span class=""><i class="fa-brands fa-facebook-f"></i></span>
    </a>
    
    <a target="_blank"
        href="http://twitter.com/share?text=<?= $title ?>&url=<?= $permalink ?>"
        onclick="window.open(this.href, \'twitter-share\', \'width=550,height=235\');return false;">
        <span class=""><i class="fa-brands fa-x-twitter"></i></span>
    </a>
   
    <a target="_blank" 
        href="https://www.linkedin.com/sharing/share-offsite/?url=<?= $permalink ?>"
        onclick="window.open(this.href, \'linkedin-share\', \'width=490,height=530\');return false;">
        <span class=""><i class="fa-brands fa-linkedin-in"></i></span>
    </a>

    <a target="_blank" 
        href="https://www.instagram.com/sharer.php?u=<?= $permalink ?>"
        onclick="window.open(this.href, 'instagram-share', 'width=580,height=296'); return false;">
        <span class=""><i class="fa-brands fa-instagram"></i></span>
    </a>
  
  </div>
  
</div>