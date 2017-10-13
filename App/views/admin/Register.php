<?php

?>
<h1>S'inscrire</h1>

<form action="" method="post">

<?php

    echo $form->input('username','Pseudo');
    echo $form->input('email','email');
    echo $form->password('password', 'Mot de passe');
    echo $form->password('password_confirm', 'Confirmer le mot de passe');

    echo $form->submit();

?>
</form>
