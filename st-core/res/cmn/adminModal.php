<div id="insItem" class="modal fade" role="dialog">
	<div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Modal Header</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
			<form action="/insItem" method="get">
				<input type="text" placeholder="url" name="url">
				<input type="text" placeholder="name" name="name">
				<input type="submit" value="save">
			</form>
		</div>
		<div class="modal-footer">

		</div>
	</div>

	</div>
</div>

<div id="delItem" class="modal fade" role="dialog">
	<div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Modal Header</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
			 <?php
		  $items = database\DB::getNavItem();
		  foreach($items as $item){
			  echo("<div>
			  	<a href='".HOST."delItem?val=".$item['id']."' >".$item['name']."</a>
			  </div>");
		  }
		  ?>
		</div>
		<div class="modal-footer">

		</div>
	</div>

	</div>
</div>
