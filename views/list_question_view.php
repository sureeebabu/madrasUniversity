<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
include('header.php'); ?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
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
					<div class="row">
						<div class="col-xs-12">

<form method="post" id="searchQuesValidate" accept-charset="utf-8" action="<?php echo site_url("QuestionController/searchByCourseCodeSubject/"); ?>">

	<div class="form-group" >
		<div class="col-sm-3"> 
			<select id="searchByCourse" name="searchByCourse" required="required" class="form-control">
				<option value="" >-- Select Course --</option>
				<?php foreach($courseData as $cData):?>
					<option value="<?php echo $cData->course_code; ?>"><?php echo $cData->courseName ?>
				</option>
			<?php endforeach;?>
		</select>
	</div>
</div>
<div class="form-group">
	<div class="col-sm-3"> 
		<select id="searchBySubject" name="searchBySubject" required="required" class="form-control">
			<option value="" >-- Select Subject --</option>
		</select>
	</div>
</div>	
<input type="submit" name="btnSearchBySem" id="btnSearchBySem" value="Search" class="btn btn-primary btn-xs" >
</form>	

<div class="widget-container-col" id="widget-container-col-2" style="padding-top:30px;" >
<div class="widget-box widget-color-blue" id="widget-box-2">
<div class="widget-header">
<h5 class="widget-title bigger lighter">
<i class="ace-icon fa fa-question"></i>
	List of Questions <span id="dispSubject" ></span>
</h5>

<a class="btn btn-white btn-info btn-bold pull-right" href="<?php echo base_url('QuestionController/addEditQuestions'); ?>"><i class="ace-icon fa fa-plus bigger-120 blue"></i> Add New Question</a>

</div>

<div class="widget-body">
<div class="widget-main no-padding">
<table  id="dynamic-table" class="table table-striped table-bordered table-hover">
<thead class="thin-border-bottom">
	<tr>
		<th class="text-center">#</th>
		<th class="text-center">Unit Name</th>
		<th class="text-center" style='width:75%'>Question</th>
		<th class="text-center">Action</th>
	</tr>
</thead>

<tbody>
	<?php
	if($searchMode==="search")
	{

		if(count($data)>0)
		{
			$i=1;
			foreach($data as $row)
			{
//$i++;
	echo "<tr>";
	echo "<td  class='text-center'>".$i++."</td>";
	echo "<td class='text-center'>".$row->unitName."</td>";
	echo "<td>".$row->question."</td>";					

	echo "<td class='text-center'>
	<a title='Edit Question' href='".site_url('QuestionController/edit/'.$row->questionID)."' class='tooltip-default' data-rel='tooltip' data-placement='left'>
	<i class='fa fa-edit' ></i>
	</a> &nbsp; | &nbsp;

	<a title='Delete Question' onClick='return doconfirm();' href='".site_url('QuestionController/deleteFn/'.$row->questionID)."'
	class='tooltip-default' data-rel='tooltip' data-placement='top'>
	<i class='fa fa-trash' ></i>
	</a>

	</td>";
	echo "</tr>";
			}
		}else
		{
			echo "<tr><td class='text-center text-danger' colspan='6'><b>No Record Found</b></td></tr>";
		}
	}else{
		echo "<tr><td class='text-center text-danger' colspan='6'><b>No Record Found</b></td></tr>";
	}
	?>

</tbody>
</table>
			</div>
								</div>
							</div>
						</div>

						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<tr class="info">
								<!-- <th>userID</th> -->

							</tr>
						</table>

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
		$('#searchByCourse').change(function(){
			var course_code = $('#searchByCourse').val();
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

		$('#btnSearchBySem').click(function(){
        var subjectName = " - " + $('#searchBySubject :selected').html();
    		$.session.set("subjectName",subjectName);
        });
        	$('#dispSubject').html($.session.get("subjectName"));
			$.session.set("subjectName"," ");

	});



</script>


<?php include ('footer.php'); ?>