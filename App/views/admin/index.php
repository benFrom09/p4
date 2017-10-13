<h1>Page d'administration</h1>
<hr>

<h2 class="heading-admin">Gestion des articles</h2>

<p>
    <a href="ajouter">Ajouter un article</a>
</p>

<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Titre</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($posts as $post): ?>
        <tr>
            <td><?= $post->id() ; ?></td>
            <td><?= $post->Title(); ?></td>
            <td><a class="btn btn-primary" href="edition/<?= $post->id(); ?>">Editer</a>
                <form action ="delete/<?= $post->id(); ?>" method="post" style="display: inline;">
                    <input type="hidden"  name="id" value="<?= $post->id(); ?>">
                    <button type="submit" class="btn btn-danger" href="delete/<?=$post->id(); ?>">Supprimer</button>
                </form >
                    
                    <a style="display:block;"  href="comments/<?= $post->id(); ?>">voir les commentaires</a> 
                    
            </td>

         </tr>   
        <?php endforeach; ?>
        
    </tbody>
</table>
<p><a href="/monblog/">Retour à la page d'accueil</a></p>



