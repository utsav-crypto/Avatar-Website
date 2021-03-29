<!--<div class="logo">Stribe.in</div>-->
<div id="header" class="sticky-top">

</div>
<!--<div class="logo st-text-light" style="display: none;">Stribe.in</div>-->
<nav class="navbar sticky-top navbar-expand-lg pt-0 pb-0 pr-10 st-bg-dark">
   <a class="navbar-brand" href="<?php echo(HOST);?>"><img class="logo" src="/asset/img/logo_red_50x50.png"></a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span style="color: white;">&#9776</span>
   </button>
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
          <?php
		  $items = database\DB::getNavItem();
		  foreach($items as $item){
			  echo(lib\Html\Html::createNav($item['linkurl'],$item['name']));
		  }
		  ?>
		  <li class="nav-item">
		  	<a class="nav-link" href="<?php if(islogin()){echo('/logout');}else{echo('/login');}?>"><?php if(islogin()){echo('Logout');}else{echo('Login');}?></a>
		  </li>
      </ul>
   </div>
	<?php
	if(islogin()){
		echo('<button type="button" class="bg-none oline-none brd-none btn btn-info btn-lg" data-toggle="modal" data-target="#insItem">
				<span style="color: white;">+</span>
			</button>
			<button type="button" class="bg-none oline-none brd-none btn btn-info btn-lg" data-toggle="modal" data-target="#delItem">
				<span style="color: white;">-</span>
			</button>');
	}
		?>
</nav>

<?php
	if(islogin()){
		require_once(ROOT.'res/cmn/adminModal.php');
	}
?>
