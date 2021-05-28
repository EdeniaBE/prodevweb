<div id="product-grid">
	<div class="txt-heading">Catégorie - Hi-Fi</div>
	<div class="product-item">
		<div class="product-image">
			<img src="data/walkman.jpg" id="<?php echo "3DcAM01";?>"
				class="product-img">
		</div>
		<div>
			<strong><?php echo "Walkman";?></strong>
		</div>
		<div class="product-price"><?php echo "57.00";?></div>

		<input type="button" id="add_<?php echo "3DcAM01";?>"
			value="Ajouter" class="btnAddAction"
			onClick="cartAction('add', '<?php echo "3DcAM01";?>','<?php echo "Walkman";?>','<?php echo "57.00";?>')" />

	</div>
	<div class="product-item">
		<div class="product-image">
			<img src="data/MP3.jpg" id="<?php echo "wristWear03";?>"
				class="product-img">
		</div>
		<div>
			<strong><?php echo "MP3 a gogo";?></strong>
		</div>
		<div class="product-price"><?php echo "58.00";?></div>

		<input type="button" id="add_<?php echo "wristWear03";?>"
			value="Ajouter" class="btnAddAction"
			onClick="cartAction('add', '<?php echo "wristWear03";?>','<?php echo "MP3 a gogo";?>','<?php echo "58.00";?>')" />
	</div>
	<div class="product-item">
		<div class="product-image">
			<img src="data/soundbar.jpg" id="<?php echo "LPN45";?>"
				class="product-img">
		</div>
		<div>
			<strong><?php echo "soundbar";?></strong>
		</div>
		<div class="product-price"><?php echo "120.00";?></div>

		<input type="button" id="add_<?php echo "LPN45";?>"
			value="Ajouter" class="btnAddAction"
			onClick="cartAction('add', '<?php echo "LPN45";?>','<?php echo "soundbar";?>','<?php echo "120.00";?>')" />
	</div>
</div>