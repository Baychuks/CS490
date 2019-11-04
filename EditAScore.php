<?php
    
    $ucid = $_GET['ucid'];
    $arr = array( "ucid" => $ucid);
    $data = json_encode($arr);
    $curl = curl_init('https://web.njit.edu/~aar73/Kanden.php');
    //$curl = curl_init('http://localhost/cs490/beta/placeholderPHPs/placeholderstudentScore.php');
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_COOKIEJAR,'cookie.txt');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //result should be json with that particular students info
    $result = curl_exec($curl);
    curl_close($curl);
    $student = json_decode($result,true);
      
?>
<html>
    <head>
        <title>Edit Score</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <h1 style="text-align: center;"> Edit Student Score</h1>
    <form id ="alterGrade" style="text-align:center;" method="POST">
        <?php $i = 0; ?>
        <?php foreach($student as $question): ?>
        <form id ="alterGrade" style="text-align:center;" method="POST">
        <p><b>Instructions:</b> <?php echo $question["instructions"]; ?> <br></p>
        <p><b>Student Answer:</b> <?php echo $question["answer"]; ?> <br></p>
        <p><b>Question Point Value:</b> <?php echo $question["pointvalue"]; ?> </p>
        <p><b>Points Awarded:</b> <?php echo $question["pointsearned"]; ?> <br></p>
        <p><b>Enter a new Amount to be Given for the Question:</b></p>
        <input type="number" id="points" name="questions[<?php echo $i; ?>][pointsearned]" value="<?php echo $question["pointsearned"]; ?>">
        <p><b> Enter any Comments about this Question to show the student:</b></p><br>
        <textarea id="profComment" name="questions[<?php echo $i; ?>][comment]" placeholder="Enter the Comment Here" value = "" style="height:75px; width: 450px;" ></textarea><br>
        <input type="hidden" name="questions[<?php echo $i; ?>][student_questionid]" value="<?php echo $question["student_questionid"]; ?>" />
            <?php $i++; ?>
            <?php endforeach; ?>                            
    </form>
    <div class= btnCenter style= "text-align:center">
    <br><input type = "submit" value = "Submit the Change" id="changeGrade" ><br>
    </div>
    <br>
        <script>        
        var formRef = document.getElementById("alterGrade"); 
              
        function handleClick(event){
            event.preventDefault();            
            var fieldData = new FormData(formRef);
            console.log(fieldData);
           fetch("https://web.njit.edu/~aar73/Taren.php",{method: "POST", body: fieldData, credentials:"include"})
                .then(response => {
                    return response.json();
                })
                .then(body => {
                    console.log(body)
                    window.alert(body.message);                    
                    })
            }
        var subBTN = document.getElementById("changeGrade");
        subBTN.onclick = handleClick;
        </script>

  </body>
</html>