</div><!-- End content wrapper -->


<!-- Preloader -->
<div class="preloader">
    <div class="preloader__inner">
        <div class="preloader__loader"></div>
        <div class="preloader__label">Načítání</div>
    </div>
</div>

<!-- FOOTER -->
<footer class="footer">
    <div class="footer__top">
        <div class="row">
            <div class="col-3 sm:col-7">
                <ul>
                    <li>studio</li>
                    <li><a href="tel:+420123456789">+420 123 456 789</a></li>
                    <li><a href="mailto:info@miriki.cz">info@miriki.cz</a></li>
                </ul>
            </div>
            <div class="col-3 sm:col-7">

               <div class="footer__social social-media">
                                <div class="social-media__item">
                                    <a href="https://www.instagram.com/miriki/">
                                        <div class="social-media__icon">
                                            <svg>
                                                <use xlink:href="public/images/sprite.svg#instagram"></use>
                                            </svg>
                                        </div>
                                    <!-- <p>Instagram</p> -->
                                    </a>
                                </div>

                                <div class="social-media__item">
                                        <a href="https://www.facebook.com/miriki">
                                        <div class="social-media__icon">
                                            <svg>
                                                <use xlink:href="public/images/sprite.svg#facebook"></use>
                                            </svg>
                                        </div>
                                        <!-- <p>Facebook</p>-->
                                    </a>
                                </div>
               </div>
            </div>
            <div class="col-3 sm:col-2 gs_reveal">
                <!-- <?php icon('footer-dots', '', ''); ?>
                <?php icon('footer-dots-sm', '', ''); ?> -->
            </div>
            <div class="col-3 sm:col-3">
                <button class="back-to-top">
                    <?php icon('arrow-up', '', ''); ?>
                </button>
            </div>
        </div>
    </div>
        
    <div class="footer__bottom">
        <div class="row">
            <div class="col-4 md:col-12">
                <ul class="footer__copyright">
                    <li>2023 © Miriki Concept s.r.o.</li>
                    <li><a href="policy">terms and conditions / cookie policy</a></li>
                    <li><a href="https://www.studio9.cz/">webdesign by Studio 9</a></li>
                </ul>
            </div>
            <div class="col-8 md:col-12 footer__bottom__icons">
                <img src="./root/obsah/eu.svg" alt="">
                <img src="./root/obsah/ministerstvok.svg" alt="">
                <img src="./root/obsah/npo.svg" alt="">
            </div>
        </div>
    </div>

</footer>        










<!-- <?php partial('fake-cookie'); ?> -->







<!-- JS -->
<script src="<?php echo SCRIPTS_DIR; ?>/libs/jquery.min.js?ver=3.5.1"></script>
<script src="<?php echo SCRIPTS_DIR; ?>/scripts.js?ver=<?php echo VERSION; ?>"></script>
<script src="<?php echo SCRIPTS_DIR; ?>/custom.js?ver=<?php echo VERSION; ?>"></script>

<script src="<?php echo SCRIPTS_DIR; ?>/fanapp.js?ver=<?php echo VERSION; ?>"></script>

</body>
</html>