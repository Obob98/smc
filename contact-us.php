<?php 
    include('./partials/header.php');
 ?>


<title>SMC - contact us</title>
<link rel="stylesheet" href="./styles/cube.css">
<link rel="stylesheet" href="./styles/animation.css">
<link rel="stylesheet" href="./styles/home.css">
<link rel="stylesheet" href="./styles/utilities.css">
<link rel="stylesheet" href="./styles/main.css">
<link rel="stylesheet" href="./partials/extra-nav.css">

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
                    <h1 class="h1">Leave us amessage</h1>
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
        <section class="contact">
            <div class="container">
                <div class="title">Contact Us</div>
                <div class="content">
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