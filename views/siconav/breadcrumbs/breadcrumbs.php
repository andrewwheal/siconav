<ul class="breadcrumb">
	<? foreach ($breadcrumbs as $title => $link): ?>
		<? if (each($breadcrumbs)): ?>
			<li><a href="<?= $link ?>"><?= $title ?></a> / </li>
		<? else: ?>
			<li><?= $title ?></li>
		<? endif ?>
	<? endforeach ?>
</ul>
