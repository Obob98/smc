<nav class="container">
    <div class="logo">
        <a href="/" class="h1 f-bold">
            <img src="<?php echo $baseURL . 'assets/imgs/360_F_479093143_1ypd13XBPiPtBJcsprzEhhxflcfqEGna.jpg' ?>"
                alt="">
        </a>
    </div>
    <ul class="glass border-full">
        <li class="<?php if($_SESSION['current-page'] === 'Home') echo 'active' ?>">
            <a href="<?php echo $baseURL ?>">Home</a>
        </li>
        <li class="<?php if($_SESSION['current-page'] === 'About Us') echo 'active' ?>">
            <a href="<?php echo $baseURL . 'about-us.php'?>">About Us</a>
        </li>
        <li class="dropdown">
            <a href="#">
                information
                <svg width="12" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.79289 8.20711C7.18342 8.59763 7.81658 8.59763 8.20711 8.20711L14.5711 1.84315C14.9616 1.45262 14.9616 0.819456 14.5711 0.428932C14.1805 0.0384076 13.5474 0.0384076 13.1569 0.428932L7.5 6.08579L1.84315 0.428932C1.45262 0.0384082 0.819456 0.0384082 0.428932 0.428932C0.0384076 0.819457 0.0384077 1.45262 0.428932 1.84315L6.79289 8.20711ZM6.5 6.5L6.5 7.5L8.5 7.5L8.5 6.5L6.5 6.5Z"
                        fill="#000" />
                </svg>
            </a>
            <div class="dropdown-content">
                <a href="<?php echo $baseURL . 'how.php'?>">How Parents Can Help</a>
                <a href="<?php echo $baseURL . 'popular-sites.php'?>">Articles</a>
                <a href="<?php echo $baseURL . 'legisltive.php'?>"> Legislation and Guidance</a>
                <a href="#"> Livestreaming</a>
            </div>
        </li>
        <li><a href="./contact-us.php">contact</a></li>
    </ul>
    <div class="rightmost <?php if($user['username'])echo 'withdropdown' ?>">
        <?php if($user['username']): ?>
        <div class="profile glass">
            <?php if(strlen($user['profile_img']) > 2): ?>
            <img src="<?php echo $baseURL .'images/profiles/' . $user['profile_img'] ?>" alt="profile imae">
            <?php else: ?>
            <p><?php echo $user['profile_img'] ?></p>
            <?php endif ?>
        </div>
        <?php else: ?>
        <a href="./partials/log-in.php" class="btn btn-secondary">Log In</a>
        <a href="./partials/sign-up.php" class="btn btn-primary">Sign Up</a>
        <?php endif ?>
        <div class="drop_down glass">
            <div class="profile glass">
                <?php if(strlen($user['profile_img']) > 2): ?>
                <img src="<?php echo $baseURL .'images/profiles/' . $user['profile_img'] ?>" alt="profile imae">
                <?php else: ?>
                <p><?php echo $user['profile_img'] ?></p>
                <?php endif ?>
            </div>
            <a href="./profile.php">Profile ( <?php echo $user['username'] ?> )</a>
            <a href="./partials/sign-out.php">Sign Out</a>
        </div>
    </div>
</nav>
<nav class="fixed glass">
    <div class="container">
        <div class="logo">
            <a href="/" class="h1 f-bold">
                <img src="<?php echo $baseURL . 'assets/imgs/360_F_479093143_1ypd13XBPiPtBJcsprzEhhxflcfqEGna.jpg' ?>"
                    alt="">
            </a>
        </div>
        <ul class="glass border-full">
            <li class="<?php if($_SESSION['current-page'] === 'Home') echo 'active' ?>">
                <a href="<?php echo $baseURL ?>">Home</a>
            </li>
            <li class="<?php if($_SESSION['current-page'] === 'About Us') echo 'active' ?>">
                <a href="<?php echo $baseURL . 'about-us.php'?>">About Us</a>
            </li>
            <li class="dropdown">
                <a href="#">
                    information
                    <svg width="12" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.79289 8.20711C7.18342 8.59763 7.81658 8.59763 8.20711 8.20711L14.5711 1.84315C14.9616 1.45262 14.9616 0.819456 14.5711 0.428932C14.1805 0.0384076 13.5474 0.0384076 13.1569 0.428932L7.5 6.08579L1.84315 0.428932C1.45262 0.0384082 0.819456 0.0384082 0.428932 0.428932C0.0384076 0.819457 0.0384077 1.45262 0.428932 1.84315L6.79289 8.20711ZM6.5 6.5L6.5 7.5L8.5 7.5L8.5 6.5L6.5 6.5Z"
                            fill="#000" />
                    </svg>
                </a>
                <div class="dropdown-content">
                    <a href="<?php echo $baseURL . 'how.php'?>">How Parents Can Help</a>
                    <a href="<?php echo $baseURL . 'popular-sites.php'?>">Articles</a>
                    <a href="#"> Legislation and Guidance</a>
                    <a href="#"> Livestreaming</a>
                </div>
            </li>
            <li><a href="/contact-us.html">contact</a></li>
        </ul>
        <div class="rightmost <?php if($user['username'])echo 'withdropdown' ?>">
            <?php if($user['username']): ?>
            <div class="profile glass">
                <?php if(strlen($user['profile_img']) > 2): ?>
                <img src="<?php echo $baseURL .'images/profiles/' . $user['profile_img'] ?>" alt="profile imae">
                <?php else: ?>
                <p><?php echo $user['profile_img'] ?></p>
                <?php endif ?>
            </div>
            <?php else: ?>
            <a href="./partials/log-in.php" class="btn btn-secondary">Log In</a>
            <a href="./partials/sign-up.php" class="btn btn-primary">Sign Up</a>
            <?php endif ?>
            <div class="drop_down glass">
                <div class="profile glass">
                    <?php if(strlen($user['profile_img']) > 2): ?>
                    <img src="<?php echo $baseURL .'images/profiles/' . $user['profile_img'] ?>" alt="profile imae">
                    <?php else: ?>
                    <p><?php echo $user['profile_img'] ?></p>
                    <?php endif ?>
                </div>
                <a href="./profile.php">Profile ( <?php echo $user['username'] ?> )</a>
                <a href="./partials/sign-out.php">Sign Out</a>
            </div>
        </div>
    </div>
</nav>

<nav class="container mobile">
    <div class="logo">
        <a href="/" class="h1 f-bold">
            <img src="<?php echo $baseURL . 'assets/imgs/360_F_479093143_1ypd13XBPiPtBJcsprzEhhxflcfqEGna.jpg' ?>"
                alt="">
        </a>
    </div>

    <div class="menu">
        <button class="btn btn-secondary">
            menu
        </button>
        <ul class="glass">
            <li class="<?php if($_SESSION['current-page'] === 'Home') echo 'active' ?>">
                <a href="<?php echo $baseURL ?>">Home</a>
            </li>
            <li class="<?php if($_SESSION['current-page'] === 'About Us') echo 'active' ?>">
                <a href="<?php echo $baseURL . 'about-us.php'?>">About Us</a>
            </li>
            <li class="dropdown">
                <a href="#">
                    information
                    <svg width="12" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.79289 8.20711C7.18342 8.59763 7.81658 8.59763 8.20711 8.20711L14.5711 1.84315C14.9616 1.45262 14.9616 0.819456 14.5711 0.428932C14.1805 0.0384076 13.5474 0.0384076 13.1569 0.428932L7.5 6.08579L1.84315 0.428932C1.45262 0.0384082 0.819456 0.0384082 0.428932 0.428932C0.0384076 0.819457 0.0384077 1.45262 0.428932 1.84315L6.79289 8.20711ZM6.5 6.5L6.5 7.5L8.5 7.5L8.5 6.5L6.5 6.5Z"
                            fill="#000" />
                    </svg>
                </a>
                <div class="dropdown-content">
                    <a href="<?php echo $baseURL . 'how.php'?>">How Parents Can Help</a>
                    <a href="<?php echo $baseURL . 'popular-sites.php'?>">Articles</a>
                    <a href="<?php echo $baseURL . 'legisltive.php'?>"> Legislation and Guidance</a>
                    <a href="#"> Livestreaming</a>
                </div>
            </li>
            <li><a href="/contact-us.php">contact</a></li>
        </ul>
    </div>

    <div class="rightmost <?php if($user['username'])echo 'withdropdown' ?>">
        <?php if($user['username']): ?>
        <div class="profile glass">
            <?php if(strlen($user['profile_img']) > 2): ?>
            <img src="<?php echo $baseURL .'images/profiles/' . $user['profile_img'] ?>" alt="profile imae">
            <?php else: ?>
            <p><?php echo $user['profile_img'] ?></p>
            <?php endif ?>
        </div>
        <?php else: ?>
        <a href="./partials/log-in.php" class="btn btn-secondary">Log In</a>
        <a href="./partials/sign-up.php" class="btn btn-primary">Sign Up</a>
        <?php endif ?>
        <div class="drop_down glass">
            <div class="profile glass">
                <?php if(strlen($user['profile_img']) > 2): ?>
                <img src="<?php echo $baseURL .'images/profiles/' . $user['profile_img'] ?>" alt="profile imae">
                <?php else: ?>
                <p><?php echo $user['profile_img'] ?></p>
                <?php endif ?>
            </div>
            <a href="./profile.php">Profile ( <?php echo $user['username'] ?> )</a>
            <a href="./partials/sign-out.php">Sign Out</a>
        </div>
    </div>
</nav>

<script>
const links = document.querySelectorAll('nav a')

links.forEach(link => {
    link.addEventListener('click', function() {
        const linkValue = this.innerText

        this.classList.add('active')

        // alert('yah!')
        // $_SESSION['current-page'] = linkValue
        // alert($_SESSION['current-page'])
    })
})
</script>