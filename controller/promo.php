<?php
    require '../model/config.php';
    require '../view/pcp.php';
    if(isset($_POST['submit'])){
        $pro = $_POST['promo'];

        $query="INSERT INTO promo(promo) value('$pro')";
        $data = mysqli_query($con, $query);
        if($data){
            ?>
            <script>alert("Promo Applied Successfully");</script> 
            <?php
        }
        else{
            ?>
            <script>alert("Please Try Again");</script> 
            <?php
        }
    }

?>
    

