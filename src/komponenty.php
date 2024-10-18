<?php include 'header.php'; ?>

<!-- CONFIG  -->
<div class="container">
    <section class="section">
        <h3> Buttons </h3>
        <a href="" class="button button--outline">o nás</a>
        <a href="" class="button">více o službách</a>
    </section>

    <h3> Colors </h3>
    <div class="row">
        <div class="col-2"><p>color</p></div>
        <div class="col-2"><p class="text-primary ">primary</p></div>
        <div class="col-2"><p class="text-secondary">secondary</p></div>
        <div class="col-2"><p class="text-gray">gray</p></div>
    </div>

    <h3> Fonts</h3>
    <div class="row">
        <div class="col-2"><p class="font-primary">Alaska</p></div>
        <div class="col-2"><p class="font-secondary">Matter</p></div>
    </div>
    
    <h3>Font weights</h3>
    <div class="row">
        <div class="col-2"><p class="fw-normal">normal</p></div>
        <div class="col-2"><p class="fw-semibold">semibold</p></div>
        <!-- <div class="col-2"><p class="fw-bold">bold</p></div> -->
    </div>
    
</div>



<!-- INTRO section -->
<?php component('intro', [
    'class' => '',
    'img' => './root/obsah/hp/1.png',
    'topTitle' => 'intro',
    'topPerex' => 'intro__perex --- Konstrukce oken a bezrámových oken se upravovala pro tuto stavbu na míru, aby působilo, že jsou skla osazena přímo v masivní dřevěné konstrukci domu.',
    'buttonUrl' => 'about',
    'buttonText' => 'button',
    'bottomPerex' => 'Konstrukce oken a bezrámových oken se upravovala pro tuto stavbu na míru, aby působilo, že jsou skla osazena přímo v masivní dřevěné konstrukci domu. Konstrukce oken a bezrámových oken se upravovala pro tuto stavbu na míru.',
    // 'contentImg' => './root/obsah/hp/2.png',
]); ?>

<!-- INTRO section --smaller-title -->
<?php component('intro', [
    'class' => '--smaller-title',
    'img' => './root/obsah/hp/1.png',
    'topTitle' => 'intro --smaller-title',
    'topPerex' => 'Konstrukce oken a bezrámových oken se upravovala pro tuto stavbu na míru, aby působilo, že jsou skla osazena přímo v masivní dřevěné konstrukci domu. ',
    'buttonUrl' => 'onas',
    'buttonText' => 'o nás',
    'contentImg' => './root/obsah/hp/2.png',
]); ?>


<!-- Breadcrumbs -->
<section class="section headercrumbs gs_reveal gs_reveal_fromLeft">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs text-sm">
                    <a href="/"> realizace</a>
                    <a href="/"> realizace 2</a>
                    <h1><a href="#">Velká Dobrá</a></h1>
                </div>           
            </div>
        </div>
    </div>        
</section>

<!-- full width image -->
<div class="img__full cover gs_reveal gs_reveal_fromLeft">
    <img src="./root/obsah/detail/1.png" alt="">
</div>

<!-- text + button right -->
<section class="section text-wrapper --right">
    <div class="container">   
        <p class="text-wrapper__subtitle gs_reveal gs_reveal_fromRight">Ozvete se nam, vypracujeme pro vas reseni na miru vasi zahrade, nemovitosti nebo pozemku. Lorem ipsum dolor sit amet con.</p>
        <a href="kontakt" class="button button--outline gs_reveal gs_reveal_fromRight">kontaktujte nas</a>
    </div>
</section>

<!-- text left, table right -->
<section class="section text-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-6 sm:col-12">
                <p class="text-wrapper__perex gs_reveal gs_reveal_fromLeft">text-wrapper__perex   ----- Konstrukce oken a bezrámových oken se upravovala pro tuto stavbu na míru, aby působilo, že jsou skla osazena v dřevěné konstrukci domu. Konstrukce oken a bezrámových oken se upravovala pro tuto.</p>
            </div>
            <div class="col-6 sm:col-12 text-wrapper__table">
                <table class="gs_reveal gs_reveal_fromRight">
                    <tr>
                        <td>Autor</td>
                        <td>Vobo</td>
                    </tr>
                    <tr>
                        <td>Spolupráce</td>
                    </tr>
                    <tr>
                        <td>Lokalita</td>
                    </tr>
                    <tr>
                        <td>Fotografie</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Icon row Slider-->
<section class="section slider__wrapper">
    <div class="container">
        <p class="slider__title gs_reveal gs_reveal_fromLeft">služby</p>

        <div class="f-carousel slider">
            <div class="f-carousel__viewport">
                <figure class="f-carousel__slide">
                    <img src="./public/images/design.svg" alt="">
                    <figcaption>
                        <h3 >Spolupráce s designery</h3>
                        <p>Konstrukce oken a bezrámových oken se upravovala pro tuto stavbu na míru, aby působilo, že jsou skla osazena přímo v masivní dřevěné konstrukci domu. Konstrukce oken a bezrámových oken se upravovala pro tuto stavbu na míru, aby působilo, že jsou skla osazena přímo v masivní dřevěné konstrukci domu. </p>
                    </figcaption>
                </figure>
                <figure class="f-carousel__slide">
                    <img src="./public/images/architecture.svg" alt="">
                    <figcaption>
                        <h3 >Navrhujeme s citem pro architekturu</h3>
                        <p>Konstrukce oken a bezrámových oken se upravovala pro tuto stavbu na míru, aby působilo, že jsou skla osazena přímo v masivní dřevěné konstrukci domu. Konstrukce oken a bezrámových oken se upravovala pro tuto stavbu na míru, aby působilo, že jsou skla osazena přímo v masivní dřevěné konstrukci domu.</p>
                    </figcaption>
                </figure>
                <figure class="f-carousel__slide">
                    <img src="./public/images/realization.svg" alt="">
                    <figcaption>
                        <h3 >Kompletní realizace</h3>
                        <p>Konstrukce oken a bezrámových oken se upravovala pro tuto stavbu na míru, aby působilo, že jsou skla osazena přímo v masivní dřevěné konstrukci domu. Konstrukce oken a bezrámových oken se upravovala pro tuto stavbu na míru, aby působilo, že jsou skla osazena přímo v masivní dřevěné konstrukci domu.</p>
                    </figcaption>
                </figure>
            </div>
        </div>

        <div class="slider__button">
            <a href="" class="button gs_reveal gs_reveal_fromLeft">více o službách</a>
        </div>
    </div>
</section>

<!-- Icon row -->
<section class="section icon-row">
    <div class="container">
        <div class="row">
                <div class="col-4 md:col-6 xs:col-12">
                    <?php component('icon-row', [
                        'icon' => '<img src="./public/images/material.svg" alt="">',
                        'title' => 'Rozumíme oceli',
                        'perex' => 'Konstrukce oken a bezrámových oken se upravovala pro tuto stavbu na míru, aby působilo, že jsou skla osazena přímo v masivní dřevěné konstrukci domu. Konstrukce oken a bezrámových oken se upravovala pro tuto stavbu na míru, aby působilo, že jsou skla osazena přímo v masivní dřevěné konstrukci domu. ',
                    ]); ?>
                </div>
                <div class="col-4 md:col-6 xs:col-12">
                    <?php component('icon-row', [
                        'icon' => '<img src="./public/images/architecture.svg" alt="">',
                        'title' => 'Kvalita a funkčnost na prvním místě',
                        'perex' => 'Na naše produkty a řešení se můžete spolehnout. Máme 20 let zkušeností v oblasti stínící techniky a spolupracujeme pouze s vybranými evropskými dodavateli, u kterých ručíme za nejvyšší kvalitu.',
                    ]); ?>
                </div>
                <div class="col-4 md:col-6 xs:col-12">
                    <?php component('icon-row', [
                        'icon' => '<img src="./public/images/realization.svg" alt="">',
                        'title' => 'Kvalita a funkčnost na prvním místě',
                        'perex' => 'Na naše produkty a řešení se můžete spolehnout. Máme 20 let zkušeností v oblasti stínící techniky a spolupracujeme pouze s vybranými evropskými dodavateli, u kterých ručíme za nejvyšší kvalitu.',
                    ]); ?>
                </div>
                <div class="col-4 md:col-6 xs:col-12">
                    <?php component('icon-row', [
                        'icon' => '<img src="./public/images/customers.svg" alt="">',
                        'title' => 'Kvalita a funkčnost na prvním místě',
                        'perex' => 'Na naše produkty a řešení se můžete spolehnout. Máme 20 let zkušeností v oblasti stínící techniky a spolupracujeme pouze s vybranými evropskými dodavateli, u kterých ručíme za nejvyšší kvalitu.',
                    ]); ?>
                </div>
                <div class="col-4 md:col-6 xs:col-12">
                    <?php component('icon-row', [
                        'icon' => '<img src="./public/images/design.svg" alt="">',
                        'title' => 'Kvalita a funkčnost na prvním místě',
                        'perex' => 'Na naše produkty a řešení se můžete spolehnout. Máme 20 let zkušeností v oblasti stínící techniky a spolupracujeme pouze s vybranými evropskými dodavateli, u kterých ručíme za nejvyšší kvalitu.',
                    ]); ?>
                </div>
                <div class="col-4 md:col-6 xs:col-12">
                    <?php component('icon-row', [
                        'icon' => '<img src="./public/images/lock.svg" alt="">',
                        'title' => 'Kvalita a funkčnost na prvním místě',
                        'perex' => 'Na naše produkty a řešení se můžete spolehnout. Máme 20 let zkušeností v oblasti stínící techniky a spolupracujeme pouze s vybranými evropskými dodavateli, u kterých ručíme za nejvyšší kvalitu.',
                    ]); ?>
                </div>
        </div>
    </div>
</section>

<!-- three cols content -->
<section class="img__cols">
    <div class="container">

        <div class="row">
            <div class="col-4 sm:col-6 xs:col-12">
                <div class="img cover">
                    <img src="./root/obsah/detail/2.png" alt="">
                </div>
            </div>
            <div class="col-4 sm:col-6 xs:col-12">
                <p class="img__perex">Konstrukce oken a bezrámových oken se upravovala pro tuto stavbu na míru, aby působilo, že jsou skla osazena přímo v masivní dřevěné konstrukci domu. Konstrukce oken a bezrámových oken se upravovala pro tuto stavbu na míru, aby působilo, že jsou skla osazena přímo v masivní dřevěné konstrukci domu. </p>
            </div>
            <div class="col-4 sm:col-6 xs:col-12">
                <div class="img cover">
                    <img src="./root/obsah/detail/3.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery -->
<section class="section">
    <div class="container">
        <div class="gallery">

            <a href="./root/obsah/detail/4.png" class="gallery__item" data-fancybox="gallery">
                <div class="gallery__image cover">
                    <img src="./root/obsah/detail/4.png" loading="lazy" >
                </div>
            </a>  
        
            <a href="./root/obsah/detail/5.png" class="gallery__item" data-fancybox="gallery">
                <div class="gallery__image cover">
                    <img src="./root/obsah/detail/5.png" loading="lazy" >
                </div>
            </a>  

            <a href="./root/obsah/detail/8.png" class="gallery__item" data-fancybox="gallery">
                <div class="gallery__image cover">
                    <img src="./root/obsah/detail/8.png" loading="lazy" >
                </div>
            </a>  
            <a href="./root/obsah/detail/6.png" class="gallery__item --height" data-fancybox="gallery">
                <div class="gallery__image cover">
                    <img src="./root/obsah/detail/6.png" loading="lazy" >
                </div>
            </a>  
            <a href="./root/obsah/detail/4.png" class="gallery__item" data-fancybox="gallery">
                <div class="gallery__image cover">
                    <img src="./root/obsah/detail/4.png" loading="lazy" >
                </div>
            </a>  

            <a href="./root/obsah/detail/5.png" class="gallery__item" data-fancybox="gallery">
                <div class="gallery__image cover">
                    <img src="./root/obsah/detail/5.png" loading="lazy" >
                </div>
            </a>  
            
            <a href="./root/obsah/detail/7.png" class="gallery__item --height" data-fancybox="gallery">
                <div class="gallery__image cover">
                    <img src="./root/obsah/detail/7.png" loading="lazy" >
                </div>
            </a>  

            <a href="./root/obsah/detail/4.png" class="gallery__item" data-fancybox="gallery">
                <div class="gallery__image cover">
                    <img src="./root/obsah/detail/4.png" loading="lazy" >
                </div>
            </a>  

            <a href="./root/obsah/detail/13.png" class="gallery__item" data-fancybox="gallery">
                <div class="gallery__image cover">
                    <img src="./root/obsah/detail/13.png" loading="lazy" >
                </div>
            </a>  

            <a href="./root/obsah/detail/12.png" class="gallery__item" data-fancybox="gallery">
                <div class="gallery__image cover">
                    <img src="./root/obsah/detail/12.png" loading="lazy" >
                </div>
            </a>  

            <a href="./root/obsah/detail/6.png" class="gallery__item --height" data-fancybox="gallery">
                <div class="gallery__image cover">
                    <img src="./root/obsah/detail/6.png" loading="lazy" >
                </div>
            </a> 
            <a href="./root/obsah/detail/7.png" class="gallery__item --height" data-fancybox="gallery">
                <div class="gallery__image cover">
                    <img src="./root/obsah/detail/7.png" loading="lazy" >
                </div>
            </a> 
            <a href="./root/obsah/detail/7.png" class="gallery__item --height" data-fancybox="gallery">
                <div class="gallery__image cover">
                    <img src="./root/obsah/detail/7.png" loading="lazy" >
                </div>
            </a> 
            <a href="./root/obsah/detail/12.png" class="gallery__item" data-fancybox="gallery">
                <div class="gallery__image cover">
                    <img src="./root/obsah/detail/12.png" loading="lazy" >
                </div>
            </a>  


        </div>
    </div>
</section>

<!-- List of cards -->
<section class="section cards">
    <div class="container">
        <p class="section__title gs_reveal gs_reveal_fromLeft">section__title</p>

        <div class="row">
            <div class="col-4 sm:col-12">
                <a href="realizace-detail" class="card gs_reveal gs_reveal_fromLeft">
                    <div class="card__image">
                        <img src="./root/obsah/detail/8.png" loading="lazy" >
                    </div>    
                    <p class="card__label">Velká Dobrá</p>
                    <p class="card__perex">vstupní branka, vjezdová brána</p>
                </a>     
            </div>
            <div class="col-4 sm:col-12">
                <a href="realizace-detail" class="card gs_reveal gs_reveal_fromLeft">
                    <div class="card__image">
                        <img src="./root/obsah/detail/9.png" loading="lazy" >
                    </div>
                    <p class="card__label">U Šumavěnky</p>
                    <p class="card__perex">Oplocení objektu, vstupní branka</p>
                </a> 
            </div>
            <div class="col-4 sm:col-12">
                <a href="realizace-detail" class="card gs_reveal gs_reveal_fromLeft">
                    <div class="card__image">
                        <img src="./root/obsah/detail/10.png" loading="lazy" >
                    </div>    
                    <p class="card__label">Zbraslav</p>
                    <p class="card__perex">vstupní branka, vjezdová brána</p>
                </a> 
            </div>
        </div>
        <div class="section__button">
            <a href="" class="button button--outline gs_reveal gs_reveal_fromLeft">všechny realizace</a>
        </div>
    </div>
</section>


<?php include 'footer.php'; ?>