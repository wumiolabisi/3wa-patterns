<?php


$name = $request->query->get('name', 'World');

?>

Hello <?= htmlspecialchars(isset($name) ? $name : 'World', ENT_QUOTES) ?>