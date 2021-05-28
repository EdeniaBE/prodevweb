<div id="product-grid">
	<div class="txt-heading">Catégorie - Livres</div>
	<div class="product-item">
		<div class="product-image">
			<img src="data/php.jpg" id="<?php echo "3DcAM01";?>"
				class="product-img">
		</div>
		<div>
			<strong><?php echo "Le monde de PHP";?></strong>
		</div>
		<div class="product-price"><?php echo "25.00";?></div>

		<input type="button" id="add_<?php echo "3DcAM01";?>"
			value="Ajouter" class="btnAddAction"
			onClick="cartAction('add', '<?php echo "3DcAM01";?>','<?php echo "Le monde merveilleux de PHP";?>','<?php echo "25.00";?>')" />

	</div>
	<div class="product-item">
		<div class="product-image">
			<img src="data/pln.jpg" id="<?php echo "wristWear03";?>"
				class="product-img">
		</div>
		<div>
			<strong><?php echo "PDO pour les nuls";?></strong>
		</div>
		<div class="product-price"><?php echo "35.00";?></div>

		<input type="button" id="add_<?php echo "wristWear03";?>"
			value="Ajouter" class="btnAddAction"
			onClick="cartAction('add', '<?php echo "wristWear03";?>','<?php echo "PDO pour les null";?>','<?php echo "35.00";?>')" />
	</div>
	<div class="product-item">
		<div class="product-image">
			<img src="data/informatique.jpg" id="<?php echo "LPN45";?>"
				class="product-img">
		</div>
		<div>
			<strong><?php echo "L'informatique qui plait";?></strong>
		</div>
		<div class="product-price"><?php echo "12.00";?></div>

		<input type="button" id="add_<?php echo "LPN45";?>"
			value="Ajouter" class="btnAddAction"
			onClick="cartAction('add', '<?php echo "LPN45";?>','<?php echo "Informatique quand tu nous plait";?>','<?php echo "12.00";?>')" />
	</div>
</div>