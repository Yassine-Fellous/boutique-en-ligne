<meta charset="utf-8" />
	<form method="GET" action="trecherche">
	   <input type="search" name="r" placeholder="Recherche..." />
	   <input type="submit" name="submit" value="Valider" />
	</form>
	<?php if($articles->rowCount() > 0) { ?>
	   <ul>
	   <?php while($a = $articles->fetch()) { ?>
	      <li><?= $a['titre'] ?></li>
	   <?php } ?>
	   </ul>
	<?php } else { ?>
	Aucun résultat pour: <?= $q ?>...
	<?php } ?>