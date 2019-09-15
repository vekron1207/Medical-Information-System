
    <div class="z-submenu">
        <ul class="nav nav-tabs" data-requester='trinket' data-fragment="approvet">
            <li class="active" data-approvet="patient"><a data-toggle="tab">Patient<span class="btn btn-xs btn-danger" id="pr0_count"></span></a></li>
            <li data-approvet="doctor"><a data-toggle="tab">Doctor<span class="btn btn-xs btn-danger" id="pr1_count"></span></a></li>
            <li data-approvet="medicine"><a data-toggle="tab">Medicine<span class="btn btn-xs btn-danger" id="pr2_count"></span></a></li>
            <li data-approvet="pathology"><a data-toggle="tab">Pathology<span class="btn btn-xs btn-danger" id="pr3_count"></span></a></li>
        </ul>
        <div id="approvet" class="tab-content">
            <?php
            $approvet="patient";
            include "approvet.php";
            ?>
        </div>
    </div>

    
<!-- <div class="panel panel-danger">
    <div class="panel-heading" data-toggle="collapse" data-target="#playground" style="font-size:150%;"><b>Playground</b><span class="btn btn-danger pull-right glyphicon glyphicon-chevron-up"></span></div>
    <div  class="panel-body collapse in viewsegue" id="playground">
        <h1 style="margin-left:100px;">
            Select an application to proceed
        </h1>
    </div>
</div> -->

  <script>
      $( '.z-submenu' ).fragmentLoader();
  </script>