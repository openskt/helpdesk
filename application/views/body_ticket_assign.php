<!-- =============================================== -->
<?php
foreach($records as $r) {

 ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ticket
            <small>Assign</small>
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
                <h3 class="box-title">Assign Ticket</h3>
            </div>
            <!-- form start -->
            <form class="form-horizontal">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Subject</label>
                                <div class="col-md-9">
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
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="urgently" class="minimal" checked>
                                        Normal
                                    </label>
                                    <label>
                                        <input type="radio" name="urgently" class="minimal">
                                        Urgent
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Priority</label>
                                <div class="col-md-8">
                                    <select class="form-control" style="width: 100%;">
                                        <option selected="selected">Normal</option>
                                        <option>Median</option>
                                        <option>High</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" hidden>
                                <label class="col-md-3 control-label">Create By</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="Create by">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Due Date</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control pull-right datepicker" placeholder="Due Date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">End User</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="End User">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Project ID</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="Project ID" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Create Date</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control pull-right datepicker" placeholder="Create Date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Assigned To</label>
                                <div class="col-md-8">
                                    <select class="form-control select2" multiple="multiple" data-placeholder="Select Assigned To" style="width: 100%;">
                                        <option>User A</option>
                                        <option>User B</option>
                                        <option>User C</option>
                                        <option>User D</option>
                                    </select>
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
                                <div class="col-md-11">
                                    <button type="submit" class="btn btn-primary pull-right btn-flat">Assign</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

                <?php
}
                //var_dump($data);
                /*

                foreach($records as $r) {
                    echo "<tr>";
                    echo "<td>".$r->id."</td>";
                    echo "<td>".$r->status."</td>";
                    echo "<td>".$r->urgently."</td>";
                    echo "<td>".$r->priority."</td>";
                    echo "<td>".$r->create_by."</td>";
                    echo "<td>".$r->subject."</td>";
                    echo "<td>".$r->details."</td>";
                    echo "<td>".$r->due_date."</td>";
                    echo "<td>".$r->end_user."</td>";
                    echo "<td>".$r->source."</td>";
                    echo "<td>".$r->create_datetime."</td>";
                    echo "<td>".$r->start_datetime."</td>";
                    echo "<td>".$r->end_datetime."</td>";
                    echo "<td>".$r->project_id."</td>";
                    echo "<td>".$r->refer_to."</td>";
                    echo "<td>";
                    if(isset($r->assign_to)){
                        echo $r->assign_to;
                    }else{
                        echo "<a href='".base_url()."ticket/assign/".$r->id."' class='btn btn-success' role='button'>Assign</a>";
                    }
                    echo "</td>";
                    echo "<td>".$r->is_active."</td>";
                    echo "<td>".$r->is_hold."</td>";
                    echo "<td>".$r->is_failed."</td>";
                    echo "</tr>";
                }
                */

                 ?>
