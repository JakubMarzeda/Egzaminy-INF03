<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podróże dalekie i bliskie</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <header>
        <h1>Biuro podróży: WESOŁA WYPRAWA</h1>
    </header>
    <section class="cookie-container">
        <?php
            if(isset($_COOKIE["ciastko"])) {
                echo "<p>Witaj ponownie na naszej stronie</p>";
            } else if (!isset($_COOKIE["ciastko"])) {
                echo"<p>Witaj! Nasza strona używa ciasteczek</p>";
                setcookie("ciastko", 1, time() + 3600);
            }
        ?>
    </section>
    <main>
        <section class="left-container">
            <table>
                <tr>
                    <td><img src="polska.jpg" alt="zwiedzanie Krakowa"></td>
                    <td><img src="wlochy.jpg" alt="Wenecja i nie tylko"></td>
                </tr>
                <tr>
                    <td><img src="grecja.jpg" alt="gorące Greckie wyspy"></td>
                    <td><img src="hiszpania.jpg" alt="Słoneczna Barcelona"></td>
                </tr>
            </table>
        </section>
        <section class="right-container">
            <h3>Proponujemy wycieczki</h3>
            <ul>
                <li>
                    autokarowe
                    <ol>
                        <li>po Polsce z przewodnikiem</li>
                        <li>do Niemiec i Czech</li>
                    </ol>
                </li>
                <li>
                    samolotem
                    <ol>
                        <li>wczasy w Grecji</li>
                        <li>Zwiedzanie Barcelony</li>
                        <li>zwiedzanie Wenecji</li>
                    </ol>
                </li>
            </ul>
            <h3>Pobierz dokumenty</h3>
            <p><a href="regulamin.txt">Regulamin korzystania z usług biura podróży</a></p>
            <p><a href="http://galeria.pl/" target="_blank">Tu znajdziesz zdjęcia z naszych wycieczek</a></p>
        </section>
    </main>
    <footer>
        Stronę przygotował: 07231510678
    </footer>
</body>
</html>