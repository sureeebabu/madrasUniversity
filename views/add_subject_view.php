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
				<h4 class="widget-title"><?php echo $mode?> Subject</h4>
				<a href="<?php echo base_url('SubjectController/index/'.$course_code); ?>" class="btn btn-primary   pull-right" >Subject List</a>
			</div>

<?php
	$dataMode = "";
	if($mode == "Add New "){
		$dataMode = "insSubjectData";
	}elseif($mode =="Edit"){
		$dataMode = "upSubjectData/".$subjectID;
	}
	//echo "some = " .$dataMode;
?>


	<form id="subjectValidation" action=" <?php echo site_url('SubjectController/'.$dataMode); ?>" method="post">
		<div class="widget-body">
			<div class="widget-main">
				<div class="row">
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Subject Type <span class="required">*</span></label>

						<div class="col-sm-9">
							<select name="sltSubjectType" id="sltSubjectType" class="col-xs-12 col-sm-12" required="required" >
								<option value=""> -- Select Subject Type -- </option>
								<option value="1" <?php if($mode == "Edit"){if ($r->subjectTypeName == 'Regular') echo 'selected = "selected"'; } ?> >Regular</option>
								<option value="2" <?php if($mode == "Edit"){if ($r->subjectTypeName == 'Practical') echo 'selected = "selected"'; } ?>>Practical</option>
								<option value="3"  <?php if($mode == "Edit"){if ($r->subjectTypeName == 'Elective') echo 'selected = "selected"'; } ?> >Elective</option>
							</select>
						</div>
					</div>
					&nbsp;

<input type="hidden" name="hfcourse_code"  value="<?php echo $course_code?>"  id="hfcourse_code" />

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Subject Code <span class="required">*</span></label>

						<div class="col-sm-9">
							<input type="text" name="txtSubjectCode"  required="required"  id="txtSubjectCode" maxlength="50" placeholder="Enter Subject Code" class="col-xs-12 col-sm-12"
							value="<?php if($mode == "Edit") { echo $r->subCode ? $r->subCode : "" ;}?>"  />
						</div>
					</div>
					&nbsp;
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Subject Name <span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="text" name="txtSubjectName" required="required" id="txtSubjectName"  maxlength="100" placeholder="Enter Subject Name" class="col-xs-12 col-sm-12"
							value="<?php if($mode == "Edit") { echo $r->subjectName ? $r->subjectName : "" ;}?>"  />
						</div>
					</div>
					&nbsp;
					
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Semester <span class="required">*</span></label>
					<div class="col-sm-9">
						
						<select id="sltSemester" name="sltSemester" required="required" class="col-xs-12 col-sm-12" >
							<option value="" >-- Select Semester --</option>
							<?php foreach($semesterData as $sData):?>
								<option value="<?php echo $sData->semesterID; ?>" <?php if($mode == "Edit"){if ($r->semesterID == $sData->semesterID) echo 'selected = "selected"'; } ?> >
									<?php echo $sData->semesterName?>
								</option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
				&nbsp;
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Credits <span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="text" name="txtCredits" required="required" id="txtCredits"  maxlength="2" placeholder="Enter Credits" class="col-xs-12 col-sm-12"
							value="<?php if($mode == "Edit") { echo $r->credits ? $r->credits : "" ;}?>"  />
						</div>
					</div>
					&nbsp;
				
					<div class="form-group">
						<div class="col-xs-12 col-sm-12">
							<input type="submit" name="btnAddEditSubject" class="btn btn-primary pull-right" >
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