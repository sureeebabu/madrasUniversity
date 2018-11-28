<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
include('header.php'); ?>

<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="menu-icon fa fa-edit"></i>
					<a href="#">Staff Courses</a>
				</li>
			</ul><!-- /.breadcrumb -->

		</div>

<div class="page-content">
<div class="row">
<div class="col-xs-12">
	<div class="row" >
		<form action="<?php echo site_url('StaffCourseController/insertStaffCourseData/'.$staffID); ?>" method="post">
			<div class="col-md-6" >
				<div class="widget-container-col" id="widget-container-col-2">
					<div class="widget-box widget-color-blue" id="widget-box-2">
						<div class="widget-header">
							<a href="#modal-form" id="viewModal" role="button" class="blue btn btn-white btn-info btn-bold pull-right" data-toggle="modal"><i class="fa fa-eye"></i>&nbsp;View Staff Course Details</a>
							<a href="<?php echo site_url('StaffController'); ?>" class="blue btn btn-white btn-info btn-bold pull-right" data-toggle="modal">Staff List</a>
						</div>
	<div class="widget-body">
		<div class="widget-main no-padding">
			<table  id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead class="thin-border-bottom">
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Course Code</th>
						<th class="text-center">Course Name</th>
						<th class="text-center">Assign</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(count($courseData)>0)
					{
						$j=1;

						foreach ($courseData as $value) {
							echo "<tr>";
							echo "<td class='text-center' >".$j++."</td>";
							echo "<td class='text-center' >".$value->course_code."</td>";
							echo "<td>".$value->courseName."</td>";

							echo "<td class='text-center'><div class='ace-settings-item'>";
							echo "<input type='checkbox' name='chkCourse[]' class='ace ace-checkbox-2 ace-save-state'   id='$value->course_code' autocomplete='off' value='$value->course_code'  />";
							echo "<label class='lbl' for='$value->course_code'>&nbsp;</label>";

							echo "</div></td>";
							echo "</tr>";
						}

						echo '
						<tr>
						<td colspan="5" class="text-center">
						<input type="submit" name="btnStaffCourse" class="btn btn-primary btn-xs" />
						</td>

						</tr>

						';
					}

					?>
						</tbody>
					</table>
				</div>
			</div>
			</div>
		</div>
	</div>
      
  <div class="col-md-6" >
		<div id="chkSubject" ></div>
	</div>
</div>

	
			</form>
		</div>

	</div>
	</div>
</div>
<!-- </form> -->
	</div>



<div id="modal-form" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Staff Course Details</h4>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<div class="table-responsive">
							<div id="tblStaffCourseDetails" ></div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button class="btn btn-sm" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Cancel
				</button>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		//alert('ask')
		$("input[name^='chkCourse']").click(function(){

			if($(this).prop("checked") == true){
				var course_code = $(this).val();
				if(course_code!=''){
					$.ajax({
						url:"<?php echo base_url(); ?>
						StaffCourseController/fetch_subjectByCourseCode/"+course_code,
						method:"POST",
						success:function(data){
							$('#chkSubject').append(data);
					//console.log(data);
					//$('#chkSubject').html(data);
				}

			});
				}

			}
			else
			{
				//$('#chkSubject').html('');
			}
		});


$("#viewModal").click(function(){
	var staffID='<?php echo $this->uri->segment(3) ?>';
	var htmlStr = "";
htmlStr=htmlStr+'<table id="dynamic-table" class="table table-striped table-bordered table-hover">';
	htmlStr=htmlStr+'<tr class="info">';
	htmlStr=htmlStr+'<th class="text-center">#</th>';
	htmlStr=htmlStr+'<th class="text-center">Course Code</th>';
	htmlStr=htmlStr+'<th class="text-center">Course Name</th>';
	htmlStr=htmlStr+'<th class="text-center">Subject Code</th>';
	htmlStr=htmlStr+'<th class="text-center">Subject Name</th>';
	htmlStr=htmlStr+'</tr>';
	var slNo=1;
		

	$.ajax({
		url:"<?php echo base_url(); ?>StaffCourseController/fetch_staffCourseDetailsByID/"+staffID,
		method:"POST",
		success:function(data){
			var convertJson = JSON.parse(data);
			//console.log(data);
			for(i=0;i<=convertJson.length-1;i++)
			{
				
				htmlStr=htmlStr+'<tr>';
				htmlStr=htmlStr+'<td class="text-center">'+ slNo++ +'</th>';
				htmlStr=htmlStr+'<td class="text-center">'+ convertJson[i].course_code +'</td>';
				htmlStr=htmlStr+'<td>'+ convertJson[i].courseName +'</td>';
				htmlStr=htmlStr+'<td class="text-center">'+ convertJson[i].subCode +'</td>';
				htmlStr=htmlStr+'<td>'+ convertJson[i].subjectName +'</td>';
				htmlStr=htmlStr+'</tr>';
			}
			htmlStr=htmlStr+'</table>';
			$('#tblStaffCourseDetails').html(htmlStr);
		}
	});
	
	
});

	});
</script>

<?php include ('footer.php'); ?>