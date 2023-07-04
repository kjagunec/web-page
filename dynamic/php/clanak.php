<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Clanak</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <body>
        <main>
            <header>
                <img class="logo" src="../images/Franceinfologo.png" alt="logo">
                <nav>
                    <ul class="margin">
                        <li>
                            <a href="../index.php">home</a>
                        </li>
                        <li>
                            <a href="kategorija.php?id=elections">elections</a>
                        </li>
                        <li>
                            <a href="kategorija.php?id=lesjt">les jt</a>
                        </li>
                        <li>
                            <a href="administracija.php">administracija</a>
                        </li>
                        <li>
                            <a href="unos.php">unos</a>
                        </li>
                    </ul>
                </nav>
            </header>
            <section class="margin clanak">
                <?php
                if (isset($_GET['id'])) {
                    include 'connect.php';
                    define('UPLPATH', '../images/');

                    if ($dbc) {
                        $query = "SELECT * FROM vijesti WHERE id=" . $_GET['id'];
                        $result = mysqli_query($dbc, $query)
                            or die("Error querying database.");

                        if ($result) {
                            $row = mysqli_fetch_array($result);

                            echo '
                            <h1>' . $row['naslov'] . '</h1>
                            <h3>' . $row['sazetak'] . '</h3>
                            <img src="' . UPLPATH . $row['slika'] . '" alt="slika">
                            <p>' . $row['tekst'] . '</p>';
                        }
                    }
                    mysqli_close($dbc);
                } else {
                    echo "<p>Nedostaje id clanka</p>";
                }
                ?>
            </section>
            <footer class="clanakFooter">
                <img class="logo" src="../images/France_info.jpg" alt="logo">
            </footer>
        </main>
    </body>
</html>