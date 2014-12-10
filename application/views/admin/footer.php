         </div>
         <!-- /.container-fluid -->
      </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
   <!--  Jquery Core Script -->
  	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
   <!--  Core Bootstrap Script -->
   <script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
   <!-- Datatables -->
   <script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
   <script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.js"></script>

   <script>
      $(document).ready(function(){
         $('#view_programs').DataTable();

         $('#view_students').DataTable();
      });
   </script>

   <!-- 
      If livehost na atoa, uncomment below codes and remove/comment above codes. 
      Otherwise, retain above codes. 
   -->
   <!--
   <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
   <script src="cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
   <script src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
   <script src="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>
   -->
</body>
</html>
