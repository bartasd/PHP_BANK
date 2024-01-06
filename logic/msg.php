<?php if (isset($_SESSION['success']) || isset($_SESSION['error'])): ?>
<div class="errorContainer" data-remove-after="3" data-removable>
    <?php if (isset($_SESSION['success'])): ?>
        <p class="msg success"><?= $_SESSION['success'] ?></p>
        <?php unset($_SESSION['success']) ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <p class="msg error"><?= $_SESSION['error'] ?></p>
        <?php unset($_SESSION['error']) ?>
    <?php endif; ?>

</div>
<?php endif ?>