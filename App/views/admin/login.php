<h1>Connexion</h1>
<form action="" method="post">

<?php

    echo $form->input('username','Pseudo');
    echo $form->password('password', 'Mot de passe');
    echo $form->submit();
   
    ?>


</form>