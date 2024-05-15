<?php
    $value = '';

    if(isset($_GET['value'])){
        $value = $_GET['value'];
    }
?>

<?php 
    include('./partials/header.php');
 ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SMC - seqarch</title>
    <link rel="stylesheet" href="./styles/search.css">
    <link rel="stylesheet" href="./styles/utilities.css">
    <link rel="stylesheet" href="./styles/main.css">

</head>

<body>
    <div class="container">
        <div class="logo">
            <a href="<?php echo $baseURL ?>" class="h1 f-bold">
                <img src="<?php echo $baseURL . 'assets/imgs/360_F_479093143_1ypd13XBPiPtBJcsprzEhhxflcfqEGna.jpg' ?>"
                    alt="">
            </a>
        </div>
        <form action="./searchDB.php" method="POST">
            <input type="search" name="searchInput" value="<?php echo $value ?>" id="searchInput"
                placeholder="Search...">
            <button type="submit" name="submit">search</button>
        </form>
        <ul id="searchResults"></ul>
    </div>
</body>

<script src='./scripts/formprocessor.js'></script>
<script>
window.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('searchInput')

    input.setSelectionRange(input.value.length, input.value.length);

    input.focus()
})
</script>

</html>