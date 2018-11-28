<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
include('header.php'); ?>

<div class="main-content">
<div class="main-content-inner">
<div class="page-content">

<div class="row">
<div class="col-xs-12">
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

<form method="post" id="lstSubValidate" accept-charset="utf-8" action="<?php echo site_url("SubjectController/searchBySemID/".$course_code); ?>">

<div class="form-group" style="padding-top: 10px;"  >
	<div class="col-sm-3 pull-left"> 
		<select id="searchBySem" name="searchBySem" class="form-control" required="required"  >
				<option value="" >-- Select Semester --</option>
				<?php foreach($semesterData as $sData):?>
								<option value="<?php echo $sData->semesterID; ?>" >
									<?php echo $sData->semesterName?>
								</option>
							<?php endforeach;?>
				<!-- <option value="1" >Sem 1</option>
				<option value="2" >Sem 2</option>
				<option value="3" >Sem 3</option>
				<option value="4" >Sem 4</option>
				<option value="5" >Sem 5</option>
				<option value="6" >Sem 6</option> -->
			</select>	
	</div>
	<div class="col-sm-3">
		<input type="submit" style="height:33px;" id="btnSearchBySem" name="btnSearchBySem" value="Search" class="btn btn-primary btn-xs pull-left" >
	</div>
</div>
</form>	
<br/><br/>

<div class="widget-container-col" id="widget-container-col-2">
	<div class="widget-box widget-color-blue" id="widget-box-2">
		<div class="widget-header">
			<h5 class="widget-title bigger lighter">
				<i class="ace-icon fa fa-book"></i>
				List of Subjects  <span id="dispSemester" ></span>
			</h5>

<a class="btn btn-white btn-info btn-bold pull-right" href="<?php echo base_url('SubjectController/addEditSubject/'.$course_code); ?>"><i class="ace-icon fa fa-plus bigger-120 blue"></i>&nbsp;Add New Subject</a>&nbsp;&nbsp;&nbsp;
<a class="btn btn-white btn-info btn-bold pull-right" href="<?php echo base_url('CourseController'); ?>"><i class="ace-icon fa fa-file-text-o bigger-120 blue"></i>&nbsp;List Course</a>
			
		</div>

		<div class="widget-body">
			<div class="widget-main no-padding">
				<table  id="dynamic-table" class="table table-striped table-bordered table-hover">
					<thead class="thin-border-bottom">
						<tr>
					<th class="text-center">#</th>
				<th class="text-center">Subject Name</th>
				<th class="text-center">Subject Code</th>
				<th class="text-center">Subject Type</th>
				<th class="text-center">Credits</th>
				<th class="text-center">Action</th>

						</tr>
					</thead>

					<tbody>
						<?php

			if(count($data)>0)
			{
				$i=1;
				foreach($data as $row)
				{
					//$i++;
					echo "<tr>";
					echo "<td  class='text-center'>".$i++."</td>";
					echo "<td>".$row->subjectName."</td>";
					echo "<td class='text-center'>".$row->subCode."</td>";
					echo "<td class='text-center' >".$row->subjectTypeName."</td>";
					echo "<td class='text-center' >".$row->credits."</td>";

					echo "<td class='text-center'>
						  	<a title='Edit Subject' href='".site_url('SubjectController/edit/'.$row->subjectID)."/$course_code' class='tooltip-default' data-rel='tooltip' data-placement='top'>
							<i class='fa fa-edit' ></i>
							</a> &nbsp; | &nbsp;

							<a title='Delete Subject' onClick='return doconfirm();' href='".site_url('SubjectController/deleteFn/'.$row->subjectID)."/$course_code' class='tooltip-default' data-rel='tooltip' data-placement='top'>
							<i class='fa fa-trash' ></i>
							</a>

							</td>";
				echo "</tr>";
				}
			}else
			{
				echo "<tr><td class='text-center text-danger' colspan='6'><b>No Record Found</b></td></tr>";
			}
			?>
					</tbody>
				</table>
			</div>
		</div>
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
	function doconfirm()
	{
		 var isDelete=confirm("Are you sure to delete permanently?");
    	if(isDelete!=true)
    	{
	        return false;
    	}
	}

	$(document).ready(function(){
		$('#btnSearchBySem').click(function(){
		var semesterName = " - " + $('#searchBySem :selected').html();
		//alert(semesterName);
		$.session.set("semesterName",semesterName);
		});
		$('#dispSemester').html($.session.get("semesterName"));
		$.session.set("semesterName"," ");
	});
</script>


<?php include ('footer.php'); ?>