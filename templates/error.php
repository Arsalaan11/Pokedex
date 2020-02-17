<a href="javascript:history.back();">[Back]</a>

<h3>An Error Occurred.</h3>

<?php if (isset($json['code']) && $json['code'] == 404): ?>
    <p>Pokemon not found with name <?= $identifier ?></p>
<?php else: ?>
    <p><?= $json['code'] . ' - ' . $json['message'] ?></p>
<?php endif; ?>
