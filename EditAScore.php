<?php
    
    $ucid = $_GET['ucid'];
    $arr = array( "ucid" => $ucid);
    $data = json_encode($arr);
    $curl = curl_init('https://web.njit.edu/~aar73/Kanden.php');
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
    <form id ="alterGrade" style="text-align:center;" action="https://web.njit.edu/~aar73/Taren.php" method="POST">
        <?php $i = 0; ?>
        <?php foreach($student["questions"] as $question): ?>
        <p><b>Instructions:</b> <?php echo $question["instructions"]; ?> <br></p>
        <p><b>Student Answer:</b> <?php echo $question["answer"]; ?> <br></p>
        <p><b>Question Point Value:</b> <?php echo $question["pointvalue"]; ?> </p>
        <p><b>Points Awarded:</b> <?php echo $question["pointsearned"]; ?> <br></p>
        <p><b> Enter a new Amount to be Given for the Question:</b> </p>
        <input type="number" id="points" name="pointsearned" value="<?php echo $question["pointsearned"]; ?>">
        <p><b> Enter any Comments about this Question to show the student:</b></p><br>
        <textarea id="profComment" name="comment" placeholder="Enter the Comment Here" value = "" style="height:75px; width: 450px;" ></textarea>
        <input type="hidden" name="questions[<?php echo $i; ?>][student_questionid]" value="<?php echo $question["student_questionid"]; ?>" />
            <?php $i++; ?>
        <?php endforeach; ?>           
                     
          <br><br><input type = "submit" id="edit" value = "Edit the Score" >
        </form>
        <div class="btnCenter" style="text-align:center">
        <input type="button" onclick="window.location.href = 'https://web.njit.edu/~aet6/cs490beta/profReviewScores.html';" value="Back to the Scores"/>
        </div>
    <script>     
    function handleClick(event){
        event.preventDefault();
        fetch("https://web.njit.edu/~aar73/Taren.php")
            .then(response => {
                return response.json();
            })
            .then(body => {
                console.log(body);
                window.alert("Score Changes Saved");
                })
        }
    var subBTN = document.getElementById("edit");
    subBTN.onclick = handleClick;
    </script>

</body>
</html>