<?php
    //$ucid = $_COOKIE['ucid'];
    //$arr = array( "ucid" => $ucid,"pass" => $pwd);
    //$data = json_encode($arr);
    $curl = curl_init('http://localhost/cs490/beta/placeholderquiz.php');
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_COOKIEJAR,'cookie.txt');
    //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //result is the exam array
    $result = curl_exec($curl);
    curl_close($curl);
    $exam = json_decode($result,true);
?>
<html>
    <head>
        <title>Exam</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <br>
        <h1 style="text-align: center;">Take the Exam</h1>
        <form id ="examQuestions" style="text-align:center;" action="echoPost.php" method="POST">
        <?php $i = 0; ?>
        <?php foreach($exam["questions"] as $question): ?>
            <h3> <?php echo $question["instructions"]; ?> </h3> 
            <p> Point Value: <?php echo $question["pointvalue"]; ?> points</p>
            <textarea id="answer" name="questions[<?php echo $i; ?>][inputCode]" placeholder="Enter Your Answer Here" style="height:100px; width: 450px;" required></textarea><br><br>
            <input type="hidden" name="questions[<?php echo $i; ?>][student_questionid]" value="<?php echo $question["student_questionid"]; ?>" />
            <input type="hidden" name="questions[<?php echo $i; ?>][instructions]" value="<?php echo $question["instructions"]; ?>" />
            <input type="hidden" name="questions[<?php echo $i; ?>][topic]" value="<?php echo $question["topic"]; ?>" />
            <input type="hidden" name="questions[<?php echo $i; ?>][student_examid]" value="<?php echo $question["student_examid"]; ?>" />
            <input type="hidden" name="questions[<?php echo $i; ?>][pointvalue]" value="<?php echo $question["pointvalue"]; ?>" />
            <?php $j = 0; ?>
            <?php foreach($question["testcases"] as $tc): ?>
                <input type="hidden" name="questions[<?php echo $i; ?>][testcases][<?php echo $j; ?>][input]" value="<?php echo $tc["input"]; ?>" />
                <input type="hidden" name="questions[<?php echo $i; ?>][testcases][<?php echo $j; ?>][output]" value="<?php echo $tc["output"]; ?>" />
                <?php $j++; ?>
            <?php endforeach; ?>
            <?php $i++; ?>
        <?php endforeach; ?>           
                     
            <input type = "submit" value = "Submit my Exam" >
        </form>
        <div class = "centerBTN" style="text-align:center;">
        <input type ="reset" >
        <input type = "submit" oclick = "window.location.href = 'https://web.njit.edu/~aet6/cs490beta/studentLanding.html';" value="Return to the Homepage"/><br><br><br> 
        </div>
    </body>
</html>