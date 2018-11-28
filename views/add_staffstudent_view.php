<?php defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');
?>
<div class="main-content">
	<div class="main-content-inner">

		<div class="page-content">

			<div class="row">
				<div class="col-xs-12">
          <?php 
	if(isset($_SESSION['msg']))
	{
		echo '
			<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>
				<i class="ace-icon fa fa-check green"></i>
				<strong class="green">
					'.$_SESSION['msg'].'	
				</strong>
			</div>
		';
		$_SESSION['msg'] = null;
	}
	?>
					<div class="widget-box">
						<div class="widget-header widget-header-flat">
							<h4 class="widget-title">Staff Allocation</h4>
						</div>

<form id="quesAllocation" action="<?php echo site_url('StaffStudentController/insStaffStudent'); ?>" method="post">		
<div class="widget-body">
<div class="widget-main">
<div class="row">

<div class="col-sm-12">

<table style="width:100%" >
<tr>
	<td>Batch Type <span class="required">*</span></td>
	<td>
		<select id="sltBatchType"  style="width:180px;" name="sltBatchType" data-error="#errNm1" >
			<option value="">--Select Batch--</option>
			<?php foreach($batchTypeData as $bTypeData):?>
				<option value="<?php echo $bTypeData->batchTypeID; ?>" >
					<?php echo $bTypeData->batchName ?>
				</option>
			<?php endforeach;?>
		</select>
		<div class="errorTxt">
			<span id="errNm2"></span>
		</div>
	</td>
	<td>Batch <span class="required">*</span></td>	
	<td>
		<select id="sltBatch" style="width:200px;" name="sltBatch" >
			<option value="" >-- Select Year --</option>
		</select>
	</td>
</tr>
<tr>
	<td colspan="2" >&nbsp;</td>
</tr>	
<tr>
	<td>
		Course <span class="required">*</span>
	</td>
	<td>
		<select id="sltCourse" style="width:180px;"  name="sltCourse" required="required" "  >
			<option value="" >-- Select Course --</option>
			<?php foreach($courseData as $cData):?>
				<option value="<?php echo $cData->course_code; ?>" >
					<?php echo $cData->courseName ?>
				</option>
			<?php endforeach;?>
		</select>
	</td>
	<td>
		Subject <span class="required">*</span>
	</td>
	<td>
		<select id="searchBySubject" name="searchBySubject"  required="required" class="col-xs-2 col-sm-2" style="width: 200px;">
			<option value="" >-- Select Subject --</option>
		</select>

	</td>	
</tr>
<tr>
	<td colspan="4" >&nbsp;</td>
</tr>

<tr>
	<td>Staff <span class="required">*</span></td>
	<td>
		<select id="sltStaff" style="width:180px;"  name="sltStaff" required="required" "  >
			<option value="" >-- Select Staff --</option>
			<?php foreach($staffData as $sData):?>
				<option value="<?php echo $sData->staffID; ?>" >
					<?php echo $sData->staffName ?>
				</option>
			<?php endforeach;?>
		</select>
	</td>
</tr>

</table>
<br/>
<div class="form-group">
	<div class="col-sm-12 text-center">
		<center>
			<table >
				<tr>
					<td>
						<div id="chkNonAssignStudent" ></div>	
					</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>
						<div id="chkAssignStudent" ></div>
					</td>
				</tr>
			</table>
		</center>

<div class="hr hr-16 hr-dotted"></div>
</div>
</div>


<br/><br/>
<div class="text-center">
	<input type="submit" id="btnSubmit" class="btn btn-primary btn-xs text-center" name="btnSubmit">
</div>
</div>

</div>
</div>
  </div>
</form>
</div>
</div><!-- /.col -->
</div>
</div>
</div>
</div>

<script type="text/javascript">
	jQuery(function($){
		var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox({infoTextFiltered: '<span class="label label-purple label-lg">Filtered</span>'});
		var container1 = demo1.bootstrapDualListbox('getContainer');
		container1.find('.btn').addClass('btn-white btn-info btn-bold');

		$('#select2-multiple-style .btn').on('click', function(e){
			var target = $(this).find('input[type=radio]');
			var which = parseInt(target.val());
			if(which == 2) $('.select2').addClass('tag-input-style');
			else $('.select2').removeClass('tag-input-style');
		});
		
		//in ajax mode, remove remaining elements before leaving page
		$(document).one('ajaxloadstart.page', function(e) {
			$('[class*=select2]').remove();
			$('select[name="duallistbox_demo1[]"]').bootstrapDualListbox('destroy');
			$('.rating').raty('destroy');
			$('.multiselect').multiselect('destroy');
		});

	});
</script>

<script type="text/javascript">

	$(document).ready(function(){
		$('#sltBatchType').change(function(){
			var batchTypeID = $('#sltBatchType').val();
		//alert(batchTypeID);
		$.ajax({
			url:"<?php echo base_url(); ?>
			BatchController/fetch_Batch/"+batchTypeID,
			method:"POST",
			success:function(data){
					//console.log(data);
					$('#sltBatch').html(data);
				}
			});
	});


		$('#sltCourse').change(function(){
			var course_code = $('#sltCourse').val();
		//alert(course_code);
		if(course_code!=''){
			$.ajax({
				url:"<?php echo base_url(); ?>
				QuestionController/fetch_subject/"+course_code,
				method:"POST",
				success:function(data){
					//console.log(data);
					$('#searchBySubject').html(data);
				}

			});
		}
	});




		$('#sltStaff').change(function(){
			var staffID = $('#sltStaff').val();
			var batchType = $('#sltBatchType').val();
			var courseCode = $('#sltCourse').val();
			var batchYear =$("#sltBatch option:selected").text();
			var btType = "";
			var enrollNo = "";
			if(batchType == "1")
			{
				btType = "A";
			}else if(batchType == "2")
			{
				btType ="C";
			}
			enrollNo=btType + batchYear.substr(batchYear.length - 2);

			$.ajax({
				url:"<?php echo base_url(); ?>
				StaffStudentController/getNonAssignStudent/"+courseCode+"/"+enrollNo +"/"+staffID+"/"+batchType,
				method:"POST",
				success:function(data){
					console.log(data);
					//alert(data);
					$('#chkNonAssignStudent').html(data);
				}
			}); 

			$.ajax({
				url:"<?php echo base_url(); ?>
				StaffStudentController/getAssignStudent/"+courseCode+"/"+enrollNo +"/"+staffID+"/"+batchType,
				method:"POST",
				success:function(data){
					console.log(data);
					//alert(data);
					$('#chkAssignStudent').html(data);
				}
			});

		});

	});
</script>


<?php include ('footer.php'); ?>