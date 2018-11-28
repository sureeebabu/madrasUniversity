<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');
?>

<div class="main-content">
<div class="main-content-inner">

<div class="page-content">

<div class="row">
	<div class="col-xs-12">

		<div class="widget-box">
			<div class="widget-header widget-header-flat">
				<h4 class="widget-title">Add Marks <span id="subName" ></span> </h4>
<a id="btnListCorrection" href="<?php echo base_url('StaffCorrectionCtrl/index'); ?>" class="btn btn-primary  pull-right" >List Assignment</a>
			</div>

<form id="addInternalMarks" action="<?php echo site_url('MarksCtrl/insInternalMarks/'.$this->uri->segment(3).'/'.$this->uri->segment(4)); ?>" method="post">
		<div class="widget-body">
			<div class="widget-main">
				<div class="row">
<?php
//echo $mode;
if($mode == "marks")
{
	if(count($marksData)>0)
{
	$i=1;
	$j=1;
	foreach($marksData as $row)
	{
		echo '
			<div class="form-group">
		 	<input type="hidden" name="hfQuestionID[]" id="hfQuestionID" value="'.$row->questionID.'" />

			 <label class="col-md-10 control-label no-padding-right mandatory"> 

			 '.$i++.'. '.$row->question.' <span class="required">*</span></label>
			 <div class="col-md-2">
			 	<input type="text" maxlength="2" name="txtMarks[]" required="required"  id="txtMarks'.$j++.'" class="form-control txtMarksChk" value="'.$row->obtainedMarks.'" placeholder="Enter Marks"   onkeypress="restrictMinus(event);" />
			 </div>
		 </div>
		&nbsp;
				';
			
		}
	}else
	{
		echo "<b>No Record Found</b>";
	}
}
elseif($mode=="question")
{
	if(count($questionData)>0)
{
	$i=1;
	$j=1;
	foreach($questionData as $row)
	{
		echo '
			<div class="form-group">
		 	<input type="hidden" name="hfQuestionID[]" id="hfQuestionID" value="'.$row->questionID.'" />
			 <label class="col-sm-10 control-label no-padding-right mandatory"> 
			 '.$i++.'. '.$row->question.' <span class="required">*</span></label>
			 <div class="col-sm-2">
			 	<input type="text" maxlength="2" name="txtMarks[]" required="required"  id="txtMarks'.$j++.'" class="form-control txtMarksChk" value="0" placeholder="Enter Marks"   />
			 </div>
		 </div>
		&nbsp;
				';
			
		}
	}else
	{
		echo "<b>No Record Found</b>";
	}	
}

	?>
					
<label id="lblErrorMsg" ></label>

	<div class="form-group">
		<div class="col-sm-12">
	<input type="submit" id="btnAddMarks" name="btnAddMarks" class="btn btn-primary btn-xs pull-right" />
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

</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
	function restrictMinus(e) {
		var inputKeyCode = e.keyCode ? e.keyCode : e.which;
		if (inputKeyCode != null) {
			if (inputKeyCode == 45) e.preventDefault();
		}
	}


	$('#subName').html($.session.get("subName"));

	$('#btnListCorrection').click(function(){
		$.session.set("subName","");
	});
	$('#btnAddMarks').click(function(){
		$.session.set("subName","");
	});

	var sum = 0;
	$(".txtMarksChk").keyup(function() {
		if ($(this).val() > 0  && $(this).val()<=20) {
			$('#lblErrorMsg').text('');

			$(".txtMarksChk").each(function () {			
				if (!isNaN(this.value) && this.value.length != 0) {
					sum = sum + parseFloat(this.value);
				}
			});
			//alert(sum);

			if(sum <= 20)
			{
				$("#btnAddMarks").removeAttr("disabled"); 
				// $('#lblErrorMsg').text('Total Marks Must be less than 20');
				// $('#lblErrorMsg').css({color:'#FF0000'});	
			}else{
				$('#lblErrorMsg').text('Total Marks Must be less than 20');
				$('#lblErrorMsg').css({color:'#FF0000'});
				$("#btnAddMarks").attr("disabled", "disabled");
				
			}
			sum=0;
		}
		else {
			$(this).val('');
			$('#lblErrorMsg').text('Textbox accept only less than 20');
			$('#lblErrorMsg').css({color:'#FF0000'});

		}
	});



     //$("#btnAddMarks").attr("disabled", "disabled"); 
      //$("#btnAddMarks").removeAttr("disabled"); 



  </script>

<?php
include ('footer.php');
?>