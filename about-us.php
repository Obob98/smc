<?php include('./partials/header.php') ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMC</title>
    <link rel="stylesheet" href="./animation.css">
    <link rel="stylesheet" href="./styles/about-us.css">
    <link rel="stylesheet" href="./styles/home.css">
    <link rel="stylesheet" href="./styles/utilities.css">
    <link rel="stylesheet" href="./styles/main.css">

    <script src="./scripts/aboutus.js" defer></script>
    <script src="./scripts/main.js" defer></script>
</head>

<body>
    <header>
        <div class="hero">

            <?php include($_SERVER['DOCUMENT_ROOT'] . '/smc/smc/site/partials/nav.php');?>

            <div class="hero-content container">
                <div class="left">
                    <div class="dots">
                        <div class="current"></div>
                        <div></div>
                        <div></div>
                    </div>
                    <h1 class="h1">Empowering Teens for Safe Social Media Use</h1>
                    <button class="btn-primary glass f-sbold border-full">
                        join us
                    </button>
                </div>
                <div class="right">
                    <p>
                        we're dedicated to helping teenagers navigate the digital world safely.
                </div>
                </p>
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
                <!-- <div class="title"> -->
                <!-- A little more About us
                </div> -->
                <div class="content">
                    <article>
                        <h2>We promote online safety among teenagers.</h2>
                        <p>In today's digital age, social media plays a significant role in the lives of teenagers.
                            While it
                            offers opportunities for connection and self-expression, it also presents risks that can
                            impact
                            their safety and well-being.
                            <br>
                            <br> At SMC, we believe in empowering teens with the knowledge and tools they need to stay
                            safe
                            online.
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="video">
            <div class="vid">
                <video src="./assets/videos/Keeping your teenager safe online - Dove Men+Care.mp4"></video>
                <span class="glass">Play</span>
            </div>
        </section>

        <section class="faq" id="faq">
            <div class="container">
                <div class="title">
                    FAQ
                </div>
                <h2>Frequently Asked questions</h2>
                <div class="content">
                    <button class="btn-secondary">Ask A Question</button>
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
                                Dolor,
                                iure?</div>
                        </div>
                        <div>
                            <input type="radio" id="q2" name="qna">
                            <label for="q2">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel molestiae cum eligendi
                                    amet
                                    adipisci, tenetur libero.</p>
                                <p>+</p>
                            </label>
                            <div class="answer">answer 2</div>
                        </div>
                        <div>
                            <input type="radio" id="q3" name="qna">
                            <label for="q3">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque optio saepe modi
                                    corrupti?
                                </p>
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
                                    doloremque
                                    itaque quo molestiae.</p>
                                <p>+</p>
                            </label>
                            <div class="answer">answer 5</div>
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

    <script src="./scripts/aboutus.js"></script>
    <script src="./scripts/main.js"></script>