<?php
    include "../../config/koneksi.php";
	
	$id_amal=$_GET['id_amal'];
	$data=mysql_query("SELECT * FROM tbjns_amal WHERE id_amal='$id_amal'");
	while($r=mysql_fetch_array($data)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">EDIT DATA JENIS AMAL</h4>
        </div>

        <div class="modal-body">
        	<form action="dir/amal/edit_amal.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Nama">Jenis Amal</label>
                    <input type="hidden" name="id_amal"  class="form-control" value="<?php echo $r['id_amal']; ?>" />
     				<input type="text" name="jenis_amal"  class="form-control" value="<?php echo $r['jenis_amal']; ?>"/>
                </div>

	            <div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" name="update" >Save changes</button>
				</div>

            	</form>
				<?php } ?>
            </div>

           
        </div>
    </div>
	
	<?php
	if(isset($_POST['update'])){		
		$id_amal=$_POST['id_amal'];
		$jenis_amal = $_POST['jenis_amal'];
		$sql = mysql_query("UPDATE tbjns_amal SET jenis_amal = '$jenis_amal' WHERE id_amal = '$id_amal'");
		if($sql){
			header('location:../../home.php?page=jnsamal&status=0');
		} else {
			header('location:../../home.php?page=jnsamal&status=1');
		}
	} 
?>