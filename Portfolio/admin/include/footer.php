      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>

    <script src="js/popper.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/main.js"></script>


    <!-- DataTable Js -->
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();

      } ); 

    </script> 
   <!-- End of DataTable JS For pagination and rest -->

    <script src="js/plugins/pace.min.js"></script>

    <!-- Sweet Alert Js -->
    <script src="js/sweetalert.min.js"></script>
    <script>
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
      });
    </script>
    <!-- End Of Sweet Alert -->


    <!-- Ck Editor -->
      <!-- <script src="//cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script> -->
      <script src="js/ckeditor.js"></script>
      <script>
        ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
      </script>
    <!-- End Ck Editor -->

    <!-- Check All Script Started-->
    <script>

      $('#checkAll').click(function(){
        $('input:checkbox').not(this).prop('checked',this.checked);
      });
      
    </script>
    <!-- Check All Script Ended-->

</body>
</html>
 