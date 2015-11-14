    <link rel="stylesheet" href="assets/css/dataTables.bootstrap.css">

      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter">

            <!--Begin Datatables-->
            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                      <i class="fa fa-table"></i>
                    </div>
                    <h5>Orders Listing</h5>
                  </header>
                  <div id="collapse4" class="body">
                    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                      <thead>
                        <tr>
                          <th>Order. No.</th>
                          <th>Name</th>
                          <th>Size</th>
                          <th>Filling</th>
                          <th>Stuffed</th>
                          <th>Status</th>
                          <th>Address</th>
                          <th>City</th>
                          <th>Manage Order</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        if(!empty($order_data)){
                          $i=1;
                          foreach($order_data as $row) {
                            echo('<tr>');
                            echo '<td>'.$row->Id.'</td>';
                            echo '<td>'.$row->name.'</td>';
                            echo '<td>'.$row->size.'</td>';
                            echo '<td>'.$row->filling.'</td>';
                            echo '<td>'.(($row->stuffed_crust == 1) ? 'Yes' : 'No').'</td>';
                            echo '<td>'.(($row->order_status == 1) ? 'Completed' : 'Uncompleted').'</td>';
                            echo '<td>'.$row->address.'</td>';
                            echo '<td>'.$row->city.'</td>';
                            echo "<td>
                            <a href='customer/edit/".$row->Id."' class='confirm'  title='Edit Order'> <i class='fa fa-edit'></i> </a> | 
                            <a href='customer/delete/".$row->Id."' class='confirm'  title='Delete Order'> <i class='fa fa-remove'></i> </a>"; 
                            if($row->order_status != 1) {
                              echo "| <a href='customer/complete/".$row->Id."' class='confirm'  title='Complete Order'> <i class='fa fa-check'></i> </a>"; }
                            "</td>";
                            echo('</tr>');
                            $i++;
                          } 
                        }
                        else{
                        ?>
                          <tr>
                            <td> </td>
                            <td>No Order Found</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                          </tr>
                        <?php } ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->

            <!--End Datatables-->
            
          </div><!-- /.inner -->
        </div><!-- /.outer -->
      </div><!-- /#content -->
    </div><!-- /#wrap -->

      <script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.4/js/jquery.dataTables.min.js"></script><!--listing view-->
      <script src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script><!--listing view-->
      <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script><!--Listing View-->
      <script>
        $(function() {
          Metis.MetisTable();
          Metis.metisSortable();
        });
      </script>
