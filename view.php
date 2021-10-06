<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        function doSearch () {
            var data = new FormData();
            data.append("search", document.getElementById("search").value);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "controller.php");
            xhr.onload = function(){
                let results = document.getElementById("results"),
                search = JSON.parse(this.response);
                results.innerHTML = "";
                if (search !== null) { for (let s of search) {
                results.innerHTML += `<div>${s.uid} - ${s.fname}</div>`;
                }}
            };
            xhr.send(data);
            return false;
        }
    </script>
    <form onsubmit="return doSearch()">
    <input type="text" id="search" required/>
    <input type="submit" value="Search"/>
    </form>
    <div id="results"></div>
</body>
</html>