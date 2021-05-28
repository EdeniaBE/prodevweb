<div id="product-grid">
	<div class="txt-heading">Catégorie - Informatique</div>
	<div class="product-item">
		<div class="product-image">
			<img src="data/pc.jpg" id="<?php echo "3DcAM01";?>"
				class="product-img">
		</div>
		<div>
			<strong><?php echo "Ordinateur";?></strong>
		</div>
		<div class="product-price"><?php echo "350.00";?></div>

		<input type="button" id="add_<?php echo "3DcAM01";?>"
			value="Ajouter" class="btnAddAction"
			onClick="cartAction('add', '<?php echo "3DcAM01";?>','<?php echo "Ordinateur";?>','<?php echo "350.00";?>')" />

	</div>
	<div class="product-item">
		<div class="product-image">
			<img src="data/PcGaming.jpg" id="<?php echo "wristWear03";?>"
				class="product-img">
		</div>
		<div>
			<strong><?php echo "Ordinateur Gaming";?></strong>
		</div>
		<div class="product-price"><?php echo "700.00";?></div>

		<input type="button" id="add_<?php echo "wristWear03";?>"
			value="Ajouter" class="btnAddAction"
			onClick="cartAction('add', '<?php echo "wristWear03";?>','<?php echo "Ordinateur Gaming";?>','<?php echo "700.00";?>')" />
	</div>
	<div class="product-item">
		<div class="product-image">
			<img src="data/laptop.jpg" id="<?php echo "LPN45";?>"
				class="product-img">
		</div>
		<div>
			<strong><?php echo "Ordinateur portable";?></strong>
		</div>
		<div class="product-price"><?php echo "800.00";?></div>

		<input type="button" id="add_<?php echo "LPN45";?>"
			value="Ajouter" class="btnAddAction"
			onClick="cartAction('add', '<?php echo "LPN45";?>','<?php echo "ordinateur portable";?>','<?php echo "1200.00";?>')" />
	</div>
</div>