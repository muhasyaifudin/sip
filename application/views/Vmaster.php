<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kantor Desa Kaliangkrik</title>

    <!-- BINARY CSS -->
    <link href="assets/css/binary.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link href="assets/js/dataTables/dataTables.binary.css" rel="stylesheet" />

   <!-- BINARY SCRIPT -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/binary.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
     <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.binary.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>">Desa Kaliangkrik</a> 
            </div>
          <div style="color: white;
            padding: 15px 50px 5px 50px;
            float: right;
            font-size: 16px;">  
                &nbsp; <a href="<?php echo base_url(); ?>ganti_password" class="btn btn-danger square-btn-adjust">Ganti Password</a> 
                &nbsp; <a href="<?php echo base_url(); ?>logout" class="btn btn-danger square-btn-adjust">Logout</a> 
        </div>
            </nav>   
       <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
      				<li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive"/>
				   </li>
                    <li>1
                        <a class="<?php if($this->uri->segment(1) === 'penduduk') echo 'active-menu'; ?>"  href="<?php echo site_url('penduduk'); ?>"> Data Penduduk</a>
                    </li>
                    <li>
                        <a class="<?php if($this->uri->segment(1) === 'perpindahan') echo 'active-menu'; ?>"  href="<?php echo site_url('perpindahan'); ?>">Perpindahan</a>
                    </li>
                    <li>
                        <a class="<?php if($this->uri->segment(1) === 'kedatangan') echo 'active-menu'; ?>"  href="<?php echo site_url('kedatangan'); ?>">Kedatangan</a>
                    </li>
                    <li>
                        <a  class="<?php if($this->uri->segment(1) === 'kelahiran') echo 'active-menu'; ?>" href="<?php echo site_url('kelahiran'); ?>">Kelahiran</a>
                    </li>
			        <li  >
                        <a  class="<?php if($this->uri->segment(1) === 'kematian') echo 'active-menu'; ?>" href="kematian">Kematian</a>
                    </li>	
                      
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <?php 
            $this->load->view($content, $data);
         ?>
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    
     <!-- MORRIS CHART SCRIPTS -->
    <!-- <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script> -->
      <!-- CUSTOM SCRIPTS -->
    <!-- <script src="assets/js/custom.js"></script> -->

     <!-- DATA TABLE SCRIPTS -->
   
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
    <script src="assets/js/custom.js"></script>
         <!-- CUSTOM SCRIPTS -->
   
   
</body>
</html>
