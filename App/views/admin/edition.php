<h2>Edition</h2>

<hr>

<form  method="post">

    <?php
    
    echo $form->input('title','Titre');
    echo $form->input('online','En ligne');
    echo $form->textarea('content','Contenu');

    ?>
    <div class="checkbox">
    <label for="">
    <input type="radio" name="online" value="oui" > en ligne
    </label>
    </div>
    <div class="checkbox">
    <label for="">
    <input type="radio" name="online" value="non" > hors ligne
    </label>
    </div>
    <?php
    
    echo '<button class="btn btn-primary"> Sauvegarder</button>'; 
    

    ?>


</form>


