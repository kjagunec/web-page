<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>France info</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <main>
            <header>
                <img class="logo" src="images/Franceinfologo.png" alt="logo">
                <nav>
                    <ul class="margin">
                        <li>
                            <a href="index.php">home</a>
                        </li>
                        <li>
                            <a href="php/kategorija.php?id=elections">elections</a>
                        </li>
                        <li>
                            <a href="php/kategorija.php?id=lesjt">les jt</a>
                        </li>
                        <li>
                            <a href="php/administracija.php">administracija</a>
                        </li>
                        <li>
                            <a href="php/unos.php">unos</a>
                        </li>
                    </ul>
                </nav>
            </header>
            <div class="news">
                <h2 id="elections" class="margin">ELECTIONS EUROPEENNES 2019</h2>
                <section class="margin">
                    <?php
                    include 'php/connect.php';
                    define('UPLPATH', 'images/');

                    $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='elections' LIMIT 5";
                    $result = mysqli_query($dbc, $query);

                    $row_count = mysqli_num_rows($result);
                    for ($i = 0; $i < $row_count; $i++) {
                        $row = mysqli_fetch_array($result);
                        if ($i == $row_count - 1) {
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
                                    <a href='php/clanak.php?id=" . $row['id'] . "'>" . $row['naslov'] . "</a>
                                </figcaption>
                            </figure>
                        </article>";
                    }
                    ?>
                </section>
            </div>
            <div class="news">
                <h2 id="lesjt" class="margin">LES JT</h2>
                <section class="lesjt margin">
                    <?php
                    $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='lesjt' LIMIT 4";
                    $result = mysqli_query($dbc, $query);

                    $row_count = mysqli_num_rows($result);
                    for ($i = 0; $i < $row_count; $i++) {
                        $row = mysqli_fetch_array($result);
                        if ($i == $row_count - 1) {
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
                                    <a href='php/clanak.php?id=" . $row['id'] . "'>" . $row['naslov'] . "</a>
                                </figcaption>
                            </figure>
                        </article>";
                    }
                    mysqli_close($dbc);
                    ?>
                </section>
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