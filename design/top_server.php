<?php
 $cart = ($_COOKIE["cart"] != null) ? $_COOKIE["cart"] : '
 <div id="cart" class="btn-group btn-block">
 <button type="button" data-toggle="dropdown" data-loading-text="Lade .." class="btn dropdown-toggle" aria-expanded="true"><span id="cart-total">0  </span><span class="mycart"><span>item(s)</span><span class="total-price">0.00</span></span></button>
 <ul class="dropdown-menu pull-right">
	   <li>
	 <p class="text-center cart-empty">Warenkorb ist noch leer</p>
   </li>
	 </ul>
</div>
 ';
?>

<header>
	<div class="container" style="position: relative;">
		<div id="form-language">
			<ul class="content language">
        		<li><button class="btn btn-link btn-block language-select" type="button" code="en-gb"> EN </button></li>
				<li id="language_de"><button class="btn btn-link btn-block language-select item-selected" type="button" code="de-DE">DE</button></li>
		    </ul>
			<input type="hidden" name="ownUrl" id="ownUrl" value="<?php echo $morpheus["url"] ?>">
  		</div>

  		<nav class="navbar navbar-expand-lg navbar-light bg-white">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<a class="navbar-brand" href="<?php echo $morpheus["url"].($lan == "de" ? '' : 'en/'); ?>"><img src="<?php echo $dir; ?>images/1x/logo.svg" class="img-fluid logo"></a>

			<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
				<ul class="navbar-nav">
					<?php require 'shop/page/menu_2.php'; ?>
				</ul>
			</div>

			<?php echo $cart ?>
		</nav>
	</div>
</header>
