<!-- =============================================== -->
<?php
//foreach($records as $r) {
$r = $records[0];
 ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ticket
            <small>Details</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="#">Ticket</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Ticket #<?php echo $r->id; ?></h3>
            </div>
            <!-- form start -->
            <form class="form-horizontal">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Subject</label>
                                <div class="col-md-9">
                                    <input type="hidden" id="ticket_id" name="ticket_id" value="<?php echo $r->id; ?>">
                                    <input class="form-control" placeholder="Subject" readonly value="<?php echo $r->subject; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Details</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="13" placeholder="Details ..." readonly><?php echo $r->details; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" hidden>
                                <label class="col-md-3 control-label">ID</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="ID">
                                </div>
                            </div>
                            <div class="form-group" hidden>
                                <label class="col-md-3 control-label">Status</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="Status">
                                </div>
                            </div>

                         <div class="form-group">
                             <label class="col-md-3 control-label">Urgently</label>
                             <div class="col-md-8">
                                 <input class="form-control" placeholder="Priority" value="<?php echo ucfirst($r->urgent); ?>" readonly>
                             </div>
                         </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Priority</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="Priority" value="<?php echo ucfirst($r->priority); ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Create By</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="Create by" value="<?php echo $r->create_by; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Due Date</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control pull-right datepicker" placeholder="Due Date" readonly value="<?php echo $r->due_date; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">End User</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="End User" value="<?php echo $r->end_user; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Project ID</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="Project ID" readonly value="<?php echo $r->project_id; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-11" id="info"><?php
                                // state 4 is started
                                if($r->state_level < 4) {
                                    // enable the pick button
                                    echo "<input type=\"button\" id=\"btn_pick\" class=\"btn btn-primary pull-right btn-flat\" value=\"Pick Ticket\">";
                                } else {
                                    // disable the pick button
                                    echo "<input type=\"button\" class=\"btn btn-default pull-right btn-flat\" value=\"Pick Ticket\" disabled>";
                                }

                                 ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
        <!-- /.box -->
        <script type="text/javascript">
        $(document).ready(function(){
          $("#btn_pick").click(function(){
            var ticket_id=$("#ticket_id").val();
            //var msg=$("#message").val();

            //alert("ticket_id="+ticket_id);

            $.ajax({
              type:   "POST",
              url:    "/ticket/pick",
              //data:   "name="+name+"&msg="+msg,
              data:   "ticket_id="+ticket_id,
              success:  function(data){
                alert(data);
                $("#btn_pick").removeClass("btn-primary").addClass("btn-default");
                $("#btn_pick").prop('value', 'You Picked');
                $("#btn_pick").attr("disabled", "disabled");
              },
              error: function(request, status, error){
                console.log('skt log: '+error);
                alert("Error: "+error);
              }
            });
          });
        });
        </script>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
