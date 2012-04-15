<ul class="nav">
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
