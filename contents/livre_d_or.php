<h1>Le livre d'or</h1>
<?php
$formulaire = '<div class="well">
     <h4>Laissez un commentaire:</h4><br>
      
                 <label for="comment">Votre commentaire</label><br>
                 <form action="./scripts/message.php" method="post">
                   <input type="textarea" name="message">
               <input type="submit" value="Envoyer">
             </form>
         </div><br><br>';
         if(isset($_SESSION['username'])){
            echo $formulaire;
        
        };
        
        getMessage(); 

/* $json = json_decode(file_get_contents("/home/alexandreplanque/ServeurWeb/PhP/php-decouverte.bwb/data/message.json"), true);
foreach($json as $message){
/* if(isset($_SESSION['username'])){
    echo $formulaire;

}; 
    echo '<div class="goldenbook">
    <div class="msg">
    <h4>Message n°'.$message['id'].'</h4>
    <p>'.$message['message'].'</p>
    </div>
    <div class="msgfooter">
    <h6>Publié par '.$message['user'].', le '.$message['date'].'</h6>
    </div>
</div>';
} */

/* $handle = "/home/alexandreplanque/ServeurWeb/PhP/php-decouverte.bwb/data/message.json";
$message = 

file_get_contents("/home/alexandreplanque/ServeurWeb/PhP/php-decouverte.bwb/data/message.json");
json_decode(file_get_contents("/home/alexandreplanque/ServeurWeb/PhP/php-decouverte.bwb/data/message.json"), true);
fclose($handle); */
?>