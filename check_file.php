<?php 	
	session_start();
	error_reporting(0);
	include("controls/define2.php"); 
	include("TBXadmin/include/config.php");
	
	$check=mysqli_query($dbhandle, "SELECT file1,file2,file3,file4,file5 FROM tbl_book_load WHERE  id = '".$_POST['order_id']."'");
	$data1 = mysqli_fetch_array($check);

	 $path = $base_url."upload/documents/";
 ?>
 
            
            <h4> Required Documents  </h4>
            <div class="document-style">
            <h5>Upload Document 1</h5>
            <div class="required-doc-upload">
           <?php if($data1['file1']!=""){?>
			<a href="<?php echo  $path.$data1['file1'];?>" target="_blank">Download File 1</a>
			<?php }else{?>
            <input type="file" name="file1" id="file-6" class="inputfile3 inputfile-3" >
            <label for="file-6"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
			<?php }?>
        </div>
        </div>

        <div class="document-style">
            <h5>Upload Document 2</h5>
            <div class="required-doc-upload">
           <?php if($data1['file2']!=""){?>
			<a href="<?php echo  $path.$data1['file2'];?>" target="_blank">Download File 1</a>
			<?php }else{?>
			<input type="file" name="file2" id="file-7" class="inputfile3 inputfile-3" >
            <label for="file-7"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
			<?php }?>
        </div>
        </div>

        <div class="document-style">
            <h5>Upload Document 3</h5>
            <div class="required-doc-upload">
           <?php if($data1['file3']!=""){?>
			<a href="<?php echo  $path.$data1['file3'];?>" target="_blank">Download File 1</a>
			<?php }else{?>
			<input type="file" name="file3" id="file-8" class="inputfile3 inputfile-3" >
            <label for="file-8"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
			<?php }?>
        </div>
        </div>

        <div class="document-style">
            <h5>Upload Document 4</h5>
            <div class="required-doc-upload">
           <?php if($data1['file4']!=""){?>
			<a href="<?php echo  $path.$data1['file4'];?>" target="_blank">Download File 1</a>
			<?php }else{?>
			<input type="file" name="file4" id="file-9" class="inputfile3 inputfile-3" >
            <label for="file-9"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
			<?php }?>
        </div>
        </div>

        <div class="document-style">
            <h5>Upload Document 5</h5>
            <div class="required-doc-upload">
           <?php if($data1['file5']!=""){?>
			<a href="<?php echo  $path.$data1['file5'];?>" target="_blank">Download File 1</a>
			<?php }else{?>
            <input type="file" name="file5" id="file-10" class="inputfile3 inputfile-3" >
            <label for="file-10"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
			<?php }?>
              <input type="hidden" name="order_load_id" id="order_load_id" value="<?php echo $_POST['order_id'];?>">
        </div>
<input type="submit" name="upload_file"  class="Upload-btn-pop-up" value="Upload">
        </div>