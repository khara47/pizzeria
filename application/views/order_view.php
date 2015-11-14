      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter">

            <!--BEGIN INPUT TEXT FIELDS-->
            <div class="row" style="width:500px;">
              <div class="col-lg-6">
                <div class="box dark">
                  <header>
                    <div class="icons">
                      <i class="fa fa-edit"></i>
                    </div>
                    <h5><?php echo $page_title; ?></h5>
                  </header>
                  <div id="div-1" class="body">
                    <?php echo $this->session->flashdata('add_user'); ?>                    

                    <!--Edit order-->
                    <form class="form-horizontal" action="customer/<?php echo  'update/'.$current_order->Id; ?>" method="post">
                      
                      <div class="form-group">
                        <label class="control-label col-lg-4">Name</label>
                        <div class="col-lg-8">
                          <input type="text" value="<?php echo  isset($current_order) ? $current_order->name : ''; ?>" name="name" class="form-control">
                        </div>
                      </div><!-- /.name end -->

                      <div class="form-group">
                        <label class="control-label col-lg-4">Size</label>
                        <div class="col-lg-8">
                          <select name="size" class="form-control">
                            <option value="Small" <?php echo ($current_order->size=='Small') ? 'Selected' :' '; ?>>Small ($5)</option>
                            <option value="Medium" <?php echo ($current_order->size=='Medium') ? 'Selected' :' '; ?>>Medium ($10)</option>
                            <option value="Large" <?php echo ($current_order->size=='Large') ? 'Selected' :' '; ?>>Large ($15)</option>
                            <option value="Extra Large" <?php echo ($current_order->size=='Extra Large') ? 'Selected' :' '; ?>>Extra Large($20)</option>
                          </select>
                        </div>
                      </div><!-- /.size end -->

                      <div class="form-group">
                        <label class="control-label col-lg-4">Filling</label>
                        <div class="col-lg-8">
                          <select name="filling" class="form-control">
                            <option value="Lemon" <?php echo ($current_order->filling=='Lemon') ? 'Selected' :''; ?>>Lemon($5)</option>
                            <option value="Custard" <?php echo ($current_order->filling=='Custard') ? 'Selected' :''; ?>>Custard($5)</option>
                            <option value="Fudge" <?php echo ($current_order->filling=='Fudge') ? 'Selected' :''; ?>>Fudge($7)</option>
                            <option value="Mocha" <?php echo ($current_order->filling=='Mocha') ? 'Selected' :''; ?>>Mocha($8)</option>
                            <option value="Raspberry" <?php echo ($current_order->filling=='Raspberry') ? 'Selected' :''; ?>>Raspberry($10)</option>
                            <option value="Pineapple" <?php echo ($current_order->filling=='Pineapple') ? 'Selected' :''; ?>>Pineapple($5)</option>
                            <option value="Dobash" <?php echo ($current_order->filling=='Dobash') ? 'Selected' :''; ?>>Dobash($9)</option>
                            <option value="Mint" <?php echo ($current_order->filling=='Mint') ? 'Selected' :''; ?>>Mint($5)</option>
                            <option value="Cherry" <?php echo ($current_order->filling=='Cherry') ? 'Selected' :''; ?>>Cherry($5)</option>
                            <option value="Apricot" <?php echo ($current_order->filling=='Apricot') ? 'Selected' :''; ?>>Apricot($8)</option>
                            <option value="Buttercream" <?php echo ($current_order->filling=='Buttercream') ? 'Selected' :''; ?>>Buttercream($7)</option>
                            <option value="Chocolate Mousse" <?php echo ($current_order->filling=='Chocolate Mousse') ? 'Selected' :''; ?>>Chocolate Mousse($12)</option>
                          </select>
                        </div>
                      </div><!-- /.filling end -->

                      <div class="form-group">
                        <label class="control-label col-lg-4">Tax Location</label>
                        <div class="col-lg-8">
                          <select name="tax_location" class="form-control">
                            <option value="Ontario" <?php echo ($current_order->tax_location=='Ontario') ? 'Selected' :''; ?>>Ontario(10%)</option>
                            <option value="Qubec" <?php echo ($current_order->tax_location=='QubecSmall') ? 'Selected' :''; ?>>Qubec(5%)</option>
                            <option value="Manitou" <?php echo ($current_order->tax_location=='Manitou') ? 'Selected' :''; ?>>Manitou(7%)</option>
                            <option value="Saskatchewan" <?php echo ($current_order->tax_location=='SaskatchewanSmall') ? 'Selected' :''; ?>>Saskatchewan(8%)</option>
                          </select>
                        </div>
                      </div><!-- /.tax end -->

                      <div class="form-group">
                        <label class="control-label col-lg-4">Stuffed Crust</label>
                        <div class="col-lg-8">
                          <select name="stuffed_crust" class="form-control">
                            <option value="1" <?php echo ($current_order->stuffed_crust==1) ? 'Selected' :''; ?>>Yes</option>
                            <option value="0" <?php echo ($current_order->stuffed_crust!=1) ? 'Selected' :''; ?>>No</option>
                          </select>

                        </div>
                      </div><!-- /.stuffed crush end -->

                      <div class="form-group">
                        <label class="control-label col-lg-4">Email</label>
                        <div class="col-lg-8">
                          <input type="text" value="<?php echo  isset($current_order) ? $current_order->email : ''; ?>" name="email" class="form-control">
                        </div>
                      </div><!-- /.email end -->

                      <div class="form-group">
                        <label class="control-label col-lg-4">Address</label>
                        <div class="col-lg-8">
                          <input type="text" value="<?php echo  isset($current_order) ? $current_order->address : '';  ?>" name="address" class="form-control">
                        </div>
                      </div><!-- /.address end -->

                      <div class="form-group">
                        <label class="control-label col-lg-4">City</label>
                        <div class="col-lg-8">
                          <input type="text" value="<?php echo  isset($current_order) ? $current_order->city : ''; ?>" name="city" class="form-control">
                        </div>
                      </div><!-- /.city end -->

                      <div class="form-group">
                        <label class="control-label col-lg-4">Postal Code</label>
                        <div class="col-lg-8">
                          <input type="text" value="<?php echo  isset($current_order) ? $current_order->postal_code : ''; ?>" name="postal_code" class="form-control">
                        </div>
                      </div><!-- /.city end -->

                      <div class="form-group">
                        <label class="control-label col-lg-4">Phone No.</label>
                        <div class="col-lg-8">
                          <input type="text" value="<?php echo  isset($current_order) ? $current_order->phone : ''; ?>" name="phone" class="form-control">
                        </div>
                      </div><!-- /.phone no. end -->

                      <div class="form-group">
                        <label class="control-label col-lg-4">Order Status</label>
                        <div class="col-lg-8">
                          <select name="order_status" class="form-control">
                            <option value="1" <?php echo ($current_order->order_status==1) ? 'Selected' :''; ?>>Completed</option>
                            <option value="0" <?php echo ($current_order->order_status!=1) ? 'Selected' :''; ?>>Uncompleted</option>
                          </select>
                        </div>
                      </div><!-- /.status end -->

                      <button type="submit" class="btn btn-lg btn-success btn-block confirm" title="<?php echo  isset($current_order) ? 'Update Customer' : 'Add Customer'; ?>">Save</button>
                    </form>

                  </div>
                </div>
              </div>

              <!--END TEXT INPUT FIELD-->
            </div><!-- /.row -->

          </div><!-- /.inner -->
        </div><!-- /.outer -->
      </div><!-- /#content -->
    </div><!-- /#wrap -->
