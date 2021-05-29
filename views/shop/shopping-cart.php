<?php
use Phppot\Cart;
require('./controllers/cart_controller.php');
$cartModel = new Cart();
?>
<input type="hidden" id="cart-item-count"
	value="<?php echo $cartModel->cartSessionItemCount; ?>">
<?php
if ($cartModel->cartSessionItemCount > 0) {
    ?>
<table width="100%" id="cart-table" cellpadding="10" cellspacing="1" border="0">
	<tbody>
		<tr>
			<th>Nom</th>
			<th>Quantité</th>
			<th class="text-right">Prix</th>
			<th class="text-right">Action</th>
		</tr>   
<?php
    $item_total = 0;
    $i = 1;
    foreach ($_SESSION["cart_item"] as $item) {
        ?>
        <tr>
			<td><?php echo $item["name"]; ?></td>
			<td><input type="number" name="quantity" class="quantity"
				value="<?php echo $item['quantity']; ?>"
				data-code='<?php echo $item["article_id"]; ?>' size=2
				onChange="updatePrice(this)" /> <input type="hidden" class='total'
				name="total" value="<?php echo $item["price"]; ?>" /></td>
			<td class="prc text-right" id="price" <?php echo $i;?>><?php echo $item["price"]; ?></td>
			<?php
                if($article['dispo'] = 1){ 
                    $i = 0;
                    while($i <= 10 and $i <= $article['stock']){
                        ?>
                        <option value="<?=$i?>"><?=$i?></option>
                        <?php
                        $i++;
                    } 
                } else{
                    ?> Non disponible <?php
                }
                ?>

        <td class="text-right">
			<a  onClick="cartAction('remove','<?php echo $item["article_id"]; ?>')"
				class="btnRemoveAction"><img src="./views/images/icon-delete.png"
					alt="Remove Item" /></a></td>
		</tr>
    <?php
        $item_total += ($item["price"] * $item['quantity']);
    }
    ?>
        <tr id="tot">
			<td class="text-right" colspan="3"><strong>Total (EUR): </strong> <span
				id="total"><?php echo $item_total;?></span></td>
			<td class="text-right"><a id="btnEmpty"
				onClick="cartAction('empty', '');">Vider panier</a></td>
		</tr>
	</tbody>
</table>
<?php
} else {
    ?>
<div id="empty-cart">Votre panier est vide</div>
<?php
}