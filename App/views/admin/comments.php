<?php
 
if(empty($comments)){
    echo 'cet article n\'a pas été commenté :( ';
}  else {
?>
    <table class="table">
    <thead>
        <tr>
            <td>Utilisateur</td>
            <td>commentaires</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
   
       
         <?php foreach($comments as $comment): ?>
             

        <tr>
            
            <td >
            <?php if($comment->alert()> 0) : ?> 
              
                <p class="alert alert-danger"><?= $comment->username(); ?></p></td>
               
            <?php else : ?>
                <p ><?= $comment->username() ; ?></p>
            <?php endif; ?>
            </td>
            <td>
                <p><?= $comment->comments(); ?></p></td>
            <td>
                <form action ="../deleteComment/<?=$comment->id(); ?>" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $comment->id(); ?>">
                    <button type="submit" class="btn btn-danger" href="../deleteComment/<?=$comment->id(); ?>">Supprimer</button>
                </form >
                
                
            </td>
           
         </tr>

        <?php endforeach; ?>
    
   
    </tbody>
</table>
<?php
}
?>
