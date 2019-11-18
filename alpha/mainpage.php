<html>
<head>
    <title> Log-in Form </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class = "loginbox">
        <img src = "lock.jpg" class = "lock"> 
        <h1> Welcome! </h1> 
            <div>
            <form id = "loginform" form action="login.php" method="post">                 
                <p> UCID</p>
                <input type = "text" name="njitid" >
                <p>Password</p>
                <input type = "password" name="njitpassword"> <br><br>
                <button type = "submit" id = "loginBTN" name="loginsubmit" >login</button>
            </form>
            </div> 
            <h3 id = "msgDisplay" style = "display:none">  Log-in message </h3>
    <script>
        var h3Ref = document.getElementById("msgDisplay");
        var formRef = document.getElementById("loginform");
        
        function handleClick(event){
            event.preventDefault();
            var fieldData = new FormData(formRef);
            console.log(fieldData);
            fetch("login.php",{method: "POST", body: fieldData})
                .then(response => {
                    return response.json();
                })
                .then(body => {
                    console.log(body)
                    h3Ref.style.display = "block";
                    h3Ref.innerText = body.message;
                })
        }
        var button = document.getElementById("loginBTN");
        button.onclick = handleClick;
    </script>
             
</body>
</html>

