<!--         </div>
    </div>
        </section>
   </div>
    <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2021 <div class="bullet"></div> Design By <a style="color: #1aa9f0;">CELTIC</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div> --> 


  <!-- data tables -->
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready( function () {
    $('#tabelku').DataTable();
    } );
  </script>
  <script>
    $(document).ready( function () {
    $('#tabelku2').DataTable();
    } );
  </script>
  <script>
    $(document).ready( function () {
    $('#tabelku3').DataTable();
    } );
  </script>
  <script>
    $(document).ready( function () {
    $('#tabelku4').DataTable();
    } );
  </script>
  <script>
    $(document).ready( function () {
    $('#tabelku5').DataTable();
    } );
  </script>

  <!-- toastr -->
  <script type="text/javascript">
        function exit_toast()
    {

    iziToast.show({
    theme: 'dark',
    icon: 'icon-person',
    title: 'Hallo',
    message: 'Apakah Kamu Ingin Pergi Sekarang ?',
    position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
    progressBarColor: 'rgb(0, 255, 184)',
    buttons: [
        ['<button>YA</button>', function (instance, toast) {
            window.location.href="<?php echo base_url('s_logout') ?>";
        }], // true to focus
        ['<button>TIDAK</button>', function (instance, toast) {
            instance.hide({
                transitionOut: 'fadeOutUp',
                onClosing: function(instance, toast, closedBy){
                    console.info('closedBy: ' + closedBy); // The return will be: 'closedBy: buttonName'
                }
            }, toast, 'buttonName');
        }, true]
    ],
    onOpening: function(instance, toast){
        console.info('callback abriu!');
    },
    onClosing: function(instance, toast, closedBy){
        console.info('closedBy: ' + closedBy); // tells if it was closed by 'drag' or 'button'
    }
     });

    }
  </script>

  <script>
    // untuk file input
  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
  </script>

  <script type="text/javascript">
    // set global base_url()
  var base_url = '<?= base_url() ?>';
  </script>

  <?php echo (isset($ajax)) ? $ajax : ''; ?>




  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="<?php echo base_url() ?>vendor/stisla/node_modules/cleave.js/dist/cleave.min.js"></script>
  <script src="<?php echo base_url() ?>vendor/stisla/node_modules/cleave.js/dist/addons/cleave-phone.us.js"></script>
  <script src="<?php echo base_url() ?>vendor/stisla/node_modules/select2/dist/js/select2.full.min.js"></script>
  <script src="<?php echo base_url() ?>vendor/stisla/node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="<?php echo base_url() ?>vendor/stisla/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="<?php echo base_url() ?>vendor/stisla/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>vendor/stisla/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>vendor/stisla/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>vendor/stisla/node_modules/cleave.js/dist/cleave.min.js"></script>
  <script src="<?php echo base_url() ?>vendor/stisla/node_modules/cleave.js/dist/addons/cleave-phone.us.js"></script>
  <script src="<?php echo base_url() ?>vendor/stisla/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  
  <script src="<?php echo base_url() ?>vendor/stisla/node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="<?php echo base_url() ?>vendor/stisla/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo base_url() ?>vendor/stisla/node_modules/cleave.js/dist/cleave.min.js"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url() ?>vendor/stisla/assets/js/scripts.js"></script>
  <script src="<?php echo base_url() ?>vendor/stisla/assets/js/custom.js"></script>
  <script src="<?php echo base_url() ?>assets/dist/sweetalert2.all.min.js"></script>
  <script src="<?php echo base_url() ?>assets/dist/iziToast.min.js"></script>

  <!-- page module-->
  <script src="<?php echo base_url() ?>assets/js/page/modules-ion-icons.js"></script>
  <!-- <script src="<?php echo base_url() ?>assets/js/page/index.js"></script> -->
  <script src="<?php echo base_url() ?>assets/js/page/modules-datatables.js"></script>
  <script src="<?php echo base_url() ?>assets/js/page/bootstrap-modal.js"></script> 
 <!--  <script src="<?php echo base_url() ?>assets/js/page/forms-advanced-forms.js"></script> -->

</body>
</html>