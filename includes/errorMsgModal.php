<?php if (isset($_SESSION["errorMsg"])) { ?>
<!-- Error Modal HTML -->
<div id="errorMsgModal" class="modal fade" tabindex='-1'>
	<div class="modal-dialog modal-error modal-dialog-centeredd" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>				
				<h4 class="modal-title">Oups...</h4>
			</div>
			<div class="modal-body">
			<p><?php echo $_SESSION["errorMsg"]; ?> </p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>    
<?php } ?>


  