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
        <li><a href="#">Resources</a></li>
        <li><a href="#">how</a></li>
        <li><a href="#">livestreaming</a></li>
        <li><a href="/contact-us.html">contact</a></li>
        <li><a href="#">L&G</a></li>
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
            <li class="active"><a href="<?php echo $baseURL ?>">Home</a></li>
            <li><a href="<?php echo $baseURL . 'about-us.php'?>">About Us</a></li>
            <li><a href="#">Resources</a></li>
            <li><a href="#">how</a></li>
            <li><a href="#">livestreaming</a></li>
            <li><a href="/contact-us.html">contact</a></li>
            <li><a href="#">L&G</a></li>
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
    <!-- <p>menu</p> -->
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