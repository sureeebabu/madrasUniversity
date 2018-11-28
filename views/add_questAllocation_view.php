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
			<h4 class="widget-title">Question Allocation</h4>
		</div>

	<form id="quesAllocation" action=" <?php echo site_url('QuestAlloController/insAssignment'); ?>" method="post">		
	<div class="widget-body">
		<div class="widget-main">
			<div class="row">

			<div class="col-sm-12">

			<table style="width:100%" >
				<tr>
					<td>Batch Type <span class="required">*</span></td>
					<td>
						<select id="sltBatchType"  style="width:280px;" name="sltBatchType" data-error="#errNm1" >
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
						<select id="sltBatch" style="width:280px;" name="sltBatch" >
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
						<select id="sltCourse" style="width:280px;"  name="sltCourse" required="required" "  >
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
				<select id="searchBySubject" name="searchBySubject"  required="required" class="col-xs-2 col-sm-2" style="width: 280px;">
				<option value="" >-- Select Subject --</option>
				</select>
						 
					</td>	
				</tr>

			</table>

<h3 class="text-center" >Total Question Count</h3>


<table class="table  table-hover" >
<tr>
	<td class="text-right">Unit 1 : </td>
	<td class="text-left" ><div id="unit1" ></div></td>
	<td>&nbsp;</td>
	<td class="text-right">Unit 2 : </td>
	<td class="text-left" ><div id="unit2" ></div></td>
	<td>&nbsp;</td>
	<td class="text-right">Unit 3 : </td>
	<td class="text-left" ><div id="unit3" ></div></td>
	<td>&nbsp;</td>
	<td class="text-right">Unit 4 : </td>
	<td class="text-left" ><div id="unit4" ></div></td>
	<td>&nbsp;</td>
	<td class="text-right">Unit 5 : </td>
	<td class="text-left" ><div id="unit5" ></div></td>
</tr>
</table>


<div class="row">
	<div class="col-md-3" ></div>
	<div class="col-xs-3 col-sm-3">
		<label>Target Date <span class="required">*</span></label>
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Target Date" name="dtTargetDate" id="dtTargetDate" required="required" >
			<span class="input-group-addon">
				<i class="fa fa-calendar bigger-110"></i>
			</span>
		</div>
	</div>
	<div class="col-xs-3 col-sm-3">
		<label>Grace Date <span class="required">*</span></label>
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Grace Date" name="dtGraceDate" id="dtGraceDate" required="required" >
			<span class="input-group-addon">
				<i class="fa fa-calendar bigger-110"></i>
			</span>
		</div>
	</div>
	<div class="col-md-3" ></div>
</div>

				<div class="form-group">
					<div class="col-sm-12">
						<input type="submit" name="btnAlloQuestion" id="btnAlloQuestion" class="btn btn-primary pull-right" >
					</div>
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

<script>
        $(function () {
            //Date picker
            $('#dtTargetDate').datepicker({
                autoclose: true,
                //format: 'dd/mm/yyyy'
                format: 'yyyy/mm/dd'
            });

            $('#dtGraceDate').datepicker({
                autoclose: true,
                format: 'yyyy/mm/dd'
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

	$('#searchBySubject').change(function(){

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

		$.session.set("sessBatchType",enrollNo);

		var subjectID = $('#searchBySubject').val();
		//alert(subjectID);
		$.ajax({
				url:"<?php echo base_url(); ?>
				QuestAlloController/fetch_unit/"+subjectID+"/1",
				method:"POST",
				success:function(data){
					 //console.log('Unit 1 = ' + data);
					$('#unit1').html(data);
				}

			});
		$.ajax({
				url:"<?php echo base_url(); ?>
				QuestAlloController/fetch_unit/"+subjectID+"/2",
				method:"POST",
				success:function(data){
					//console.log('Unit 2 = ' + data);
					$('#unit2').html(data);
				}

			});
		$.ajax({
				url:"<?php echo base_url(); ?>
				QuestAlloController/fetch_unit/"+subjectID+"/3",
				method:"POST",
				success:function(data){
					//console.log('Unit 3 = ' + data);
					$('#unit3').html(data);
				}

			});
		$.ajax({
				url:"<?php echo base_url(); ?>
				QuestAlloController/fetch_unit/"+subjectID+"/4",
				method:"POST",
				success:function(data){
					//console.log('Unit 4 = ' + data);
					$('#unit4').html(data);
				}

				});
		$.ajax({
				url:"<?php echo base_url(); ?>
				QuestAlloController/fetch_unit/"+subjectID+"/5",
				method:"POST",
				success:function(data){
					//console.log('Unit 5 = ' + data);
					$('#unit5').html(data);
				}

				});
	});

	// $('#btnAlloQuestion').click(function(){
		
	// 		//alert(enrollNo);

	// });

});

	

</script>

<?php include ('footer.php'); ?>