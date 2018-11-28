<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');
?>

<div class="main-content">
<div class="main-content-inner">
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
<ul class="breadcrumb">
<li>
<i class="ace-icon fa fa-book"></i>
<a href="#">List of Marks</a>
</li>
</ul><!-- /.breadcrumb -->

</div>

<div class="page-content">

<div class="row">
<div class="col-xs-12">
    <form method="post" id="internalMarksViewValidate" accept-charset="utf-8" action="<?php echo site_url("StudentMarksCtrl/getInternalMarksBySemID/"); ?>">

<div class="form-group" style="padding-top: 10px;"  >
    <div class="col-sm-3 pull-left"> 
        <select id="searchBySem" name="searchBySem" class="form-control" required="required"  >
                <option value="" >-- Select Semester --</option>
                <?php foreach($semesterData as $sData):?>
                                <option value="<?php echo $sData->semesterID; ?>" >
                                    <?php echo $sData->semesterName?>
                                </option>
                            <?php endforeach;?>
            </select>   
    </div>
    <div class="col-sm-3">
        <input type="submit" style="height:33px;" id="btnSearchBySem" name="btnSearchBySem" value="Search" class="btn btn-primary btn-xs pull-left" >
    </div>

</form> 
<br/><br/><br/>
<div class="widget-container-col" id="widget-container-col-2">
    <div class="widget-box widget-color-blue" id="widget-box-2">
        <div class="widget-header">
            <h5 class="widget-title bigger lighter">
                <i class="ace-icon fa fa-book"></i>
                List of Internal Marks  <span id="dispSemester" ></span>
            </h5>
            
        </div>

        <div class="widget-body">
            <div class="widget-main no-padding">
                <table  id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead class="thin-border-bottom">
                        <tr>
                    <th class="text-center">#</th>
                <th class="text-center">Subject Code</th>
                <th class="text-center">Subject Name</th>
                <th class="text-center">Marks</th>
                
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        if($searchMode==="search")
    
                        {
            if(count($marksData)>0)
            {
                $i=1;
                foreach($marksData as $row)
                {
                    //$i++;
                    echo "<tr>";
                    echo "<td  class='text-center'>".$i++."</td>";
                     echo "<td class='text-center'>".$row->subCode."</td>";
                    echo "<td>".$row->subjectName."</td>";
                    echo "<td class='text-center' >".$row->totalMarks."</td>";
                echo "</tr>";
                }
            }else
            {
                echo "<tr><td class='text-center text-danger' colspan='4'><b>No Record Found</b></td></tr>";
            }
        }
        else
        {
                echo "<tr><td class='text-center text-danger' colspan='4'><b>No Record Found</b></td></tr>";
        }
            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- <div class="row">
	<div class="col-xs-12">
		<div id="tblMarks" ></div>
	</div>
</div>
 -->
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
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
