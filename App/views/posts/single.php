<?php 

if($post->id() != null){
  
    ?>
    <h2><?=$post->title(); ?></h2>
    <p>Posté le <?=$post->getDate(); ?></p>
    <div class="posts">
    <p><?=$post->content(); ?></p> 
    </div><!--post-->
    
    <div class="comments">
    <?php if(isset($_SESSION['sucess']) && $_SESSION['sucess']  === true): ?>
        <div class="alert alert-sucess"> enregistrement reussi ! </div>
        <?php unset($_SESSION['sucess']); ?>
    <?php elseif(isset($_SESSION['sucess']) && $_SESSION['sucess']  === false) :?>
           
        <div class="alert alert-danger">echec de l\enregistrement ! </div>
           <?php unset($_SESSION['sucess']); ?>          
    <?php endif; ?>

        
    
        <div class="display-comments">
        <?php if(isset($comments)) :?>
        <?php foreach($comments as $comment):?>
           

            <div class="panel panel-default pannel-comment">
                <div class="panel-body">
                    <div><img src="http:\\localhost\monblog\Webroot\img\avatar.png" alt=""></div>
                    <div class="panel-content">
                        <div><span><?=htmlspecialchars($comment->username()); ?>:</span></div>
        
                        <div><p><?=htmlspecialchars($comment->comments());?> </p> </div>
                        
                        <form action ="" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $comment->id(); ?>">
                            <input type="hidden"  name="alert" value="1">
                            <button type="submit" class="signaler" >signaler</button>
                        </form>    
                        
                    </div><!--panel-content-->
                </div><!--pannel-body-->
    
            </div><!--panel-default-->


    <?php endforeach ; ?>
    <?php endif;?>
        </div><!--display-comment-->
    <hr>

        <form action="" id="form-comment" class="form-comment" method="post">

            <h4 class="comment-form-title">poster un commentaire</h4>
            <div class="form-group">
                <label for="">
                <input type="text" name ='username'placeholder="nom" />
            </label>
            </div> 
            <div class="form-group"><textarea name="comments" id="comments" rows="5" placeholder="ici votre commentaire" class="form-control" ></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">poster</button>           
            </div>
            
        </form>
    </div> <!--comment-->
<?php   
} else {
        echo '<div class="alert alert-danger"> l\'article demandé n\'esiste pas :[ </div>';
} 
?>













   

