<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');
?>

<div class="main-content">
<div class="main-content-inner">

<div class="page-content">

<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-7">

		<div class="widget-box">
			<div class="widget-header widget-header-flat">
				<h4 class="widget-title"><?php echo $mode?> Staff Details</h4>
				<a href="<?php echo base_url('StaffController/index'); ?>" class="btn btn-primary   pull-right" >Staff List</a>
			</div>

<?php
	$dataMode = "";
	if($mode == "Add New "){
		$dataMode = "insertStaffData";
	}elseif($mode =="Edit"){
		$dataMode = "updateStaffData/".$staffID;
	}
	//echo "some = " .$dataMode;
?>


	<form  id="staffValidation" action=" <?php echo site_url('StaffController/'.$dataMode); ?>" method="post">
		<div class="widget-body">
			<div class="widget-main">
				<div class="row">
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Enter Staff Name <span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="text" name="txtStaffName" required="required" id="txtStaffName"  maxlength="100" placeholder="Enter Staff Name" class="col-xs-12 col-sm-12"
							value="<?php if($mode == "Edit") { echo $r->staffName ? $r->staffName : "" ;}?>"  />
						</div>
					</div>
					&nbsp;
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Staff Code <span class="required">*</span></label>

						<div class="col-sm-9">
							<input type="text" name="txtStaffCode"  required="required"  id="txtStaffCode" maxlength="50" placeholder="Enter Staff Code" class="col-xs-12 col-sm-12"
							value="<?php if($mode == "Edit") { echo $r->staffCode ? $r->staffCode : "" ;}?>"  />
						</div>
					</div>
					&nbsp;
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Staff Email <span class="required">*</span></label>

						<div class="col-sm-9">
							<input type="email" name="txtStaffEmail" required="required"  id="txtStaffEmail" maxlength="100" placeholder="Enter Staff Email" class="col-xs-12 col-sm-12"
							value="<?php if($mode == "Edit") { echo $r->staffEmail ? $r->staffEmail : "" ;}?>" />
						</div>
					</div>
					&nbsp;
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Mobile No</label>
						<div class="col-sm-9">
							<input type="text" maxlength="10" minlength="10" name="txtStaffMobNo" id="txtStaffMobNo"  placeholder="Enter Staff Mobile No" class="col-xs-12 col-sm-12"
							value="<?php if($mode == "Edit") { echo $r->staffMobNo ? $r->staffMobNo : "" ;}?>" 
							 />
						</div>
					</div>
					&nbsp;

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">College Name </label>
						<div class="col-sm-9">
							<input type="text" maxlength="100" name="txtCollegeName" id="txtCollegeName"  placeholder="Enter College Name" class="col-xs-12 col-sm-12"
							value="<?php if($mode == "Edit") { echo $r->collegeName ? $r->collegeName : "" ;}?>"
							 />
						</div>
					</div>
					&nbsp;

					<!-- <div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Staff Image</label>

						<div class="col-sm-9">
							<input type="file" id="id-input-file-2" />
						</div>
					</div>
					&nbsp; -->

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Adrress </label>

						<div class="col-sm-9">
							<textarea name='txtAddress' placeholder="Enter Address" class="col-xs-12 col-sm-12"><?php if($mode == "Edit") { echo $r->staffAddress ? $r->staffAddress : "" ;}?></textarea>
						</div>
					</div>
					&nbsp;&nbsp;

					<div class="form-group">
						<div class="col-xs-12 col-sm-12">
						<input type="submit" name="btnAddEditStaff" class="btn btn-primary pull-right" >
						</div>
					</div>
				</div>

			</div>
		</div>
	</form>
		</div>
	</div><!-- /.col -->
	<div class="col-xs-3">&nbsp;</div>
</div>
</div>
</div>
</div>

<?php
include ('footer.php');
?>