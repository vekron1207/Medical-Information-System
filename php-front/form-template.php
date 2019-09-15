<?php
$row;
if($form_status!="empty"){
    $query="SELECT * from ".$form_db_name." WHERE id='$form_id'";
    // echo $query;
    $resultgroup=mysqli_query($conn,$query);
    if($rowtemp = $resultgroup->fetch_assoc()){
        // var_dump($rowtemp);
        $row=$rowtemp;
    }
}
    foreach($form_items_types as $form_item=>$form_item_type){?>
    <div class="row form-group">
    <?php if($form_item_type=="text"){?>
        <label for="<?php echo $form_item;?>" class="col-sm-2 control-label"><?php echo $form_items[$form_item];?></label>
		<div class="col-sm-10">
			<input id="<?php echo $form_item;?>" name="<?php echo $form_item;?>" value="<?php if($form_status!="empty") echo $row[$form_item]; ?>" type="text" class="form-control" <?php if(in_array($form_item,$form_items_required))echo "required "; if($form_status=="disabled") echo "disabled";?> />
		</div>
    <?php }
    else if($form_item_type=="string"){?>
        <label for="<?php echo $form_item;?>" class="col-sm-2 control-label"><?php echo $form_items[$form_item];?></label>
		<div class="col-sm-10">
			<?php if($form_status!="empty") echo $row[$form_item];?>
		</div>
    <?php }
    else if($form_item_type=="select"){?>
        <label for="<?php echo $form_item;?>" class="col-sm-2 control-label"><?php echo $form_items[$form_item];?></label>
		<div class="col-sm-10">
            <select class="form-control" id="<?php echo $form_item;?>" name="<?php echo $form_item;?>" <?php if(in_array($form_item,$form_items_required))echo "required "; if($form_status=="disabled") echo "disabled";?> >
                <option value="">--Select--</option>
                <?php foreach($form_items_values[$form_item] as $form_item_values_db=>$form_item_values){?>
                <option value="<?php echo $form_item_values_db;?>"><?php echo $form_item_values;?></option>
                <?php } ?>
            </select>
		</div>
    <?php }
    else if($form_item_type=="password"){?>
        <label for="<?php echo $form_item;?>" class="col-sm-2 control-label"><?php echo $form_items[$form_item];?></label>
		<div class="col-sm-10">
			<input id="<?php echo $form_item;?>" name="<?php echo $form_item;?>" type="password" class="form-control" <?php if(in_array($form_item,$form_items_required))echo "required "; if($form_status=="disabled") echo "disabled";?> />
		</div>
    <?php } ?>
    </div>
    <?php 
    }
?>
			<!-- <div class="row form-group">
				<label for="pass" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
					<input id="pass" name="pass" type="password" class="form-control" required />
				</div>
<div class="row form-group">
			<label for="department" class="col-sm-2 control-label">Department</label>
                <div class="col-sm-10">
                    
                </div>
		</div>
		<div class="row form-group">
			<label for="course_year" class="col-sm-2 control-label" style="color:#337ab7; font-size:14px">Course Year</label>
                <div class="col-sm-10">
                    <select required class="form-control" id="course_year" name="course_year">
                        <option value="">--Select--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
		</div>
		<div class="row form-group">
			<label for="batch" class="col-sm-2 control-label" style="color:#337ab7; font-size:14px">Section/Batch</label>
                <div class="col-sm-10">
                    <select required class="form-control" id="batch" name="batch">
                        <option value="">--Select--</option>
                        <option value="A1">A1</option>
                        <option value="A2">A2</option>
                        <option value="B1">B1</option>
                        <option value="B2">B2</option>
                        <option value="C1">C1</option>
                        <option value="C2">C2</option>
                        <option value="D1">D1</option>
                        <option value="D2">D2</option>
                    </select>
                </div>
		</div>
		<div class="row form-group">
			<label for="allowed_users" class="col-sm-2 control-label" style="color:#337ab7; font-size:14px">Allowed Users</label>
			<div class="col-sm-10">
				<input id="allowed_users" name="allowed_users" type="text" class="form-control" required />
			</div>
        </div>
        <div class="row form-group">
			<label for="description" class="col-sm-2 control-label" style="color:#337ab7; font-size:14px">Description</label>
			<div class="col-sm-10">
				<input id="description" name="description" type="text" class="form-control" required />
			</div>
        </div>
		<div class="row form-group">
			<div class="col-sm-offset-5 col-sm-2">
			     <button type="submit" class="btn btn-danger col-sm-8 col-sm-offset-2">
					<span class="glyphicon glyphicon-floppy-disk"></span>
					<br class="hidden-lg hidden-sm hidden-xs">					
					<span class="hidden-sm">Continue</span>
				 </button>
			</div>
		</div> -->