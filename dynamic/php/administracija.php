<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Administracija</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <body>
        <main class="unos">
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
            <?php
            session_start();
            include 'connect.php';
            define('UPLPATH', '../images/');

            $uspjesnaPrijava = false;
            $prviPokusaj = true;
            
            if (isset($_POST['prijava'])) {
                $prijavaImeKorisnika = $_POST['username'];
                $prijavaLozinkaKorisnika = $_POST['lozinka'];
                $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?";
                $stmt = mysqli_stmt_init($dbc);
                
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                }

                mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika);
                mysqli_stmt_fetch($stmt);
                
                if (password_verify($_POST['lozinka'], $lozinkaKorisnika) && mysqli_stmt_num_rows($stmt) > 0) {
                    $uspjesnaPrijava = true;
                    
                    if($levelKorisnika == 1) {
                        $admin = true;
                    } else {
                        $admin = false;
                    }

                    $_SESSION['$username'] = $imeKorisnika;
                    $_SESSION['$level'] = $levelKorisnika;
                } else {
                    $prviPokusaj = false;
                }
            }

            if (($uspjesnaPrijava == true && $admin == true) || (isset($_SESSION['$username'])) && $_SESSION['$level'] == 1) {
                if (isset($_POST['delete'])) {
                    $id=$_POST['id'];
                    $query = "DELETE FROM vijesti WHERE id=$id ";
                    $result = mysqli_query($dbc, $query);
                }

                if (isset($_POST['update'])) {
                    $picture = $_FILES['pphoto']['name'];
                    $title=$_POST['title'];
                    $about=$_POST['about'];
                    $content=$_POST['content'];
                    $category=$_POST['category'];
                    if (isset($_POST['archive'])) {
                        $archive=1;
                    } else {
                        $archive=0;
                    }
                    $target_dir = UPLPATH . $picture;

                    move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);

                    $id=$_POST['id'];
                    $query = "UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content', slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id ";
                    $result = mysqli_query($dbc, $query);
                }

                $query = "SELECT * FROM vijesti";
                $result = mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($result)) {
                    echo '
                            <form enctype="multipart/form-data" action="" method="POST" class="margin">
                                <div class="form-item">
                                    <label for="title">Naslov vjesti:</label>
                                    <div class="form-field">
                                        <input type="text" name="title" class="form-field-textual" value="'.$row['naslov'].'">
                                    </div>
                                </div>
                                <div class="form-item">
                                    <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label>
                                    <div class="form-field">
                                        <textarea name="about" id="" cols="30" rows="10" class="form-field-textual">'.$row['sazetak'].'</textarea>
                                    </div>
                                </div>
                                <div class="form-item">
                                    <label for="content">Sadržaj vijesti:</label>
                                    <div class="form-field">
                                        <textarea name="content" id="" cols="30" rows="10" class="form-field-textual">'.$row['tekst'].'</textarea>
                                    </div>
                                </div>
                                <div class="form-item">
                                    <label for="pphoto">Slika:</label>
                                    <div class="form-field">
                                        <input type="file" class="input-text" id="pphoto" value="' . UPLPATH . $row['slika'] . '" name="pphoto"/>
                                        <br>
                                        <img src="' . UPLPATH . $row['slika'] . '" width=100px>
                                    </div>
                                </div>
                                <div class="form-item">
                                    <label for="category">Kategorija vijesti:</label>
                                    <div class="form-field">
                                        <select name="category" id="" class="form-field-textual" value="'.$row['kategorija'].'">
                                            <option value="elections">Elections</option>
                                            <option value="lesjt">Les jt</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-item">
                                    <label>Spremiti u arhivu:
                                        <div class="form-field">';
                            if ($row['arhiva'] == 0) {
                                echo '
                                            <input type="checkbox" name="archive" id="archive"/> Arhiviraj?';
                            } else { 
                                echo '
                                            <input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?';
                            } 
                            echo '
                                        </div>
                                    </label>
                                </div>
                                <div class="form-item">
                                    <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'">
                                    <button type="reset" value="Poništi">Poništi</button>
                                    <button type="submit" name="update" value="Prihvati"> Izmjeni</button>
                                    <button type="submit" name="delete" value="Izbriši"> Izbriši</button>
                                </div>
                            </form>';
                } 
            } else if ($uspjesnaPrijava == true && $admin == false) {
                echo '<p class ="margin">Bok ' . $imeKorisnika . '! Uspješno ste prijavljeni, ali niste administrator.</p>';
            } else if (isset($_SESSION['$username']) && $_SESSION['$level'] == 0) {
                echo '<p class="margin">Bok ' . $_SESSION['$username'] . '! Uspješno ste prijavljeni, ali niste administrator.</p>';
            } else if ($uspjesnaPrijava == false) {
                echo '
                <form action="" method="POST" class="margin">
                    <div class="form-item">
                        <label for="username">Username:</label>
                        <div class="form-field">
                            <input type="text" name="username" class="form-field-textual" required>
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="lozinka">Lozinka:</label>
                        <div class="form-field">
                            <input type="password" name="lozinka" class="form-field-textual" required>
                        </div>
                    </div>
                    <div class="form-item">
                        <button type="submit" name="prijava" value="Prijava">Prijava</button>
                    </div>
                </form>';
                
                if (!$prviPokusaj) {
                    echo "
                    <div class='margin'>
                        <p>Neuspješan login!</p>
                        <br>
                        <a href='registracija.php'>Trebate se registrirati?</a>
                    </div>";
                }
            }

            mysqli_close($dbc);
            ?>
            <footer class="clanakFooter">
                <img class="logo" src="../images/France_info.jpg" alt="logo">
            </footer>
        </main>
    </body>
</html>