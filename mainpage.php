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
    <script>
        var formRef = document.getElementById("loginform");
        
        function handleClick(event){
            event.preventDefault();
            var fieldData = new FormData(formRef);
            console.log(fieldData);            
           fetch("login.php",{method: "POST", body: fieldData, credentials: 'include'})
                .then(response => {
                    return response.json();
                })
                .then(body => {                   
                    console.log(body)
                    if(body.role === "Instructor"){
                        document.cookie = 'ucid='+body.ucid+'; path=/';
                        document.cookie = 'role=Instructor; path=/';                        
                        window.location.href = "https://web.njit.edu/~aet6/cs490beta/profLanding.html";
                    }
                    else if (body.role === "Student"){
                        document.cookie = 'ucid='+body.ucid+'; path=/';
                        document.cookie = 'role=Student; path=/';  
                        window.location.href = "https://web.njit.edu/~aet6/cs490beta/studentLanding.html";
                    }     
                    else{
                        window.alert("Credentials Not Valid");
                        }     
                })
        }
        var button = document.getElementById("loginBTN");
        button.onclick = handleClick;
        
    </script>
             
</body>
</html>

