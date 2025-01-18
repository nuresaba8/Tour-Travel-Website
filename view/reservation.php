<html lang="en" dir="ltr">
  <head>
    <title>Reservation Form </title>
    <link rel="stylesheet" href="../css/styleReservation.css">
  </head>
  <body>
    <header>
    <div class="nav">
                <h2 class="logo"><span>S</span>an and <span>To</span>ur</h2>
                <a href="../controller/logoutCheck.php" class="btn">Log out</a>
    </div>
    <div class="center">
      <h1>Reserve</h1>
      <form method="post" action="../controller/reserveCheck.php" enctype="multipart/form-data">
        <div class="txt_field">
          <input type="text" name="name" id="name" required>
          <span></span>
          <label>Name</label>
        </div>
        <div class="txt_field">
            <input type="number" name="age" id="age" min="1" max="90" required>
            <span></span>
            <label>Age</label>
          </div>
          <div class="txt_field">
            <input type="tel" name="contact_number" id="contact_number" required>
            <span></span>
            <label>Contact Number</label>
          </div>
        <div class="txt_field">
          <input type="email" name="email" id="email" required>
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <span></span>  <label>Check-in-date</label><br> <input type="date" name="check_in_date" id="check_in_date" required>
           
            
          </div>
          <div class="txt_field">
          <select name="hotel_name"  id="hotel_name">
                            <option value="">Choose Hotel</option>
                            <option value="hotel1">Hotel 1</option>
                            <option value="hotel2">Hotel 2</option>
                            <option value="hotel3">Hotel 3</option>
                        </select>
          </div>
          <div class="txt_field">
          <select name="room_type" id="room_type" required>
                            <option value="">Room Type</option>
                            <option value="ac">AC</option>
                            <option value="non_ac">Non AC</option>
                            <option value="luxury">Luxury</option>
                        </select>
          </div>
          <div class="txt_field">
            <input type="number" name="number_of_people" id="number_of_people" min="1" max="50" required>
            <span></span>
            <label>Number of People</label>
          </div>
          <div class="txt_field">
            <input type="file" name="myfile" id="myfile" >
          </div>
        <input type="submit" name="submit" value="Submit" onclick=" validateForm()">
      </form>
    </div>
    </header>

    <script>
        let validateForm = () => {
          let name = document.getElementById('name').value;
          let age = document.getElementById('age').value;
          let email = document.getElementById('email').value;
          let contact_number = document.getElementById('contact_number').value;
          let check_in_date = document.getElementById('check_in_date').value;
          let hotel_name = document.getElementById('hotel_name').value;
          let room_type = document.getElementById('room_type').value;
          let number_of_people = document.getElementById('number_of_people').value;
          let myfile= document.getElementById('myfile').value;
          if (name == "" || age=="" || email=="" || contact_number=="" || check_in_date=="" || myfile=="" || hotel_name=="" || room_type=="" || number_of_people=="" ) {
            alert("fields cannot be empty");
          }else if (!checkFirstChr(name[0])) {
            alert("Name must start with a letter");
          } else if (!checkChr(name)) {
            alert("Name can only contain letters (a-z or A-Z), dot, dash, or space");
          }else if (!validateNumPassengers(number_of_people)) {
            alert( "Enter a valid number");
          }else if (!validateContactNumber(contact_number)) {
            alert( "Enter a valid number");
          }else if (!validateAge(age)) {
            alert( "Enter a valid number");
          }else if (!isValidEmail(email)) {
            alert("Invalid email format");
          }else if (!validateDate(check_in_date)) {
            alert( "Enter a valid date");
          }else{
            
          let xhttp = new XMLHttpRequest();
          xhttp.open('POST', '../controller/reserveCheck.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('name='+name+'&age='+age+'&email='+email+'&contact_number='+contact_number+'&check_in_date='+check_in_date+'&hotel_name='+hotel_name+'&room_type='+room_type+'&number_of_people='+number_of_people+'&myfile='+myfile);
                xhttp.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                       if (this.responseText.trim() === "Success") {               
                        window.location.href = "../view/notification.php";            
                      }

                    }
                }
        }
        }
        function isValidEmail(variable) {
    for (let i = 0; i < variable.length; i++) {
        if (variable[i] === '@') {
            return true;
        }
    }
    return false;
}
        let checkFirstChr = (chr) => {
                return (chr >= 'A' && chr <= 'Z') || (chr >= 'a' && chr <= 'z');
            }
         
            let checkChr = (name) => {
                for (let i = 0; i < name.length; i++) {
                    let chr = name[i];
                    if (!((chr >= 'A' && chr <= 'Z') || (chr >= 'a' && chr <= 'z') || chr === '.' || chr === '-' || chr === ' ')) {
                        return false;
                    }
                }
                return true;
            }


            function validateDate(departure_date) {
    var inputDate = departure_date;
    var currentDate = new Date();
    var enteredDate = new Date(inputDate);
    if (inputDate.trim() === "" || isNaN(enteredDate.getTime())) {
        alert("Please enter a valid date.");
        return false;
    }
    if (enteredDate < currentDate) {
        alert("Please enter a future date.");
        return false;
    }
    return true;

}

function validateNumPassengers(num_passengers) {
    var numPassengers = num_passengers;
    if (numPassengers < 1 || numPassengers > 50) {
        alert("Number of passengers must be between 1 and 50.");
        return false;
    }
    return true;
}
function validateAge(age) {
    var age = age;
    if (age < 18) {
        alert("Valid age is 18");
        return false;
    }
    return true;
}
function validateContactNumber(contact_number) {
    let trimmedNumber = contact_number.trim();
    if (trimmedNumber.length === 11 && /^\d+$/.test(trimmedNumber)) {
        return true;
    } 
        return false;
    
}
      </script>
  </body>
</html>
