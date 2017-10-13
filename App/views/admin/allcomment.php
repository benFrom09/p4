<?php


?>


<ul>
<?php if($comments && $comments != null): ?>
<?php   foreach($comments as $comment) : ?>
    <?php if($comment->alert() > 0) : ?>   
        <li class="alert alert-danger"><?= $comment->comments(); ?></li>
        <?php else : ?>
        <li><?= $comment->comments(); ?></li>
    <?php endif; ?>
<?php endforeach; ?>
<?php else : ?>
    <li>aucun commentaires</li>
<?php endif; ?>
</ul>
<?php foreach ($posts as $post): ?>
<a href="index.php?page=admin&id=<?= $post->id() ?>"><?= $post->id() ; ?> /</a>
<?php endforeach; ?>