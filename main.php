<?php
session_start(); // START SESSION
include "Connection.php";
$Id_User = $_SESSION['id_user'];
$Name = $_SESSION['name'];
$Email = $_SESSION['email'];
$Level = $_SESSION['level'];
$Whatsapp = $_SESSION['whatsapp'];
$Username = $_SESSION['username'];

if (isset($_POST['feedback'])) {
    $feedback = $_POST['feedbackk'];
    $Insert = mysqli_query($conn, "INSERT INTO tb_feedback VALUES ('$Name', '$feedback')");
    echo "<meta http-equiv=refresh content=1;URL='Home.php'>";
}

$Time = gmdate("H:i", time() + 7 * 3600); // SET TIME FOR GREETING
$T = explode(":", $Time);
$Hours = $T[0];
$Second = $T[1];
if ($Hours >= 00 and $Hours < 11) {
    if ($Second >= 00 and $Second < 60) {
        $Greet = "Good Morning";
    }
} else if ($Hours >= 11 and $Hours < 18) {
    if ($Second >= 00 and $Second < 60) {
        $Greet = "Good Afternoon";
    }
} else if ($Hours >= 18 and $Hours <= 24) {
    if ($Second >= 00 and $Second < 60) {
        $Greet = "Good Night";
    }
} else {
    $Greet = "Error";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Piqconan</title>
    <link rel="stylesheet" href="Login.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");
    </style>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>

<body>
    <div class="header">
        <div class="navbar">
            <div class="navbarLeft">
                <p>Piqconan</p>
            </div>
            <div class="navbarRight">
                <a href="#Home">Home</a>
                <a href="#About">About</a>
                <a href="mailto:fiqutaufiq@gmail.com">Contact</a>
            </div>
        </div>
    </div>

    <section id="Home" class="Home">
        <div class="HomePage">
            <p>
                <?php echo $Greet; ?>,
                <?php echo $_SESSION['name']; ?>. Welcome to
            </p>
            <p>
                Piqconan Portfolio.
            </p>
            <p>You can look for inspiration from here for your design</p>
        </div>
    </section>
    <img src="Image/Port.png" width="100%" height="200px" />
    <section id="About">
        <h1>M. Taufiqqurahman</h1>
        <h6>Design Graphic | Photographer | Video Editor</h6>
        <p>M. Taufiqqurahman is a versatile creative soul who seamlessly navigates the realms of graphic design, video
            editing, and photography. With an innate knack for visual storytelling, Taufiqqurahman crafts stunning
            narratives through his designs, meticulously weaving together colors, shapes, and concepts to breathe life
            into his creations.<br><br>

            As a graphic designer, he is a maestro in translating ideas into captivating visuals. His keen eye for
            detail and a deep understanding of aesthetics allow him to produce designs that are not just visually
            striking but also convey a profound message. Each design reflects his dedication to precision and his
            commitment to delivering excellence.<br><br>

            Taufiqqurahman's prowess extends beyond static designs; he is a skilled video editor, seamlessly piecing
            together moments to form compelling narratives. Through his editing finesse, he transforms raw footage into
            cinematic masterpieces that resonate with emotion and captivate audiences.<br><br>

            Furthermore, his passion for photography unveils a unique perspective on the world. Behind the lens, he
            captures fleeting moments and turns them into timeless treasures. Whether it's landscapes, portraits, or
            conceptual art, his photographs exude a distinct blend of artistry and storytelling.<br><br>

            In essence, M. Taufiqqurahman is a multifaceted artist whose creative brilliance knows no bounds. His
            ability to merge imagination with technical expertise results in a body of work that not only delights the
            eyes but also evokes a myriad of emotions, leaving a lasting impact on those who experience his artistry.
        </p>
    </section>
    <form class="feedback" method="POST">
        <p>Give your feedback</p>
        <input type="text" name="feedbackk" placeholder="Type Something..." required>
        <button name="feedback">SUBMIT</button>
    </form>
    <?php
    include "Connection.php";

    ?>

</body>

</html>