<?php
    $ucid = $_COOKIE['ucid'];
    $arr = array( "ucid" => $ucid);
    $data = json_encode($arr);
    $curl = curl_init('https://web.njit.edu/~aar73/Ace.php');
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_COOKIEJAR,'cookie.txt');
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //result is the exam array
    $result = curl_exec($curl);
    curl_close($curl);
    $exam = json_decode($result,true);
?>
<html>
    <head>
        <title>Exam</title>
        <link rel="stylesheet" type="text/css" href="style1.css">
    </head>
    <body>
        <br>
        <h1 style="text-align: center;">Take the Exam</h1>
        <form id ="examQuestions" style="text-align:center;" method="POST">
        <?php $i = 0; ?>
        <?php $id = $exam["student_examid"]; ?>
        <?php foreach($exam["questions"] as $question): ?>
            <h3> <?php echo $question["instructions"]; ?> </h3> 
            <p> Point Value: <?php echo $question["pointvalue"]; ?> points</p>
            <textarea id="answer" name="questions[<?php echo $i; ?>][answer]" placeholder="Enter Your Answer Here" value="" style="height:100px; width: 450px;" required></textarea><br><br>

            <input type="hidden" name="questions[<?php echo $i; ?>][student_questionid]" value="<?php echo $question["student_questionid"]; ?>" />
            <input type="hidden" name="questions[<?php echo $i; ?>][instructions]" value="<?php echo $question["instructions"]; ?>" />
            <input type="hidden" name="questions[<?php echo $i; ?>][topic]" value="<?php echo $question["topic"]; ?>" />
            <input type="hidden" name="questions[<?php echo $i; ?>][name]" value="<?php echo $question["name"]; ?>" />
            <input type="hidden" name="questions[<?php echo $i; ?>][student_examid]" value="<?php echo $id; ?>" />
            <input type="hidden" name="questions[<?php echo $i; ?>][pointvalue]" value="<?php echo $question["pointvalue"]; ?>" />
            <input type="hidden" name="questions[<?php echo $i; ?>][input1]" value="<?php echo $question["input1"]; ?>" />
            <input type="hidden" name="questions[<?php echo $i; ?>][result1]" value="<?php echo $question["result1"]; ?>" />
            <input type="hidden" name="questions[<?php echo $i; ?>][input2]" value="<?php echo $question["input2"]; ?>" />
            <input type="hidden" name="questions[<?php echo $i; ?>][result2]" value="<?php echo $question["result2"]; ?>" />
            <?php $i++; ?>
        <?php endforeach; ?>           
                     
            <input type = "submit" value = "Submit my Exam" id="submitExam">
        </form>
        <div class = "centerBTN" style="text-align:center;">
        <input type ="reset" >
        <input type = "submit" onclick = "window.location.href = 'https://web.njit.edu/~aet6/cs490beta/studentLanding.html';" value="Return to the Homepage"/><br><br><br> 
        
        <script>        
        var formRef = document.getElementById("examQuestions"); 
        
        //check data input and submit to the DB, displays status message if successful       
        function handleClick(event){
            event.preventDefault();            
            var fieldData = new FormData(formRef);
            console.log(fieldData);
           fetch("https://web.njit.edu/~aar73/Claire.php",{method: "POST", body: fieldData, credentials:"include"})
                .then(response => {
                    return response.json();
                })
                .then(body => {
                    console.log(body)
                    window.alert(body.message);
                    window.location.href = 'https://web.njit.edu/~aet6/cs490beta/studentLanding.html';
                    })
            }
        var subBTN = document.getElementById("submitExam");
        subBTN.onclick = handleClick;
        </script>
        </div>
    </body>
</html>