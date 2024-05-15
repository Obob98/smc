<?php 
    include('./partials/header.php');
 ?>


<head>
    <title>SMC - home</title>
    <link rel="stylesheet" href="./styles/main.css">
    <!-- <link rel="stylesheet" href="./temp.css"> -->
    <link rel="stylesheet" href="./styles/cube.css">
    <link rel="stylesheet" href="./styles/animation.css">
    <link rel="stylesheet" href="./styles/utilities.css">
    <link rel="stylesheet" href="./partials/extra-nav.css">
    <link rel="stylesheet" href="./styles/home.css">

    <script src="./scripts/home.js" defer></script>
    <script src="./scripts/main.js" defer></script>
</head>

<body>
    <div class="overlay"> </div>
    <header>
        <div class="hero withbackground">
            <!-- <div class="overlay"></div> -->

            <?php include($_SERVER['DOCUMENT_ROOT'] . '/smc/smc/site/partials/nav.php');?>


            <div class="hero-content container">
                <div class="left">
                    <div class="dots">
                        <div class="current"></div>
                        <div></div>
                        <div></div>
                    </div>
                    <h1 class="h1">Empowering Teens for Safe Social Media Use</h1>
                    <a href="#subscribe" class="btn btn-primary glass f-sbold border-full">
                        join our newsletter
                    </a>
                </div>
                <div class="right">
                    <p>
                        we're dedicated to helping teenagers navigate the digital world safely.
                    </p>
                </div>
                <div class="floater">
                    <form action="">
                        <input type="search" placeholder="Search" class="glass border-full">
                        <div class="img"><img src="./assets/icons/search/711319.png" alt=""></div>
                    </form>
                    <a class="themes glass border-full">
                        <p class="">system</p>
                        <button id="mode-toggle">
                            <svg width="15" height="9" viewBox="0 0 15 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.79289 8.20711C7.18342 8.59763 7.81658 8.59763 8.20711 8.20711L14.5711 1.84315C14.9616 1.45262 14.9616 0.819456 14.5711 0.428932C14.1805 0.0384076 13.5474 0.0384076 13.1569 0.428932L7.5 6.08579L1.84315 0.428932C1.45262 0.0384082 0.819456 0.0384082 0.428932 0.428932C0.0384076 0.819457 0.0384077 1.45262 0.428932 1.84315L6.79289 8.20711ZM6.5 6.5L6.5 7.5L8.5 7.5L8.5 6.5L6.5 6.5Z"
                                    fill="white" />
                            </svg>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <main class="">
        <section class="about" id="about">
            <div class="container">
                <div class="title">
                    A little more About us
                </div>
                <div class="content">
                    <article>
                        <h2>We promote online safety among teenagers.</h2>
                        <p>In today's digital age, social media plays a significant role in the lives of teenagers.
                            While it offers opportunities for connection and self-expression, it also presents risks
                            that can impact their safety and well-being.
                            <br>
                            <br> At SMC, we believe in empowering teens with the knowledge and tools they need to stay
                            safe online.
                        </p>
                    </article>
                    <a href="<?php echo $baseURL . 'about-us.php'?>" class="btn btn-secondary">Learn More</a>
                </div>
            </div>
        </section>

        <section class="our-supporters" id="our-suppoters">
            <!-- <div class="container title">
                Our Supporters
            </div> -->
            <div class="logos">
                <!-- <div class="one"> -->
                <div class="logos-slider">
                    <div>
                        <div>
                            <div class="number">2012</div>
                            <div class="number-subtitle">Founded</div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <div class="number">150+</div>
                            <div class="number-subtitle">Team Members</div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <div class="number">12+</div>
                            <div class="number-subtitle">Years of client Partnership</div>
                        </div>
                    </div>
                </div>
                <div class="logos-slider">
                    <div>
                        <div>
                            <div class="number">2012</div>
                            <div class="number-subtitle">Founded</div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <div class="number">150+</div>
                            <div class="number-subtitle">Team Members</div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <div class="number">12+</div>
                            <div class="number-subtitle">Years of client Partnership</div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
                <!-- <div class="two"> -->
                <!-- <img src="./assets/icons/Logo-1.png" alt="Logo-1">
                <img src="./assets/icons/Logo-2.png" alt="Logo-2">
                <img src="./assets/icons/Logo-3.png" alt="Logo-3">
                <img src="./assets/icons/Logo-3.png" alt="Logo-3">
                <img src="./assets/icons/Logo-4.png" alt="Logo-4.png"> -->
                <!-- </div> -->
            </div>
        </section>

        <section class="our-programs" id="programs">
            <div class="container">
                <div class="title">
                    Our Programs
                </div>
                <div class="content">
                    <div class="typography">
                        <div class="one">
                            <h2>Partnerships and Collaborations</h2>
                            <small>
                                <sup>_______</sup> We collaborate with schools, community organizations, and industry
                                partners to amplify our impact and reach a wider audience with our online safety
                                initiatives.
                            </small>
                        </div>
                        <div class="two">
                            <h2>Donations and Fundraising Campaigns</h2>
                            <small>
                                <sup>_______</sup> As a nonprofit organization, we rely on the generous support of
                                individuals and organizations to fund our programs and initiatives.
                            </small>
                        </div>
                        <div class="three">
                            <h2>Subscription Program</h2>
                            <small>
                                <sup>_______</sup> Our subscription program offers teenagers access to premium content
                                and resources designed to deepen their understanding of online safety.
                            </small>
                        </div>
                    </div>

                    <div class="wrapper">
                        <div class="img img-one">
                            <img src="./assets/imgs/our programs/Tips-to-Protect-Yourself-on-Facebook-Instagram_2022-05-11-152121_sccc.jpg"
                                alt="">
                        </div>
                        <div class="img img-two">
                            <img src="./assets/imgs/our programs/digital-footprint-2.jpg" alt="">
                        </div>
                        <div class="img img-three">
                            <img src="./assets/imgs/our programs/1.jpg" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="why-us">
            <div class="wraper">
                <div class="content sticky-div">
                    <div class="titles">
                        <h2 class="h2-1" style="--i:1">Commitment to Education</h2>
                        <h2 class="h2-2" style="--i:2">Expertise and Experience</h2>
                        <h2 class="h2-3" style="--i:3">Holistic Approach</h2>
                    </div>
                    <div class="cards"
                        style="transform: translate3d(0px, 0em, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d; opacity: 1;">


                        <div class="card card-one glass">
                            <div class="icon">
                                <img src="./assets/icons/why-us/11405564_elearning_online learning_online education_e-learning_education_icon.png"
                                    alt="">
                            </div>
                            <p>
                                At SMC, education is at the heart of everything we do. We're passionate about empowering
                                teenagers to make informed decisions online and understand the potential risks and
                                consequences of their digital actions. Through our engaging content, interactive
                                workshops, and educational initiatives, we strive to foster a culture of digital
                                literacy and responsibility among today's youth.
                            </p>
                        </div>

                        <div class="card card-one glass">
                            <div class="icon">
                                <img src="./assets/icons/why-us/11406736_rating_feedback_review_rate_star_icon.png"
                                    alt="">
                            </div>
                            <p>Our team consists of seasoned professionals with years of experience in digital
                                marketing, cybersecurity, and youth advocacy. We combine our expertise to develop
                                comprehensive strategies and resources tailored to the unique needs
                                of teenagers, ensuring they receive accurate and up-to-date information on online safety
                                practices.</p>
                        </div>

                        <div class="card card-one glass">
                            <div class="icon">
                                <img src="./assets/icons/why-us/11407472_security_compliance_protect_safety_secure_icon.png"
                                    alt="">
                            </div>
                            <p>
                                We believe in taking a holistic approach to online safety, addressing not only the
                                technical aspects of cybersecurity but also the social, emotional, and ethical
                                dimensions of digital citizenship. Our programs cover topics such as privacy protection,
                                cyberbullying prevention, digital footprint management, and online etiquette, ensuring
                                teenagers develop a well-rounded understanding of online safety principles.
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            </div>
            </div>
            </div>
        </section>

        <section class="feedback" id="testimonials">
            <div class="container">
                <div class="title">
                    Word On The streets
                </div>
                <div class="cards">
                    <div class="card glass">
                        <div class="head">
                            <div class="img"><img src="./assets/imgs/testimonials/founder3.jpg" alt="img"></div>
                            <figcaption>
                                <p class="f-sbold">Aubrey Nyasulu</p>
                                <small>CEO, O inc.</small>
                            </figcaption>
                        </div>
                        <div class="typography">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab deserunt assumenda veniam
                                placeat facere labore alias officiis odit, odio magnam qui totam
                            </p>

                        </div>
                    </div>
                    <div class="card glass">
                        <div class="head">
                            <div class="img"><img src="./assets/imgs/testimonials/3.jpg" alt="img"></div>
                            <figcaption>
                                <p class="f-sbold">Jane Phalady</p>
                                <small>Mom, Activist</small>
                            </figcaption>
                        </div>
                        <div class="typography">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab deserunt assumenda veniam
                                placeat facere labore alias officiis odit, odio magnam qui totam
                            </p>

                        </div>
                    </div>
                    <div class="card glass">
                        <div class="head">
                            <div class="img"><img src="./assets/imgs/testimonials/4.jpg" alt="img"></div>
                            <figcaption>
                                <p class="f-sbold">Matt Phiri</p>
                                <small>CTO, The It Company</small>
                            </figcaption>
                        </div>
                        <div class="typography">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab deserunt assumenda veniam
                                placeat facere labore alias officiis odit, odio magnam qui totam
                            </p>

                        </div>
                    </div>
                    <div class="card glass">
                        <div class="head">
                            <div class="img"><img src="./assets/imgs/testimonials/founder1.jpg" alt="img"></div>
                            <figcaption>
                                <p class="f-sbold">Owen Nyasulu</p>
                                <small>CEO, Pachepa Estate Agency</small>
                            </figcaption>
                        </div>
                        <div class="typography">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab deserunt assumenda veniam
                                placeat facere labore alias officiis odit, odio magnam qui totam
                            </p>

                        </div>
                    </div>
                    <div class="card glass">
                        <div class="head">
                            <div class="img"><img src="./assets/imgs/testimonials/founder2.jpg" alt="img"></div>
                            <figcaption>
                                <p class="f-sbold">Noel Bamusi</p>
                                <small>Moderator, COO O.inc</small>
                            </figcaption>
                        </div>
                        <div class="typography">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab deserunt assumenda veniam
                                placeat facere labore alias officiis odit, odio magnam qui totam
                            </p>

                        </div>
                    </div>
                    <div class="card glass">
                        <div class="head">
                            <div class="img"><img src="./assets/imgs/testimonials/1.jpg" alt="img"></div>
                            <figcaption>
                                <p class="f-sbold">Venus Gabriel</p>
                                <small>CEO, Women Empowerment Organisation</small>
                            </figcaption>
                        </div>
                        <div class="typography">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab deserunt assumenda veniam
                                placeat facere labore alias officiis odit, odio magnam qui totam
                            </p>

                        </div>
                    </div>
                </div>
                <div class="dots">
                    <div class="active"></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
        </section>

        <section class="our-supporters" id="our-suppoters">
            <div class="container title">
                Our Supporters
            </div>
            <div class="logos">
                <!-- <div class="one"> -->
                <div class="logos-slider">
                    <img src="./assets/icons/Logo-1.png" alt="Logo-1">
                    <img src="./assets/icons/Logo-2.png" alt="Logo-2">
                    <img src="./assets/icons/Logo-3.png" alt="Logo-3">
                    <img src="./assets/icons/Logo-3.png" alt="Logo-3">
                    <img src="./assets/icons/Logo-4.png" alt="Logo-4.png">
                </div>
                <div class="logos-slider">
                    <img src="./assets/icons/Logo-1.png" alt="Logo-1">
                    <img src="./assets/icons/Logo-2.png" alt="Logo-2">
                    <img src="./assets/icons/Logo-3.png" alt="Logo-3">
                    <img src="./assets/icons/Logo-3.png" alt="Logo-3">
                    <img src="./assets/icons/Logo-4.png" alt="Logo-4.png">
                </div>
                <!-- </div> -->
                <!-- <div class="two"> -->
                <!-- <img src="./assets/icons/Logo-1.png" alt="Logo-1">
                <img src="./assets/icons/Logo-2.png" alt="Logo-2">
                <img src="./assets/icons/Logo-3.png" alt="Logo-3">
                <img src="./assets/icons/Logo-3.png" alt="Logo-3">
                <img src="./assets/icons/Logo-4.png" alt="Logo-4.png"> -->
                <!-- </div> -->
            </div>
        </section>

        <section class="faq" id="faq">
            <div class="container">
                <div class="title">
                    FAQ
                </div>
                <h2>Frequently Asked questions</h2>
                <div class="content">
                    <div class="btn-cube_container">
                        <button class="btn-secondary">Ask A Question</button>
                        <div class="cube-container">
                            <div class="cube">
                                <div class="question-mark">?</div>
                                <div class="side front"></div>
                                <div class="side back"></div>
                                <div class="side top"></div>
                                <div class="side bottom"></div>
                                <div class="side left"></div>
                                <div class="side right"></div>
                            </div>
                        </div>
                    </div>
                    <div class="qna glass">
                        <div>
                            <input type="radio" id="q1" name="qna">
                            <label for="q1">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                <p>+</p>
                            </label>
                            <div class="answer">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut obcaecati,
                                necessitatibus reiciendis dolorum vel soluta exercitationem quod, ex aut illum numquam
                                reprehenderit consequatur consectetur rem possimus sunt corporis quidem praesentium!
                                Dolor, iure?</div>
                        </div>
                        <div>
                            <input type="radio" id="q2" name="qna">
                            <label for="q2">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel molestiae cum eligendi
                                    amet adipisci, tenetur libero.</p>
                                <p>+</p>
                            </label>
                            <div class="answer">answer 2</div>
                        </div>
                        <div>
                            <input type="radio" id="q3" name="qna">
                            <label for="q3">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque optio saepe modi
                                    corrupti?</p>
                                <p>+</p>
                            </label>
                            <div class="answer">answer 3</div>
                        </div>
                        <div>
                            <input type="radio" id="q4" name="qna">
                            <label for="q4">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                                <p>+</p>
                            </label>
                            <div class="answer">answer 4</div>
                        </div>
                        <div>
                            <input type="radio" id="q5" name="qna">
                            <label for="q5">
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio reprehenderit
                                    doloremque itaque quo molestiae.</p>
                                <p>+</p>
                            </label>
                            <div class="answer">answer 5</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="latest-articles">
            <div class="container">
                <div class="title">
                    Latest Articles
                </div>
                <div class="articles">
                    <div class="card glass ">
                        <div class="img">
                            <img src="./assets/imgs/1671595495693.jpeg" alt="">
                        </div>
                        <div class="typography">
                            <div class="blog-title">
                                <p class="f-bold">Lorem ipsum dolor sit amet consectetur.</p>
                            </div>
                            <div class="additional-information">
                                <p>
                                    <span>By</span>
                                    User Name
                                </p>
                                <small>1hr ago</small>
                            </div>
                        </div>
                    </div>
                    <div class="card glass">
                        <div class="img">
                            <img src="./assets/imgs/safe-data-sharing-practices-how-avoid-data-leaks.jpg" alt="">
                        </div>
                        <div class="typography">
                            <div class="blog-title">
                                <p class="f-bold">Lorem ipsum dolor sit amet consectetur.</p>
                            </div>
                            <div class="additional-information">
                                <p>
                                    <span>By</span>
                                    User Name
                                </p>
                                <small>1hr ago</small>
                            </div>
                        </div>
                    </div>
                    <div class="card glass">
                        <div class="img">
                            <img src="./assets/imgs/cyberbullying.png" alt="">
                        </div>
                        <div class="typography">
                            <div class="blog-title">
                                <p class="f-bold">Lorem ipsum dolor sit amet consectetur.</p>
                            </div>
                            <div class="additional-information">
                                <p>
                                    <span>By</span>
                                    User Name
                                </p>
                                <small>1hr ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact">
            <div class="container">
                <div class="title">Contact Us</div>
                <div class="content">
                    <div class="ill-3d">some 3d</div>
                    <form action="">
                        <label for="">
                            First Name
                            <input type="text" placeholder="John" required>
                        </label>
                        <label for="">
                            Last Name
                            <input type="text" placeholder="Doe">
                        </label>
                        <label for="">
                            Email
                            <input type="email" placeholder="johndoe@gmail.com" required>
                        </label>
                        <label for="">
                            Subject
                            <input type="text" placeholder="Lorem, ipsum dolor.">
                        </label>
                        <label for="" class="textarea">
                            message
                            <textarea name="" id="" cols="30" rows="10" required></textarea>
                        </label>

                        <button class="btn-secondary border-full">Send</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <?php include('./partials/footer.php') ?>