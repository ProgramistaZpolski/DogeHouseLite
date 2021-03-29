<?php /* Compiled from a Blade Template on 26-03-2021 08:31:40 */ ?>
<?php
$kukanq = "kukanq to kasztan";
$math = mt_rand(0, 50);
?>

<?php require_once 'partials/head.php'; ?>

<?php if ($math > 25) : ?>

<h1><?= htmlspecialchars($kukanq) ?></h1>

<?php endif; ?>

<?php foreach ($kukank as $kasztan) : ?>
<?= htmlspecialchars($kasztan) ?>
<?php endforeach; ?>

<script>
	let app = <?= json_encode($array) ?>;
</script>

<?php if (count($records) === 1) : ?>
    I have one record!
<?php elseif (count($records) > 1) : ?>
    I have multiple records!
<?php else : ?>
    I don't have any records!
<?php endif; ?>

<?php if (!false) : ?>
    You are not signed in.
<?php endif; ?>

<?php if (isset($records) && !empty($records)) : ?>
    // $records is defined and is not null...
<?php endif; ?>

<?php if (!isset($records) || isset($records)) : ?>
    // $records is "empty"...
<?php endif; ?>

<?php if (\App\Core\App::get('config')['production']) : ?>
    // Production specific content...
<?php endif; ?>

<?php for ($i = 0; $i < 10; $i++) : ?>
    The current value is <?= htmlspecialchars($i) ?>
<?php endfor; ?>

<?php foreach ($users as $user) : ?>
    <p>This is user <?= htmlspecialchars($user->id) ?></p>
<?php endforeach; ?>

<?php while (true) : ?>
    <p>I'm looping forever.</p>
<?php endwhile; ?>

<?php foreach ($users as $user) : ?>
    <?php if ($user->type == 1) : ?>
        <?php continue; ?>
    <?php endif; ?>

    <li><?= htmlspecialchars($user->name) ?></li>

    <?php if ($user->number == 5) : ?>
        <?php break; ?>
    <?php endif; ?>
<?php endforeach; ?>




<?= $xss ?>

<form method="POST" action="submit">
	<input type='hidden' name='pzplphp-csrf-token' value='<?= $_SESSION['pzplphp-csrf-token'] ?>'>
	<input type='hidden' name='pzplphp-method' value='PUT'>
	<button type="submit">Say hello</button>
</form>

<?php require_once 'partials/footer.php'; ?>

<?php dump($myvariable2) ?>

<?php dd($myvariable) ?>
