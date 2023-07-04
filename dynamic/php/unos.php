<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Unos</title>
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
            if (isset($_POST['submit'])) {
                include 'connect.php';

                if ($dbc) {
                    $picture = $_FILES['pphoto']['name']; 
                    $title=$_POST['title']; 
                    $about=$_POST['about']; 
                    $content=$_POST['content']; 
                    $category=$_POST['category']; 
                    $date=date('Y-m-d'); 
                    if (isset($_POST['archive'])) { 
                        $archive=1; 
                    } else { 
                        $archive=0; 
                    } 
                    
                    $target_dir = '../images/'.$picture; 
                    move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir); 

                    $query = "INSERT INTO Vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva ) 
                        VALUES ('$date', '$title', '$about', '$content', '$picture', '$category', '$archive')"; 
                    $result = mysqli_query($dbc, $query) or die('Error querying database.');
                    if ($result) {
                        echo "<p>Uspjesno dodana vijest</p>";
                    }
                    mysqli_close($dbc);
                } else {
                    echo "<p>Neuspjesno spajanje na bazu :'(</p>";
                }
            } else {
                echo '
                <form action="" method="POST" name="forma" class="margin" enctype="multipart/form-data">
                <div class="form-item">
                    <span id="porukaTitle" class="bojaPoruke"></span>
                    <label for="title">Naslov vijesti</label>
                    <div class="form-field">
                        <input type="text" name="title" id="title" class="form-field-textual">
                    </div>
                </div>
                <div class="form-item">
                <span id="porukaAbout" class="bojaPoruke"></span>
                    <label for="about">Kratki sadržaj vijesti (do 50 znakova)</label>
                    <div class="form-field">
                        <textarea name="about" id="about" cols="30" rows="10" class="form-field-textual"></textarea>
                    </div>
                </div>
                <div class="form-item">
                    <span id="porukaContent" class="bojaPoruke"></span>
                    <label for="content">Sadržaj vijesti</label>
                    <div class="form-field">
                        <textarea name="content" id="content" cols="30" rows="10" class="form-field-textual"></textarea>
                    </div>
                </div>
                <div class="form-item">
                    <span id="porukaSlika" class="bojaPoruke"></span>
                    <label for="pphoto">Slika: </label>
                    <div class="form-field">
                        <input type="file" accept="image/jpg,image/gif" class="input-text" id="pphoto" name="pphoto"/>
                    </div>
                </div>
                <div class="form-item">
                    <span id="porukaKategorija" class="bojaPoruke"></span>
                    <label for="category">Kategorija vijesti</label>
                    <div class="form-field">
                        <select name="category" id="category" class="form-field-textual">
                            <option value=""></option>
                            <option value="elections">Elections</option>
                            <option value="lesjt">Les Jt</option>
                        </select>
                    </div>
                </div>
                <div class="form-item">
                    <label>Spremiti u arhivu:
                        <div class="form-field">
                            <input type="checkbox" name="archive" id="archive">
                        </div>
                    </label>
                </div>
                <div class="form-item">
                    <button type="reset" name="reset" value="Poništi">Poništi</button>
                    <button type="submit" name="submit" id="slanje" value="Prihvati">Prihvati</button>
                </div>
            </form>';
            }
            ?>
            <script type="text/javascript">
            // Provjera forme prije slanja
            document.getElementById("slanje").onclick = function(event) {
                var slanjeForme = true;
                // Naslov vjesti (5-30 znakova) var
                poljeTitle = document.getElementById("title");
                var title = document.getElementById("title").value;
                if (title.length < 5 || title.length > 30) {
                    slanjeForme = false;
                    poljeTitle.style.border="1px dashed red";
                    document.getElementById("porukaTitle").innerHTML="Naslov vjesti mora imati između 5 i 30 znakova!<br>";
                } else {
                    poljeTitle.style.border="1px solid green";
                    document.getElementById("porukaTitle").innerHTML="";
                } 
                // Kratki sadržaj (10-100 znakova)
                var poljeAbout = document.getElementById("about");
                var about = document.getElementById("about").value;
                if (about.length < 10 || about.length > 100) {
                    slanjeForme = false;
                    poljeAbout.style.border="1px dashed red";
                    document.getElementById("porukaAbout").innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!<br>";
                } else {
                    poljeAbout.style.border="1px solid green";
                    document.getElementById("porukaAbout").innerHTML="";
                } 
                // Sadržaj mora biti unesen
                var poljeContent = document.getElementById("content");
                var content = document.getElementById("content").value;
                if (content.length == 0) {
                    slanjeForme = false;
                    poljeContent.style.border="1px dashed red";
                    document.getElementById("porukaContent").innerHTML="Sadržaj mora biti unesen!<br>";
                } else {
                    poljeContent.style.border="1px solid green";
                    document.getElementById("porukaContent").innerHTML="";
                } 
                // Slika mora biti unesena
                var poljeSlika = document.getElementById("pphoto");
                var pphoto = document.getElementById("pphoto").value;
                if (pphoto.length == 0) {
                    slanjeForme = false;
                    poljeSlika.style.border="1px dashed red";
                    document.getElementById("porukaSlika").innerHTML="Slika mora biti unesena!<br>";
                } else {
                    poljeSlika.style.border="1px solid green";
                    document.getElementById("porukaSlika").innerHTML="";
                } 
                // Kategorija mora biti odabrana
                var poljeCategory = document.getElementById("category");
                if (document.getElementById("category").selectedIndex == 0) {
                    slanjeForme = false;
                    poljeCategory.style.border="1px dashed red";
                    document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!<br>";
                } else {
                    poljeCategory.style.border="1px solid green";
                    document.getElementById("porukaKategorija").innerHTML="";
                }
                if (slanjeForme != true) { event.preventDefault(); } 
            };
        </script>
            <footer class="clanakFooter">
                <img class="logo" src="../images/France_info.jpg" alt="logo">
            </footer>
        </main>
    </body>
</html>