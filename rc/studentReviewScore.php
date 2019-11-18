<?php
    //grab the specific students ucid from the cookie
    $arr = array( "ucid" => $_COOKIE['ucid']);
    $data = json_encode($arr);
    //send the student ucid to aaron
    //$curl = curl_init('https://web.njit.edu/~aar73/Mance.php');
    $curl = curl_init('http://localhost/cs490/beta/placeholderPHPs/placeholderstudentScore.php');
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_COOKIEJAR,'cookie.txt');
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //result is students grade
    $result = curl_exec($curl);
    curl_close($curl);
    $score = json_decode($result,true);

?>
<html>
    <head>
        <title> Review Exam</title>
        <link rel="stylesheet" type="text/css" href="style1.css">
    </head>
    <body>
        <br>
        <h1 style="text-align: center;">Review Your Exam Scores</h1>
        <?php $i = 0; ?>
        <div class = alignCenter style= "text-align: center;">
        <?php foreach($score["questions"] as $question): ?>
            <p><b>Instructions:</b> <?php echo $question["instructions"]; ?> <br></p>
            <p><b>Your Answer:</b> <?php echo $question["answer"]; ?> <br></p>
            <p><b>Question Point Value:</b> <?php echo $question["pointvalue"]; ?> </p>
            <p><b>Points Awarded:</b> <?php echo $question["pointsearned"]; ?> <br></p>
            <?php foreach($question["deductions"] as $deductions): ?>
                <p><b>Deduction:</b> <?php echo $deductions["message"]; ?> <br></p>
                <p><b>Points Removed:</b> <?php echo $deductions["pointsRemoved"]; ?> <br></p>
                <?php endforeach; ?> 
            <p><b>Professor Comment:</b> <?php echo $question["comment"]; ?> <br></p>
            <?php $i++; ?>
        <?php endforeach; ?>  
        </div>
    <div class = "btnCenter" style="text-align:center">
        <input type = "submit" onclick = "window.location.href = 'https://web.njit.edu/~aet6/cs490rc/studentLanding.html';" value="Return to the Homepage"/>
    </div>
    </body>
</html>