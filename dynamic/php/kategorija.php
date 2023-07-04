<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>France info</title>
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
            <div class="news">
                <?php
                if (isset($_GET['id'])) {
                    if ($_GET['id'] == 'elections') {
                        echo '<h2 id="elections" class="margin">ELECTIONS EUROPEENNES 2019</h2>';
                    } else {
                        echo '<h2 id="lesjt" class="margin">LES JT</h2>';
                    }
                    echo '<section class="margin lesjt">';

                    include 'connect.php';
                    define('UPLPATH', '../images/');

                    if ($dbc) {
                        $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='" . $_GET['id'] . "'";
                        $result = mysqli_query($dbc, $query)
                            or die("Error querying database.");

                        if ($result) {
                            $article = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                if ($article == 4) {
                                    echo '
                                    </section>
                                    <section class="margin lesjt drugiRed">';
                                    $article = 0;
                                }
                                if ($article == 3) {
                                    echo "
                                    <article class='zadnji'>";
                                } else {
                                    echo "
                                    <article>";
                                }
                                echo "
                                    <figure>
                                        <img src='" . UPLPATH . $row['slika'] . "' alt='" . $row['slika'] . "'>
                                        <figcaption>
                                            <a href='clanak.php?id=" . $row['id'] . "'>" . $row['naslov'] . "</a>
                                        </figcaption>
                                    </figure>
                                </article>";
                                $article++;
                            }
                            echo "
                            </section>";
                        }
                    }
                    mysqli_close($dbc);
                } else {
                    echo "<p>Nedostaje id kategorije</p>";
                }
                ?>
                
            </div>
            <footer>
                <aside class="lijevi">
                    <p>Kristijan Jagunec</p>
                    <p>E-mail: kjagunec@tvz.hr</p>
                    <p>2023</p>
                </aside>
                <aside class="desni">
                    <p>france.tv</p>
                </aside>
            </footer>
        </main>
    </body>
</html>