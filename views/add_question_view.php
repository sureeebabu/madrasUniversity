<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php'); ?>

<div class="main-content">
<div class="main-content-inner">

<div class="page-content">

<div class="row">
<div class="col-xs-2"></div>
<div class="col-xs-7">

<div class="widget-box">
	<div class="widget-header widget-header-flat">
		<h4 class="widget-title"><?php echo $mode?> Questions</h4>
		<a href="<?php echo base_url('QuestionController/index'); ?>" class="btn btn-primary   pull-right" >Question List</a>
	</div>

<?php
	$dataMode = "";
	if($mode == "Add New "){
		$dataMode = "insQuestData";
	}elseif($mode =="Edit"){
		$dataMode = "updateQuesData/".$questionID;
	}
	//echo "some = " .$dataMode;
?>


<form id="questValidation"  action="<?php echo site_url('QuestionController/'.$dataMode); ?>" method="post">
<div class="widget-body">
	<div class="widget-main">
	<div class="row">
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Course <span class="required" >*</span></label>
			<div class="col-sm-9">
				<select id="selCourse" name="selCourse" required="required" class="col-xs-12 col-sm-12"  >
					<option value="" >-- Select Course --</option>
					<?php foreach($courseData as $cData):?>
						<option value="<?php echo $cData->course_code; ?>" <?php if($mode == "Edit"){if ($r->course_code == $cData->course_code) echo 'selected = "selected"'; } ?> >
							<?php echo $cData->courseName ?>
						</option>
					<?php endforeach;?>
				</select>
			</div>
		</div>
		&nbsp;
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Subject <span class="required" >*</span></label>
		<div class="col-sm-9">
			<select id="selSubject" name="selSubject" required="required" class="col-xs-12 col-sm-12" >
			<option value="" >-- Select Select --</option>
				<?php foreach($subjectData as $sData):?>
					<option value="<?php echo $sData->subjectID; ?>" <?php if($mode == "Edit"){if ($r->subjectID == $sData->subjectID) echo 'selected = "selected"'; } ?> >
						<?php echo $sData->subjectName?>
					</option>
				<?php endforeach;?>
			</select>
		</div>
	</div>
	&nbsp;
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Unit <span class="required" >*</span></label>
		<div class="col-sm-9">
			
			<select id="selUnit" name="selUnit" required="required" class="col-xs-12 col-sm-12"  >
				<option value="" >-- Select Unit --</option>
				<?php foreach($unitData as $uData):?>
					<option value="<?php echo $uData->unitID; ?>" <?php if($mode == "Edit"){if ($r->unitID == $uData->unitID) echo 'selected = "selected"'; } ?> >
						<?php echo $uData->unitName?>
					</option>
				<?php endforeach;?>
			</select>
		</div>
	</div>
	&nbsp;
			
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Question <span class="required" >*</span></label>
			<div class="col-sm-9">
				<textarea name='txtQuestion' rows="5" placeholder="Enter Questions"  class="form-control col-xs-12 col-sm-12"><?php if($mode == "Edit") { echo $r->question ? $r->question : "" ;}?></textarea>
						</div>
					</div>
					&nbsp;&nbsp;
			<div class="form-group">
				<div class="col-xs-12 col-sm-12">
					<input type="submit" name="btnAddEditSubject" class="btn btn-primary pull-right" />
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

<script type="text/javascript">
	$(document).ready(function(){
		$('#selCourse').change(function(){
			var course_code = $('#selCourse').val();
			//alert(course_code);
			if(course_code!=''){
				$.ajax({
					url:"<?php echo base_url(); ?>
					QuestionController/fetch_subject/"+course_code,
					method:"POST",
					success:function(data){
						//console.log(data);
						$('#selSubject').html(data);
					}

				});
			}
		});
	});

</script>



<?php
include ('footer.php');
?>