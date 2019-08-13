//modelo de looping para campos repetidores 
<html>
<div class="parceiros-box"> 
    <?php 
    if(have_rows('parceiros', 1153) ) : ?>

        <div class="parceiros">
            

        <?php
        while(have_rows('parceiros', 1153) ): the_row(); 

            // vars
            //
            $image = get_sub_field('logotipo', 1153);
            $title = get_sub_field('title', 1153);
            $facebook_url = get_sub_field('facebook_url', 1153);
            $instagram_url = get_sub_field('instagram_url', 1153);
            $blog_site_url = get_sub_field('blog_site_url', 1153);
            $twitter_url = get_sub_field('twitter_url', 1153);
            $youtube_url = get_sub_field('youtube_url', 1153);

            ?>

            <div class="container-parceiros">
                <div class="logo">
                    <img class="logo-parceiros" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                    </div>
            <div class="title-parceiros">
                <span><?php echo $title; ?></span>
                </div>
            <div class="container-redes">
                <div class="link-redes">
                        <div class="links">
            <?php if($blog_site_url ) : ?>
                            <span class="redes"><a href="<?php echo $blog_site_url; ?>"><i class="fa fa-mouse-pointer" aria-hidden="true"></i>Blog / Site</a>
                    </span>
            <?php endif; ?>
                        </div>
                    <div class="links">
            <?php if($facebook_url ) : ?>
                    <span class="redes"><a href="<?php echo $facebook_url; ?>">
                        <i class="fa fa-facebook-official" aria-hidden="true"></i>Facebook</a></span>
            <?php endif; ?>
                    </div>
                    <div class="links">
            <?php if($instagram_url ) : ?>
                    
                        <span class="redes"><a href="<?php echo $instagram_url; ?>">
                            <i class="fa fa-instagram" aria-hidden="true"></i>Instagram</a></span>
            <?php endif; ?>
                        </div>
                    <div class="links">
            <?php if($twitter_url ) : ?>
                    <span class="redes"><a href="<?php echo $twitter_url; ?>"> <i class="fa fa-twitter-official" aria-hidden="true"></i> Twitter</a></span>
            <?php endif; ?>
                        </div>
                    <div class="links">
            <?php if($youtube_url ) : ?>
                    <span class="redes"><a href="<?php echo $youtube_url; ?>"><i class="fa fa-youtube-official" aria-hidden="true"></i>Youtube</a></span>
            <?php endif; ?>
                        </div>

        </div>
                </div>
                </div>
        
            
        <?php endwhile;        
        ?>

    
            

    <?php endif; 
    ?>
        </div>
        </div>
        </html>
