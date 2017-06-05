<?php 
ini_set('max_execution_time', 200);

include("db.php");



        //get info from login page.
        if(isset($_POST['sub_Button'])){
            
            echo $_POST['email'];
            $email_add = $_POST['email'];
            $pwd = $_POST['pwd'];
                

        }



    $sql_q = "SELECT * FROM users WHERE email='$email_add'"; 
            $result_q = mysqli_query($db_conn,$sql_q);
                //echo $result_q;
            $rows = mysqli_fetch_assoc($result_q);

                if(sizeof($rows) > 0)
                    {
                      //get and validate password.
                     while($rows){
                         $db_pwd = $rows['pwd'];
                         if($pwd != $db_pwd){
                              echo "Wrong password!";
                    

                         }else {
                             $dn_fname = $rows['fname'];
                            $dn_lname =   $rows['lname'];

                         }
                     }

                }


echo $dn_fname." ".$dn_lname;




























      /* 


         if($result_query){
            //get the information, transferred in an array (fetch_assoc())
            while($row = $result_query->fetch_assoc()){
                echo "FirstName:".$row["fname"]." <br>
                      LastName: ". $row["lname"]." <br>
                      E-mail: ". $row["email"]." <br>";
            }


        }else {
            $display = "<br><br>Enter Valid Information!";
            echo $display;
        }

        if($dbResults == 1){
            echo "some how it worked!";
            $db_not_selected = 1;
        }else if($dbResults == 2) {
            $db_not_selected = 1;
            header("Location: loginPage.php");
        }else {
             $db_not_selected = 0;
        } */

  ?>