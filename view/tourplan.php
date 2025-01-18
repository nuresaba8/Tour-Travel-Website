<?php

// require_once "db_connection.php";


session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $errors = array();

    
    if (empty($_POST["starting_point"])) {
        $errors[] = "Starting Point is required.";
    }
   
    if (empty($_POST["destination"])) {
        $errors[] = "Destination is required.";
    }

    if (empty($_POST["number_of_people"])) {
        $errors[] = "Number Of People is required.";
    }

    if (empty($_POST["place_to_visit"])) {
        $errors[] = "Place to Visit is required.";
    }

    if (empty($_POST["number_of_days"])) {
        $errors[] = "Number Of Days is required.";
    }

    if (empty($_POST["room_type"])) {
        $errors[] = "Room Type is required.";
    }

    if (empty($_POST["starting_date"])) {
        $errors[] = "Starting Date is required.";
    }

    if (empty($_POST["return_date"])) {
        $errors[] = "Return Date is required.";
    }

   
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
       
        $_SESSION['starting_point'] = $_POST['starting_point'];
        $_SESSION['destination'] = $_POST['destination'];
        $_SESSION['number_of_people'] = $_POST['number_of_people'];
        $_SESSION['place_to_visit'] = $_POST['place_to_visit'];
        $_SESSION['number_of_days'] = $_POST['number_of_days'];
        $_SESSION['room_type'] = $_POST['room_type'];
        $_SESSION['starting_date'] = $_POST['starting_date'];
        $_SESSION['return_date'] = $_POST['return_date'];

       
        setcookie('starting_point', $_POST['starting_point'], time() + (86400 * 30), "/"); // 86400 = 1 day

      
        header("Location: thh.php");
        exit();
    }
}

?>

<!DOCTYPE HTML>
<html>
<head>
   <title>Tour Planner</title>
   <style>
    /* Tour Planner */
.container {
  border: 2px solid rgb(30, 146, 247);
  padding: 20px;
  width: 800px;
  margin: auto;
  margin-top: 50px;
  position: relative;
  border-radius: 4px;
}

.tour-text {
  border: 2px solid rgb(223, 32, 32);
  padding: 10px;
  width: 150px;
  border-radius: 10px;
  text-align: center;
  background-color: white;
  position: absolute;
  top: -50px;
  font-weight: bold;
  background-color: pink;
}
.box {
  margin: 20px;
}

.box label {
  font-weight: bold;
}
.check-btn {
  text-align: right;
}
.check-btn button {
  padding: 7px 20px;
  border: 2px solid black;
  border-radius: 3px;
}
   </style>

</head>
<body>
<!-- Tour Plans Start-->
<section>
        <!-- Tour Plans -->
        <div class="container">
          <h2 class="tour-text">Tour Planner</h2>
          <form class="tour-from">
            <div class="box">
              <label for="">Starting :</label>
              <input type="text" onKeyup="startingFn()" name="" id="starting" />
              <p id="text"></p>
            </div>
            <div class="box">
              <label id="name" for="">Destination :</label>
              <input type="text" onKeyup="destinationFn()" name="" id="destination" />
              <p id="text2"></p>
            </div>
            <div class="box">
              <label for="">Number of people :</label>
              <input onKeyup="peopleFn()" type="text" name="" id="people" />
              <p id="text3"></p>
            </div>
            <div class="box">
              <label for="">Place to Visit :</label>
              <input onKeyup="visitFn()" type="text" name="" id="visit" />
              <p id="text4"></p>
            </div>
            <div class="box">
              <label for="">Number of Day :</label>
              <input onKeyup="dayFn()" type="text" name="" id="day" />
              <p id="text5"></p>
            </div>
            <div class="box">
              <label for="">Room Type :</label>
              <input onKeyup="roomFn()" type="text" name="" id="room" />
              <p id="text6"></p>
            </div>
            <div class="box">
              <label for="">Starting Date :</label>
              <input onKeyup="StartingDateFn()" type="date" name="" id="StartingDate" />
              <p id="text7"></p>
            </div>
            <div class="box">
              <label for="">Return Date :</label>
              <input onKeyup="returnDateFn()" type="date" name="" id="returnDate" />
              <p id="text8"></p>
            </div>
            <div class="check-btn">
              <button type="submit">Check</button>
            </div>
          </form>
        </div>
      </section>


<script>
            // startingFn
            function startingFn(){
                let username = document.getElementById('starting').value;
                let obj = document.getElementById('text');
                if(username == ""){
                    obj.innerHTML = "Please Enter starting Tour Plan";
                    obj.style.color = 'red';
                }else{
                    document.getElementById('text').innerHTML = '';
                }
                
            }
            // DestinationFn
            function destinationFn(){
                let username = document.getElementById('destination').value;
                let obj = document.getElementById('text2');
                if(username == ""){
                    obj.innerHTML = "Please Enter a destination";
                    obj.style.color = 'red';
                }else{
                    document.getElementById('text2').innerHTML = '';
                }
                
            }
            // peopleFn
            function peopleFn(){
                let username = document.getElementById('people').value;
                let obj = document.getElementById('text3');
                if(username == ""){
                    obj.innerHTML = "Please Enter Number of People";
                    obj.style.color = 'red';
                }else{
                    document.getElementById('text3').innerHTML = '';
                }
                
            }
            // VisitFn
            function visitFn(){
                let username = document.getElementById('visit').value;
                let obj = document.getElementById('text4');
                if(username == ""){
                    obj.innerHTML = "Please Enter Place to Visit";
                    obj.style.color = 'red';
                }else{
                    document.getElementById('text4').innerHTML = '';
                }
                
            }
            // DayFn
            function dayFn(){
                let username = document.getElementById('day').value;
                let obj = document.getElementById('text5');
                if(username == ""){
                    obj.innerHTML = "Please Enter number of day";
                    obj.style.color = 'red';
                }else{
                    document.getElementById('text5').innerHTML = '';
                }
                
            }
            // RoomFn
            function roomFn(){
                let username = document.getElementById('room').value;
                let obj = document.getElementById('text6');
                if(username == ""){
                    obj.innerHTML = "Please Enter Room Type";
                    obj.style.color = 'red';
                }else{
                    document.getElementById('text6').innerHTML = '';
                }
                
            }
            // Starting Date Fn
            function StartingDateFn(){
                let username = document.getElementById('StartingDate').value;
                let obj = document.getElementById('text7');
                if(username == ""){
                    obj.innerHTML = "Please Enter Starting Date";
                    obj.style.color = 'red';
                }else{
                    document.getElementById('text7').innerHTML = '';
                }
                
            }
            // Return Date Fn
            function returnDateFn(){
                let username = document.getElementById('returnDate').value;
                let obj = document.getElementById('text8');
                if(username == ""){
                    obj.innerHTML = "Please Enter Return Date";
                    obj.style.color = 'red';
                }else{
                    document.getElementById('text8').innerHTML = '';
                }
                
            }

        </script>

</body>
</html>