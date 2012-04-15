<? $current = \Arr::in_array_recursive('/'.\Uri::string(), $nav) ?>

<li class="<?= $current ? 'active' : '' ?>">
	<?= $name ?>

	<ul>
		<?
			foreach ($nav as $name => $link) {
				if (is_array($link)) {
					echo render('siconav/nav/children', array('nav' => $link, 'name' => $name));
				} else {
					echo render('siconav/nav/item', compact('name', 'link'));
				}
			}
		?>
	</ul>
</li>
