<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');

?>
<div class="main-content">
	<div class="main-content-inner">
		<?php	
		foreach($data as $row){
			$assignID = $row->assignmentID;
			$status = $row->status;
			$noOfQuesAttend = $row->noOfQuesAttended;
			$noOfPages =  $row->noOfPages;
			//$downloadFile = $row->filename
			$disable = "";
			if($status == "Submitted" or $status=="Evaluated" or $status=="Published")
			{
				$disable = "disabled";
			}else
			{
				$disable = "";
			}
		}	
		?>
<div class="page-content">

<div class="row">
	<div class="col-xs-7">
		<div class="widget-box" style="padding-bottom: 25px;" >
			<div class="widget-header widget-header-flat">
				<h4 class="widget-title">Upload Assignment</h4>
				<a href="<?php echo base_url('StudAssignController'); ?>" class="btn btn-primary pull-right" >Assignment List</a>
			</div>
				<form  id="uploadDocVal" action="<?php
					if($status == "Submitted" or $status=="Evaluated" or $status=="Published")
					{
					}else
					{
						echo site_url('UploadAssignCtrl/uploadDoc/'.$assignID);;
					}
					?>"
					method="post" enctype="multipart/form-data" >

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="uploadFile">Upload File <span class="required">*</span></label>
					<div class="col-sm-9">
						<input type="file" name="uploadFile" <?php echo $disable ?>  id="uploadFile" class="form-control" accept=".doc,.docx,.pdf,.PDF" required="required" >
					</div>
				</div>
				&nbsp;
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="txtNoOfQuesAttend">No of Questions Attend<span class="required">*</span></label>
					<div class="col-sm-9">
						<input type="text" name="txtNoOfQuesAttend" <?php echo $disable ?>  id="txtNoOfQuesAttend" value="<?php echo $noOfQuesAttend;?>" class="form-control" required="required" >
					</div>
				</div>
				&nbsp;
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="txtNoOfPages">No of Pages<span class="required">*</span></label>
					<div class="col-sm-9">
						<input type="text" name="txtNoOfPages" <?php echo $disable ?>  id="txtNoOfPages" value="<?php echo $noOfPages;?>"  class="form-control" required="required" >
					</div>
				</div>
				&nbsp;

				<div class="form-group">
					<div class="col-xs-12 col-sm-12">

					<?php
						if($disable == "disabled")
						{
							echo '<input type="submit" disabled name="submit" value="Submit" class="pull-right btn btn-info btn-xs " />';
						}else{
							echo '<input type="submit" name="submit" value="Submit" class="pull-right btn btn-info btn-xs <?php echo $disable  ?>" />';
						}

					?>

						
					</div>
				</div>
			</div>&nbsp;
					</form>	

				</div>

				<div class="col-xs-5">
					<div class="widget-box">
						<div class="widget-header widget-header-flat">
							<h4 class="widget-title text-danger"><b>Note</b></h4>
						</div>

						<div class="widget-body">
							<div class="widget-main">
							<ul>
								<li class=text-danger ><b>If student view assignment, he/she has to complete assignment with two days.</b></li>
								<li>Document must be uploaded as a <strong>PDF</strong> format.</li>
								<li>Document must not be larger than <strong>2MB</strong>.</li>
								<li>Once document is uploaded, you can't upload again.So double check document while uploading.</li>
							</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php include ('footer.php'); ?>