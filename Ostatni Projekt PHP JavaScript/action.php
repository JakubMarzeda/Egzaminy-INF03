<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styl1.css">
    <script src="main.js"></script>
</head>
<body>
    <nav>
        <a href="animation.php">Animation in CSS</a>
        <a href="dl.php">Definition list in HTML</a>
        <a href="video.php">Video in HTML</a>
        <a href="action.php">Eventy in JS</a>
        <form method="POST" style="display:inline;">
            <button type="submit" name="logout">Log out</button>
        </form>
    </nav>
    <main>
        <section>
            <h3>OnClick event</h3>
            <button onclick="clickedButton()">Click</button>
        </section>
        <section>
            <h3>OnDbClick event</h3>
            <button ondblclick="doubleClickedButton()">Double click</button>
        </section>
        <section>
            <h3>OnMouseOver event</h3>
            <button onmouseover="mouseOverButton()">Mouse over</button>
        </section>
        <section>
            <h3>OnMouseOut event</h3>
            <button onmouseout="mouseOutButton()">Mouse out</button>
        </section>
        <section>
            <h3>OnMouseMove event</h3>
            <button onmousemove="mouseMoveButton()">Mouse move</button>
        </section>
        <section>
            <h3>Mousedown event</h3>
            <button onmousedown="mouseDownButton()">Mouse move</button>
        </section>
        <section>
            <h3>MouseMove event</h3>
            <button onmouseup="mouseUpButton()">Mouse move</button>
        </section>
        <section>
            <h3>Focus event</h3>
            <input type="text" onfocus="focusInput()" placeholder="Focus on me">
        </section>
        <section>
            <h3>Blur event</h3>
            <input type="text" onblur="blurInput()" placeholder="Blur me">
        </section>
        <section>
            <h3>Change event</h3>
            <input type="text" onchange="changeInput()" placeholder="Change me">
        </section>
        <section>
            <h3>Change select event</h3>
            <select onchange="changeSelect()">
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
        </section>
        <section>
            <h3>Keydown event</h3>
            <input type="text" onkeydown="keyDownInput()" placeholder="Press a key">
        </section>
        <section>
            <h3>Keyup event</h3>
            <input type="text" onkeyup="keyUpInput()" placeholder="Release a key">
        </section>
        <section>
            <form action="action.php" method="post">
                <input type="text" placeholder="Type something...">
                <button type="button" onsubmit="submitButton(event)">Submit</button>
            </form>
        </section>
        <section>
            <form action="action.php" method="reset">
                <input type="text" placeholder="Type something...">
                <button type="reset" onreset="resetButton()">Reset</button>
            </form>
        </section>
    </main>
    <?php
        require_once "utils.php";
        if (isset($_POST["logout"])) {
            logout();
        }
    ?>
</body>

</html>