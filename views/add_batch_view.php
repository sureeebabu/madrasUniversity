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
				<h4 class="widget-title"><?php echo $mode?> Batch</h4>
				<a href="<?php echo base_url('BatchController'); ?>" class="btn btn-primary pull-right" >Batch List</a>
			</div>

<?php
	$dataMode = "";
	if($mode == "Add New "){
		$dataMode = "insBatchData";
	}elseif($mode =="Edit"){
		$dataMode = "upBatch/".$batchID;
	}
?>

		<form id="addBatchVal" action=" <?php echo site_url('BatchController/'.$dataMode); ?>" method="post">
		<div class="widget-body">
			<div class="widget-main">
				<div class="row">
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Enter Batch Type <span class="required">*</span></label>
						<div class="col-sm-9">
					<select id="sltBatchType" name="sltBatchType" required="required" class="col-xs-12 col-sm-12" >
							<option value="" >-- Select Batch Type --</option>
							<?php foreach($batchData as $bData):?>
								<option value="<?php echo $bData->batchTypeID; ?>" <?php if($mode == "Edit"){if ($r->batchType == $bData->batchTypeID) echo 'selected = "selected"'; } ?> >
									<?php echo $bData->batchName?>
								</option>
							<?php endforeach;?>
						</select>
						</div>
					</div>
					&nbsp;
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Batch Year<span class="required">*</span></label>

						<div class="col-sm-9">
							<input type="text" name="txtBatchYear"  required="required" class='form-control' id="txtBatchYear" maxlength="4"  placeholder="Enter Batch Year" class="col-xs-10 col-sm-5" 
						value="<?php if($mode == "Edit") { echo $r->batchYear ? $r->batchYear : "" ;}?>"
							/>
						</div>
					</div>&nbsp;

					<div class="form-group">
						<div class="col-sm-12">
							<input type="submit" name="btnAddEditBatch" class="btn btn-primary pull-right" >
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