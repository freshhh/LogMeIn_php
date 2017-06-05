
<?php
$tr = false;

if(isset($_POST['text'])){
    session_start();
$_SESSION['text'] = $_POST['text'];
    $tr = true;
    
    if($_POST['text'] == "" ||$_POST['text'] == " " ){
        $tr = false;
    }

}


?>



<form action="this.php" method="post">
<input type='text' name='text'>
    <input type='submit' name='btn' value="Double Hash Me"><br>
    <input type='submit' name='dr' value="Destroy and refresh">
</form>

<?php
if($tr){
$text = $_POST['text'];
echo $text."<br><br>";
$text = md5($text)."<br><br>";
echo $text;
$text = crypt($_POST['text'],'gB')."<br><br>";
echo $text;


if(isset($_POST['dr'])){
     session_unset();
     session_destroy();
    header("this.php");
    $text = "";
}
    
    
    
    If($text == crypt($_POST['text'],'gB')){
        echo "<p> It works! ";
    }


}


?>