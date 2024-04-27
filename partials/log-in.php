<?php
include('../config/conn.php');

if (!isset($_SESSION['log-in'])) {
    $_SESSION['log-in'] = ''; 
}

$username = '';

if(isset($_POST['submit'])){
    $_SESSION['log-in'] = '';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password)){
        $sql = "SELECT * FROM users WHERE username=?";

        try{
            if(isset($_SESSION['login_locked_until']) && time() < $_SESSION['login_locked_until']) {
                $_SESSION['log-in'] = 'Your account is locked. Please try again later.';
            } else {
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();

                $user = $result->fetch_assoc();

                if (!$user || $user['password'] !== md5($password)) {
                    if (!isset($_SESSION['login_attempts'])) {
                        $_SESSION['login_attempts'] = 1;
                    } else {
                        $_SESSION['login_attempts']++;
                    }
                    if ($_SESSION['login_attempts'] >= 3) {
                        $_SESSION['login_locked_until'] = time() + (1 * 60); 
                        $_SESSION['log-in'] = 'Login failed. Your account is locked for 10 minutes.';
                    } else {
                        $_SESSION['log-in'] = 'Invalid username or password. Please try again.';
                    }
                } else {
                    unset($_SESSION['login_attempts']);
                    unset($_SESSION['login_locked_until']);
                    
                    $_SESSION['user']['username'] = $username;
                    
                    header("Location: ../on-boarding.php");
                    exit;
                }
            }
        }
        catch (Exception $error){
            $_SESSION['log-in'] = 'Failed to login. ' . $error->getMessage();
        }
    } else {
        $_SESSION['log-in'] = 'Please fill in the required fields.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/utilities.css">
    <link rel="stylesheet" href="../styles/signup.css">
    <link rel="stylesheet" href="../styles/login.css">
</head>

<body>
    <div class="wrapper">
        <div class="img">
            <img src="../assets/imgs/login/gradient-ssl-illustration_23-2149247155.avif" alt="">
        </div>
        <div class="form-container">
            <h2>Log in to SMC</h2>

            <div class="timer">
                <?php if($_SESSION['log-in']): ?>
                <h4 class="danger"><?php echo $_SESSION['log-in']; ?></h4>
                <?php endif ?>
                <p>10:00</p>
            </div>

            <form action="./log-in.php" method="POST">
                <input type="text" name="username" placeholder="username" value="<?php echo $username ?>" class=""
                    <?php echo isset($_SESSION['login_locked_until']) && time() < $_SESSION['login_locked_until'] ? 'disabled' : ''; ?>>
                <input type="password" name="password" placeholder="password" class=""
                    <?php echo isset($_SESSION['login_locked_until']) && time() < $_SESSION['login_locked_until'] ? 'disabled' : ''; ?>>
                <button type="submit" name="submit" class="btn-primary"
                    <?php echo isset($_SESSION['login_locked_until']) && time() < $_SESSION['login_locked_until'] ? 'disabled' : ''; ?>>
                    Log In
                </button>
            </form>
        </div>
    </div>
</body>

<script>
window.addEventListener('DOMContentLoaded', () => {
    const timerContainer = document.querySelector('.timer')
    const timerElement = document.querySelector('.timer p')
    const inputs = document.querySelectorAll('input')
    const button = document.querySelector('button')

    const lockedUntil =
        <?php echo isset($_SESSION['login_locked_until']) ? $_SESSION['login_locked_until'] : 0; ?>

    if (lockedUntil) {
        const intervalId = setInterval(() => {
            const now = Math.floor(Date.now() / 1000)
            const remainingTime = lockedUntil - now

            if (remainingTime <= 0) {
                clearInterval(intervalId);
                timerElement.textContent = '00:00'
                timerElement.style.display = 'none'
                for (const input of inputs) {
                    input.disabled = false
                }
                button.disabled = false
            } else {
                const minutes = Math.floor(remainingTime / 60)
                const seconds = remainingTime % 60

                const formattedTime = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`
                timerElement.textContent = formattedTime
                timerElement.style.display = 'block'
            }
        }, 1000)
    }
})
</script>

</html>