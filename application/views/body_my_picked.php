
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ticket
        <small>My Tickets</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Ticket</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">My Tickets</h3> &nbsp;



              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Urgent</th>
                  <th>Priority</th>
                  <th>Subject</th>
                  <th>Details</th>
                  <th>Due</th>
                  <th>End User</th>
                  <th>Status</th>
                </tr>
                <?php
                //var_dump($records);

                foreach($records as $r) {
                    echo "<tr>";
                    echo "<td>PCK".$r->task_id."</td>";
                    echo "<td>".$r->urgent."</td>";
                    echo "<td>".$r->priority."</td>";
                    //echo "<td>".$r->create_by."</td>";
                    echo "<td><a href='".base_url()."ticket/details/".$r->ticket_id."'>";
                    echo $r->subject;
                    echo "</a></td>";
                    echo "<td>".$r->details."</td>";
                    echo "<td>".$r->due_date."</td>";
                    echo "<td>".$r->end_user."</td>";
                    //echo "<td>".$r->source."</td>";
                    //echo "<td>".$r->create_datetime."</td>";
                    //echo "<td>".$r->start_datetime."</td>";

                    echo "<td><button>".$r->task_state_note."</button></td>\n";
                    echo "</tr>\n";
                }

                 ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>



      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
