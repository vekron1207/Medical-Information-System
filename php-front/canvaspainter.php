<?php
$front_snippet_partial_path="php-front/";
include("php-back/functions.php");
?>
<div class="z-background"></div>
<div class="z-background2"></div>
<div class="z-canvas col-sm-10 col-sm-offset-1">
    <div class="panel panel-danger">
        <div class="panel-heading text-center">
            <?php echo $canvas_heading;?>
        </div>
    </div>
    <?php
    if($module_mode=="full")
    {
        if($nav_state!=false)
        {
        ?>
        <nav class="navbar z-menubar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo $menu_heading;?>.php"><?php echo $menu_heading;?></a>
                </div>
                <ul class="nav navbar-nav" data-requester='module' data-fragment="module">
                    <?php $c=0; foreach($menu_items as $x => $x_value) { ?>
                        <li class="<?php if($c++==0) echo 'active';?>" data-module="<?php echo $x;?>"><a href="<?php echo $menu_heading;?>.php?paint=<?php echo $x;?>"><?php echo $x_value; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
        <?php
        }
        ?>
        <div id="module" class="col-sm-12">
            <?php
                // $keys=array_keys($menu_items);
                // $canvas_paint=$menu_items[$keys[0]];
                include 'php-front/'.$canvas_paint;
            ?>
        </div>
    <?php
    }
    ?>
    <!-- <div class="col-xs-12 developer-text">
        Application developed by Zeeshan Akhtar
    </div> -->
</div>

<?php
if($module_mode!="full")
{
?>
<div class="z-canvas col-xs-12">

    <div class="z-strip col-xs-12 col-md-7">
        <?php
        // $components=array("doctor"=>"Consult","medicine"=>"Details","pathology"=>"Details");
        // extract($components);
        $component_items=$components;
        foreach($components as $component_name=>$component_action){
            
            // For each component
            $component_mode=$component_modes[$component_name];//find its mode
        ?>
        <div class="z-block disable-scrollbars col-xs-12">
            <?php
            // var_dump($components_items);
            
            $component_item_ids="";
            $component_subtitle=[];
            //check its mode
            switch($component_mode){//get ids depending on the mode
                case 'any': $component_item_ids=findanyfromdb("php-back/",$component_name,"profile_name");
                            break;
                case 'my': $component_item_ids=findmyfromdb("php-back/",$component_name,"profile_name");
                           break;
            }
            $collapsed_no_of_doctors=5;//At max 5 items
            foreach($component_item_ids as $component_item_id=>$component_item_name){
                // var_dump($component_item_id);
                if($collapsed_no_of_doctors==0)
                break;
                switch($component_name){
                    case 'doctor': $component_subtitle=findfromdb("php-back/",$component_name,"profile_specialization",$component_item_id);
                    // var_dump($component_subtitle);
                    break;
                    case 'medicine': $component_subtitle=findfromdb("php-back/",$component_name,"profile_description",$component_item_id);
                    break;
                    default:$component_subtitle[$component_item_id]="--subtitle--";
                    break;
                }
                ?>
            <div class="z-card" data-id="<?php echo $component_item_id;?>" data-module="<?php echo $component_name;?>">
                
                <div class="z-card-description">
                    <div class="z-card-img">
                        <img src="img/<?php echo $component_name;?>/profile_<?php echo $collapsed_no_of_doctors;?>.png" alt="profile_image" height="100%">
                        
                    </div>
                    <div class="z-card-title"><?php echo $component_item_name;?></div>
                    <div class="z-card-subtitle"><?php echo $component_subtitle[$component_item_id];?></div>
                </div>
                <a class="btn btn-lg z-card-action" target="_blank" href="profile.php?module=<?php echo $component_name[0]?>&id=<?php echo $component_item_id;?>"><?php echo $component_action;?></a>
            </div>
            <?php
                $collapsed_no_of_doctors--;
            }
            ?>
        </div>
    <?php
    }
    ?>
    </div>
    <div class="z-strip col-xs-12 col-md-5">

        <nav class="navbar z-menubar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo $menu_heading;?>.php"><?php echo $menu_heading;?></a>
                </div>
                <ul class="nav navbar-nav" data-requester='module' data-fragment="module">
                    <?php $c=0; foreach($menu_items as $x => $x_value) { ?>
                        <li class="<?php if($c++==0) echo 'active';?>" data-module="<?php echo $x;?>"><a href="<?php echo $menu_heading;?>.php?paint=<?php echo $x;?>"><?php echo $x_value; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
        <div id="module" class="col-sm-12">
            <?php
                // $keys=array_keys($menu_items);
                // $canvas_paint=$menu_items[$keys[0]];
                include 'php-front/'.$canvas_paint;
            ?>
        </div>
        <!-- <div class="z-background3"></div>
        <div class="z-background4"></div> -->
    </div>
</div>
<?php
}
?>