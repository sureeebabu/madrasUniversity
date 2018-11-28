<?php defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');
?>
<div class="main-content">
<div class="main-content-inner">

<div class="page-content">

<div class="row">
<div class="col-xs-12">

	<div class="widget-box">
		<div class="widget-header widget-header-flat">
			<h4 class="widget-title">Staff Allocation</h4>
		</div>

	<form id="quesAllocation" action=" <?php echo site_url('StaffStudentController/insStaffStudent'); ?>" method="post">		
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
				<!-- 	<td colspan="2" >
						<input type="button" id="btnGetStudent" name="btnGetStudent" class="btn btn-info btn-xs" value="Get Student" >
					</td>
 -->
				</tr>

			</table>
 
 			<div class="text-center">
			<div id="chkStudent" ></div>
		</div>
		<br/><br/>
		<div class="text-center">
		<input type="submit" id="btnSubmit" class="btn btn-primary btn-xs text-center" name="btnSubmit">
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
</div>
</div>
</div>
</div>
</div>

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
				StaffStudentController/getStudent/"+courseCode+"/"+enrollNo,
				method:"POST",
				success:function(data){
					//console.log(data);
					$('#chkStudent').html(data);
				}
			}); 

	});

});

	

</script>

<?php include ('footer.php'); ?>