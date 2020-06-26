<div class="text-center">
    <h3>
        Erreur 404
    </h3>
    <p class="text-info">
        <?php if(isset($error)): ?>
            <?= $error ?>
            <?php else: ?>
                Cette page n'existe pas !
        <?php endif; ?>
    </p>
</div>