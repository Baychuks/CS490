<?php
    //send the request to aaron, doesnt require any data
    $curl = curl_init('https://web.njit.edu/~aar73/Trace.php');
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_COOKIEJAR,'cookie.txt');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //result should be json with all students that took the exam
    $result = curl_exec($curl);
    curl_close($curl);
    $students = json_decode($result,true);
      
?>
<html>
    <head>
        <title>Review and Edit Scores</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
      <h1 style="text-align: center;">Review and Edit Student Scores</h1><br><br><br>
      <table>
     <tr>
       <td><b>UCID</b></td>
       <td><b>Student Name</b></td>
       <!--<td><b>Role</b></td>-->
       <td></td>
     </tr>
     <?php $length = count($students); ?>
     <?php for ($i = 0; $i < $length; $i++) : ?>
     <tr>
       <td><?php echo $students[$i]['ucid']; ?></td>
       <td><?php echo $students[$i]['fullname']; ?></td>
       <!--<td><?php echo $students[$i]['role']; ?></td>-->
       <td> <button onclick="window.location.href ='https://web.njit.edu/~aet6/cs490rc/EditAScore.php?ucid=<?php echo $students[$i]['ucid']; ?>'">Edit</button></td>
      <?php endfor; ?>
     </tr>
   </table>
    <div class = btnCenter style="text-align:center;">
    <br><br><input type="button"  name="releaseScores" id="release" value="Release Scores" style="height:50px; width:125px;"/><br><br />
    <input type="button" onclick="window.location.href = 'https://web.njit.edu/~aet6/cs490rc/profLanding.html';" value="Back to the Homepage"/>
    </div>
    <br>
    <h3 id = "msgDisplay" style = "display:none; text-align: center; ">  Submit message </h3>
    <script>     
    var h3Ref = document.getElementById("msgDisplay");
    
        function handleClick(event){
            event.preventDefault();
           fetch("https://web.njit.edu/~aar73/Noxus.php")
                .then(response => {
                    return response.json();
                })
                .then(body => {
                    console.log(body)
                    h3Ref.style.display = "block";
                    h3Ref.innerText = body.message;
                    })
            }
        var subBTN = document.getElementById("release");
        subBTN.onclick = handleClick;
        </script>
  </body>
</html>
