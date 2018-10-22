<html lang="en">

<head>
    <?php
        $user = $_POST["username"];
        $pwd = md5 ($_POST["password"]);
    ?>
    <script>
        if(<?php echo $user; ?> == "Admin" && <?php echo $pwd; ?> == "f4e190e72617ea6ae6e7c96ee1e6c089")
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typer Free</title>
    <link rel="icon" href="data:image/x-icon;base64,AAABAAEAEBAAAAEAIAAoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD/AAAA/wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA/wAAAP8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAP8AAAD/AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD/AAAA/wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA/wAAAP8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAP8AAAD/AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD/AAAA/wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABkZGT/ZGRk/wD///8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAZGRk/wD///8A////AP///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD///8A////AP///wD///8A////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAP///wD///8A////AP///wD///8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA////AP///wD///8A////AP///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD///8A////AP////8A////AP//AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAP////8A////AP///wD///8A//8AAAAA" type="image/ico" sizes="16x16">
    <style>
        input[TYPE=file] {
            display: none;
        }
        
        #format {
            text-align: center;
            position: absolute;
            left: 55%;
            width: 25%;
            right: 20%;
            top: 0;
            bottom: 0;
            border: solid;
            height: 570px;
        }
        
        #menu {
            text-align: center;
            position: absolute;
            left: 80%;
            top: 0;
            bottom: 0;
            border: solid;
            height: 570px;
        }
        
        input {
            width: 100%;
        }
        
        div.editable {
            width: 55%;
            border: solid;
            overflow: auto;
            height: 545px;
        }
        
        button {
            width: 100%;
        }
        
        #overlay {
            position: fixed;
            display: block;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 2;
            cursor: pointer;
        }
        
        #text {
            position: absolute;
            top: 50%;
            left: 50%;
            font-size: 50px;
            background-color: white;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
        }
        
        .splash {
            text-align: center;
            color: orange;
        }
        
        #splashexit {
            width: 100px;
            height: 100px;
            position: absolute;
            right: -20%;
            top: -20%;
        }
        
        #ez {
            line-height: 60%;
            font-family: sans-serif;
            color: red;
            position: absolute;
            font-size: 500%;
            background-color: white;
            animation: spin 2s cubic-bezier(0.05, 1, 0.05, 1) infinite;
            top: 50%;
            left: 46%;
        }
        
        #loader {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            background-color: rgb(255, 255, 255);
            z-index: 3;
            cursor: progress;
        }
        
        #load {
            position: absolute;
            top: 65%;
            bottom: 35%;
            text-align: center;
            margin: auto;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        @keyframes spin {
            0% {
                left: 0;
                right: 100%;
            }
            50% {
                right: 0;
                left: 100%;
            }
            100% {
                left: 0;
                right: 100%;
            }
        }
    </style>
    <script>
        function readFile() {
            var file = document.getElementsByTagName("input")[0].files[0];
            var reader = new FileReader();
            reader.onload = function(evt) {
                alert("Loaded");
                document.getElementsByClassName("editable")[0].innerHTML = evt.target.result;
            };
            reader.readAsText(file, "UTF-8");
        }

        function downloadTXT() {
            var text = document.getElementsByClassName("editable")[0].textContent;
            var filename = document.getElementsByTagName("input")[1].value;
            var element = document.createElement('a');
            element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
            element.setAttribute('download', filename);

            element.style.display = 'none';
            document.body.appendChild(element);
            element.click();
            alert("Downloading!");
            document.body.removeChild(element);
        }

        function downloadHTML() {
            var text = document.getElementsByClassName("editable")[0].innerHTML;
            var filename = document.getElementsByTagName("input")[1].value;
            var element = document.createElement('a');
            element.setAttribute('href', 'data:text/html;charset=utf-8,' + encodeURIComponent(text));
            element.setAttribute('download', filename);
            element.style.display = 'none';
            document.body.appendChild(element);
            element.click();
            alert("Downloading!");
            document.body.removeChild(element);
        }

        function DS() {
            var editable = document.getElementsByClassName("editable")[0].innerHTML;
            document.getElementsByClassName("editable")[0].innerHTML = "";
            var text = document.body.innerHTML + document.head.innerHTML;
            var filename = "Typer.html";
            var element = document.createElement('a');
            element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
            element.setAttribute('download', filename);
            element.style.display = 'none';
            document.body.appendChild(element);
            element.click();
            alert("Downloading!");
            document.body.removeChild(element);
            document.getElementsByClassName("editable")[0].innerHTML = editable;
        }

        function downloadCC() {
            var text = prompt("Type of file\neg. txt, html, py, ect.", "py");
            if (text == null || text == "") {} else {
                var filename = "typerdownload." + text;
                var element = document.createElement('a');
                element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
                element.setAttribute('download', filename);
                element.style.display = 'none';
                document.body.appendChild(element);
                element.click();
                alert("Downloading!");
                document.body.removeChild(element);
            }
        }

        function upload() {
            document.getElementsByTagName("input")[0].click();
        }

        function formatHeading() {
            var hsize = document.getElementById('h').value
            var heading = document.getElementsByClassName("format")[0].value;
            var headingChild = document.createElement("h" + hsize);
            headingChild.innerHTML = heading;
            var headingParent = document.getElementsByClassName("editable")[0];
            headingParent.appendChild(headingChild);
        }

        function formatIMG() {
            var src = document.getElementsByClassName("format")[3].value;
            var wid = document.getElementsByClassName("format")[4].value;
            var hei = document.getElementsByClassName("format")[5].value;
            var imgChild = document.createElement("img");
            imgChild.setAttribute("src", src);
            imgChild.setAttribute("width", wid);
            imgChild.setAttribute("height", hei);
            var imgParent = document.getElementsByClassName("editable")[0];
            imgParent.appendChild(imgChild);
        }

        function openInNewTab() {
            var newtabtext = document.getElementsByClassName("editable")[0].innerHTML;
            var openinnew = window.open("");
            openinnew.document.body.innerHTML = "<title>Typer</title>" + newtabtext;
        }

        function print() {
            var newtabtext = document.getElementsByClassName("editable")[0].innerHTML;
            var openinnew = window.open("");
            openinnew.document.body.innerHTML = "<title>Typer</title>" + newtabtext;
            openinnew.window.close();
            openinnew.window.print();

        }

        function formatTable() {
            var i = 0;
            var j = 0;
            var color = document.getElementById("tcolor").value;
            var row = document.getElementsByClassName("format")[1].value;
            var col = document.getElementsByClassName("format")[2].value;
            var headingChild = document.createElement("table");
            headingChild.setAttribute("style", "border: solid; border-color: " + color + ";");
            var headingParent = document.getElementsByClassName("editable")[0];
            headingParent.appendChild(headingChild);
            while (i < row) {
                var rowParent = headingChild.insertRow(-1);
                j = 0;
                while (j < col) {
                    var cellParent = rowParent.insertCell(-1);
                    cellParent.style = "border: solid; border-color: " + color + ";";
                    j++;
                }
                i++;
            }
        }

        function gImages() {
            var query = document.getElementById("search").value;
            var url = "https://www.google.com/search?q=" + encodeURI(query) + "&tbm=isch";
            window.open(url)
        }
    </script>
</head>

<body onload="document.getElementById('loader').style.visibility = 'hidden';">

    <div id="loader">
        <div id="ez">E
            <br>Z</div>
        <div id="load">Loading...</div>
    </div>
    <div id="overlay">
        <div id="text">
            <div id="splashexit">
                <button onclick="document.getElementById('overlay').style.display = 'none';" style="width: 50px; text-align: center;">
                    X
                </button>
            </div>
            <p class="splash">Welcome to Typer,v! <strong>Free</strong>!
                <br>© 2018 <a href="http://www.ethanzone.net">EthanZone</a>
                <br>Have fun typing!
            </p>
        </div>
    </div>
    <input type="file" onchange="readFile();">
    <div id="menu">
        <strong>Menu</strong>
        <hr>
        <input placeholder="Filename">
        <button onclick="downloadTXT();">Download As .TXT</button>
        <br>
        <br>
        <button onclick="downloadCC();">Download As Custom file</button>
        <br>
        <br>
        <button onclick="downloadHTML();">Download As .HTML</button>
        <br>
        <br>
        <button onclick="upload();">Upload file</button>
        <br>
        <br>
        <button onclick="DS();">Download Source</button>
        <br>
        <br>
        <button onclick="openInNewTab();">Open text in new tab</button>
        <br>
        <br>
        <button onclick="print();">Print</button>
        <br>
        <br>
        <button onclick="document.getElementById( 'overlay').style.display='block' ; ">Splash screen</button>
        <br>
        <br>
        <a rel="license" href="http://creativecommons.org/licenses/by-nd/4.0/"><img alt="Creative Commons License" style="border-width:0 " src="https://i.creativecommons.org/l/by-nd/4.0/88x31.png " /></a>
        <br />This work is licensed under a <a rel="license " href="http://creativecommons.org/licenses/by-nd/4.0/ ">Creative Commons Attribution-NoDerivatives 4.0 International License</a>.
        <br>
        <br> Thank you
        <br>
        <br>
    </div>
    <div id="format">
        <strong>
            Format</strong>
        <hr>
        <input class="format ">Size:
        <select id="h">
            <option value="1">First heading</option>
            <option value="2">Second heading</option>
            <option value="3">Third heading</option>
            <option value="4">Fourth heading</option>
            <option value="5">Fifth heading</option>
            <option value="6">Sixth heading</option>
        </select>
        <button onclick="formatHeading();">Insert Heading</button>
        <br>
        <br>Size:
        <input class="format" maxlength="2" style="width: 30%;"> X
        <input class="format" maxlength="2" style="width: 30%;">
        <br>Color:
        <input type="color" id="tcolor">
        <button onclick="formatTable();">Insert Table</button>
        <br>
        <br>Image Source Url:
        <input class="format">
        <br>Size:
        <input class="format" style="width: 30%;"> X
        <input class="format" style="width: 30%;">
        <button onclick="formatIMG();">Insert Image</button>
        <br>
        <br>Search:
        <input id="search">
        <button onclick="gImages(); ">Get images from google</button>
        <br>
        <br>Text Color
        <br>
        <input type="color" id="colour_in" value="#00ff00">
        <button id="update_colour">Change Color</button>
        <br>
        <br>Highlight Color
        <input type="color" id="high_in" value="#ffff00">
        <button id="update_highlight">Change Highlight</button>
    </div>
    <br>

    <div contenteditable="true" class="editable"></div>
    <br>
    <script>
        document.getElementById("update_colour").onclick = function() {
            sel = window.getSelection();
            if (sel.rangeCount && sel.getRangeAt) {
                range = sel.getRangeAt(0);
            }
            document.designMode = "on";
            if (range) {
                sel.removeAllRanges();
                sel.addRange(range);
            }
            var dd = document.getElementById("colour_in");
            var strUser = dd.value;
            document.execCommand("ForeColor", false, strUser);
            document.designMode = "off ";
        }

        document.getElementById("update_highlight").onclick = function() {
            sel = window.getSelection();
            if (sel.rangeCount && sel.getRangeAt) {
                range = sel.getRangeAt(0);
            }
            document.designMode = "on";
            if (range) {
                sel.removeAllRanges();
                sel.addRange(range);
            }
            var dd = document.getElementById("high_in");
            var strUser = dd.value;
            document.execCommand("BackColor", false, strUser);
            document.designMode = "off";
        }
    </script>
</body>

</html>
