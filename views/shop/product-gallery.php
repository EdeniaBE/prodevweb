

<div id="product-grid">
	<div class="txt-heading">Catégorie - Informatique</div>
	<div class="product-item">
		<div class="product-image">
			<img src="data/pc.jpg" id="<?php echo $row['article_id'];?>"
				class="product-img">
		</div>
		<div>
			<strong><?php echo "Ordinateur";?></strong>
		</div>
		<div class="product-price"><?php echo "350.00";?></div>

		<input type="button" id="add_<?php echo "3DcAM01";?>"
			value="Ajouter" class="btnAddAction"
			onClick="cartAction('add','<?php echo "3DcAM01";?>','<?php echo "Ordinateur";?>','<?php echo "350.00";?>')" />

	</div>
	<div class="product-item">
		<div class="product-image">
			<img src="data/PcGaming.jpg" id="<?php echo $row['article_id'];?>"
				class="product-img">
		</div>
		<div>
			<strong><?php echo "Ordinateur Gaming";?></strong>
		</div>
		<div class="product-price"><?php echo "700.00";?></div>

		<input type="button" id="add_<?php echo $row['article_id'];?>"
			value="Ajouter" class="btnAddAction"
			onClick="cartAction('add', '<?php echo $row['article_id'];?>','<?php echo "Ordinateur Gaming";?>','<?php echo "700.00";?>')" />
	</div>
	<div class="product-item">
		<div class="product-image">
			<img src="data/laptop.jpg" id="<?php echo $row['article_id'];?>"
				class="product-img">
		</div>
		<div>
			<strong><?php echo "Ordinateur portable";?></strong>
		</div>
		<div class="product-price"><?php echo "800.00";?></div>

		<input type="button" id="add_<?php echo $row['article_id'];?>"
			value="Ajouter" class="btnAddAction"
			onClick="cartAction('add', '<?php echo $row['article_id'];?>','<?php echo "ordinateur portable";?>','<?php echo "1200.00";?>')" />
	</div>

	<div class="txt-heading">Catégorie - Hi-Fi</div>
	<div class="product-item">
		<div class="product-image">
			<img src="data/walkman.jpg" id="<?php echo $row['article_id'];?>"
				class="product-img">
		</div>
		<div>
			<strong><?php echo "Walkman";?></strong>
		</div>
		<div class="product-price"><?php echo "57.00";?></div>

		<input type="button" id="add_<?php echo $row['article_id'];?>"
			value="Ajouter" class="btnAddAction"
			onClick="cartAction('add', '<?php echo $row['article_id'];?>','<?php echo "Walkman";?>','<?php echo "57.00";?>')" />

	</div>
	<div class="product-item">
		<div class="product-image">
			<img src="data/MP3.jpg" id="<?php echo $row['article_id'];?>"
				class="product-img">
		</div>
		<div>
			<strong><?php echo "MP3 a gogo";?></strong>
		</div>
		<div class="product-price"><?php echo "58.00";?></div>

		<input type="button" id="add_<?php echo $row['article_id'];?>"
			value="Ajouter" class="btnAddAction"
			onClick="cartAction('add', '<?php echo $row['article_id'];?>','<?php echo "MP3 a gogo";?>','<?php echo "58.00";?>')" />
	</div>
	<div class="product-item">
		<div class="product-image">
			<img src="data/soundbar.jpg" id="<?php echo $row['article_id'];?>"
				class="product-img">
		</div>
		<div>
			<strong><?php echo "soundbar";?></strong>
		</div>
		<div class="product-price"><?php echo "120.00";?></div>

		<input type="button" id="add_<?php echo $row['article_id'];?>"
			value="Ajouter" class="btnAddAction"
			onClick="cartAction('add', '<?php echo $row['article_id'];?>','<?php echo "soundbar";?>','<?php echo "120.00";?>')" />
	</div>
	<div class="txt-heading">Catégorie - Livres</div>
	<div class="product-item">
		<div class="product-image">
			<img src="data/php.jpg" id="<?php echo $row['article_id'];?>"
				class="product-img">
		</div>
		<div>
			<strong><?php echo "Le monde de PHP";?></strong>
		</div>
		<div class="product-price"><?php echo "25.00";?></div>

		<input type="button" id="add_<?php echo $row['article_id'];?>"
			value="Ajouter" class="btnAddAction"
			onClick="cartAction('add', '<?php echo $row['article_id'];?>','<?php echo "Le monde merveilleux de PHP";?>','<?php echo "25.00";?>')" />

	</div>
	<div class="product-item">
		<div class="product-image">
			<img src="data/pln.jpg" id="<?php echo $row['article_id'];?>"
				class="product-img">
		</div>
		<div>
			<strong><?php echo "PDO pour les nuls";?></strong>
		</div>
		<div class="product-price"><?php echo "35.00";?></div>

		<input type="button" id="add_<?php echo $row['article_id'];?>"
			value="Ajouter" class="btnAddAction"
			onClick="cartAction('add', '<?php echo $row['article_id'];?>','<?php echo "PDO pour les null";?>','<?php echo "35.00";?>')" />
	</div>
	<div class="product-item">
		<div class="product-image">
			<img src="data/informatique.jpg" id="<?php echo $row['article_id'];?>"
				class="product-img">
		</div>
		<div>
			<strong><?php echo "L'informatique qui plait";?></strong>
		</div>
		<div class="product-price"><?php echo "12.00";?></div>

		<input type="button" id="add_<?php echo $row['article_id'];?>"
			value="Ajouter" class="btnAddAction"
			onClick="cartAction('add', '<?php echo $row['article_id'];?>','<?php echo "Informatique quand tu nous plait";?>','<?php echo "12.00";?>')" />
	</div>
</div>