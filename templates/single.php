<?php
$abilitiesCombined = function($abilities) {
    $list = [];
    foreach($abilities as $ability) {
        if (isset($ability['ability']['name'])) {
            $list[] = $ability['ability']['name'];
        }
    }
    return implode(', ', $list);
}
?>

<a href="javascript:history.back();">[Return to Pokemon Search]</a>

<h3>Pokemon: <?= ucfirst($json['name']) ?></h3>
<table>
    <tr>
        <th>Images</th>
        <td>
            <?php if (isset($json['sprites'])): ?>
                <?php foreach($json['sprites'] as $key => $sprite): ?>
                    <img src="<?= $json['sprites'][$key] ?>" />
                <?php endforeach; ?>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Name</th>
        <td><?= $json['name'] ?? 'unknown' ?></td>
    </tr>
    <tr>
        <th>Species</th>
        <td><?= $json['species']['name'] ?? 'unknown' ?></td>
    </tr>
    <tr>
        <th>Height</th>
        <td><?= $json['height'] ?? 'unknown' ?></td>
    </tr>
    <tr>
        <th>Weight</th>
        <td><?= $json['weight'] ?? 'unknown' ?></td>
    </tr>
    <tr>
        <th>Abilities</th>
        <td><?= $abilitiesCombined($json['abilities'] ?? []) ?></td>
    </tr>
</table>