
<div class="dots dot1"></div>
<div class="dots dot2"></div>
<div class="dots dot3"></div>





<section class="section intro  <?php if ($class): echo $class; endif; ?>">
    <div class="row">
        <div class="ball-wrapper ball --top --center">
            <div class="dottarget1"> <div class="dotted"></div></div>
        </div>

        <div class="col-6 md:col-12">
            <?php if ($img): ?>
                <div class="intro__img cover gs_reveal gs_reveal_fromLeft">
                    <img src="<?php echo $img;?>" alt="">
                </div>
            <?php endif; ?>
            
            <?php if ($map): ?>
                <div class="contact__map-wrapper gs_reveal gs_reveal_fromLeft">
                    <div class="contact__map">
                        <!-- map here -->
                        <img src="<?php echo $map;?>" alt="">
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-6 md:col-12 intro__content">
            <div class="intro__content__top">
                <?php if ($topTitle): ?>
                    <h1 class="intro__title gs_reveal gs_reveal_fromRight"><?php echo $topTitle; ?></h1>
                <?php endif; ?> 
                <?php if ($topPerex): ?>
                    <p class="intro__perex gs_reveal gs_reveal_fromRight"> <?php echo $topPerex; ?></p>
                <?php endif; ?> 

                <?php if ($tel || $email): ?>
                    <table class="intro__table gs_reveal gs_reveal_fromRight">
                        <tr>
                            <td>Tel.</td>
                            <td><a href="tel:<?php if ($tel): echo $tel; endif; ?>"><?php if ($tel): echo $tel; endif; ?></a></td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td class="mail"><a href="mailto:<?php if ($email): echo $email; endif; ?>"><?php if ($email): echo $email; endif; ?></a></td>
                        </tr>
                    </table>
                <?php endif; ?> 
                <?php if ($address): ?>
                    <div class="intro__address gs_reveal gs_reveal_fromRight">
                        <p><?php echo $address; ?></p>
                    </div>
                <?php endif; ?> 
                
                <?php if ($ic): ?>
                    <div class="intro__address --ic gs_reveal gs_reveal_fromRight">
                        <p>IČ</p><p><?php echo $ic; ?></p>
                    </div>
                <?php endif; ?> 
                <?php if ($dic): ?>
                    <div class="intro__address --ic gs_reveal gs_reveal_fromRight">
                        <p>DIČ</p><p><?php echo $dic; ?></p>
                    </div>
                <?php endif; ?> 

                <div class="ball-wrapper ball --right">
                    <div class="dottarget2 d-flex justify-content-center"> <div class="dotted"></div></div>
                </div>

                <?php if ($buttonUrl): ?>
                    <a href="<?php echo $buttonUrl; ?>" class="button button--outline gs_reveal gs_reveal_fromRight"><?php if ($buttonText): echo $buttonText; endif; ?></a>
                <?php endif; ?> 
            </div>
            <div class="intro__content__bottom <?php if ($bottomClass): echo $bottomClass; endif; ?>">
                
                <div class="ball-wrapper ball --left">
                    <div class="dottarget3 d-flex justify-content-center"> <div class="dotted"></div></div>
                </div>
                
                <?php if ($bottomPerex): ?>    
                    <div class="intro__content__bottom__perex gs_reveal gs_reveal_fromRight">
                        <p><?php echo $bottomPerex; ?></p>
                    </div>
                <?php endif; ?> 
                <?php if ($contentImg): ?>  
                    <div class="intro__content__img cover gs_reveal gs_reveal_fromRight">
                        <img src="<?php echo $contentImg; ?>" alt="">
                    </div>
                <?php endif; ?> 
            </div>

        </div>
    </div>
</section>


