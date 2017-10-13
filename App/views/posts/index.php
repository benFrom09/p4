<h1 class="main-title">Billet simple pour l'Alaska</h1>
<hr>
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

<?php foreach($posts as $post) : ?>
<?php if($post->online() === 'oui'): ?>
        <div class="post-preview">
           <h2 class="post-title"><?= $post->title(); ?></h2>
           <p><?= $post->extrait(); ?></p>
           <p class ="post-meta">Posté le <?= $post->getDate(); ?></p>
        </div>
        <hr>
<?php endif; ?>       
<?php endforeach ; ?>

        <!-- Pager -->
        <div class="clearfix">
            <?php
    if(is_numeric($cPage)) : 
        if ($cPage < $nbPage): ?>

        <a class="btn btn-secondary float-right" href="/monblog/page/<?=$cPage + 1 ; ?>">Page suivante </a>
        <?php else : ?>

        <a class="btn btn-secondary float-right" href="/monblog/page/<?=$cPage - 1 ; ?>"> Page précedente</a> 

    <?php endif;
        endif; ?>

        </div><!-- clearfix -->
    </div><!-- mx-auto -->
</div><!-- row -->







    











