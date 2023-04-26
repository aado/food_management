  
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


  <!-- Footer -->
  <footer class="w3-row-padding w3-padding-32">
     <p style="text-align:center;"> Copyright © All Rights Reserved.</p>
  </footer>

<!-- End page content -->
</div>



<script type='text/javascript'>
    $(document).ready(function () {
    $('#dataorders').DataTable();
    
});

    $( document ).ready(function() {

  $('#Checkoutbtn').modal('hide');


  $('#Checkout').on('click', function(){
    $('#Checkoutbtn').modal('show');
  });

});
    
// Script to open and close sidenav
function w3_open() {
    document.getElementById("mySidenav").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidenav").style.display = "none";
}
</script>

</body>
</html>
