<h1>Le livre d'or</h1>
<?php
$formulaire = '<div class="well">
     <h4>Laissez un commentaire:</h4><br>
       <form action="" method="post" role="form">
               <div class="form-group">
                 <label for="comment">Votre commentaire</label><br>
                   <textarea name="comment_content" class="form-control" rows="3"></textarea>
               </div>
               <button type="submit" name="create_comment" class="btn btn-primary">Envoyer</button>
             </form>
         </div>';

if(isset($_SESSION['username'])){
    echo $formulaire;
}else{
    echo "fy";
};