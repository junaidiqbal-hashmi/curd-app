  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="login.html">Logout</a>
              </div>
          </div>
      </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('assets/scripts.js')}}"></script>
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('assets/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('assets/vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('assets/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{ asset('assets/js/demo/chart-pie-demo.js')}}"></script>


  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

  <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script src="../cdn.jsdelivr.net/npm/bootstrap%405.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/scripts.js')}}"></script>
  <script src="../cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{ asset('assets/js/demo/chart-bar-demo.js')}}"></script>
  <script src="{{ asset('assets/js/demo/chart-pie-demo.js')}}"></script>
  <script src="../cdn.jsdelivr.net/npm/simple-datatables%407.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
  <script src="../cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
  <script src="{{ asset('js/litepicker.js') }}"></script>

  <script src="../assets.startbootstrap.com/js/sb-customizer.js"></script>
  <sb-customizer project="sb-admin-pro"></sb-customizer>
  <script>
      (function() {
          function c() {
              var b = a.contentDocument || a.contentWindow.document;
              if (b) {
                  var d = b.createElement('script');
                  d.innerHTML = "window.__CF$cv$params={r:'8ae5ec1cafafc914',t:'MTcyMjg1MTg0MC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='cdn-cgi/challenge-platform/h/b/scripts/jsd/8c81cb09042c/maind41d.js';document.getElementsByTagName('head')[0].appendChild(a);";
                  b.getElementsByTagName('head')[0].appendChild(d)
              }
          }
          if (document.body) {
              var a = document.createElement('iframe');
              a.height = 1;
              a.width = 1;
              a.style.position = 'absolute';
              a.style.top = 0;
              a.style.left = 0;
              a.style.border = 'none';
              a.style.visibility = 'hidden';
              document.body.appendChild(a);
              if ('loading' !== document.readyState) c();
              else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
              else {
                  var e = document.onreadystatechange || function() {};
                  document.onreadystatechange = function(b) {
                      e(b);
                      'loading' !== document.readyState && (document.onreadystatechange = e, c())
                  }
              }
          }
      })();
  </script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8ae5ec1cafafc914","version":"2024.7.0","serverTiming":{"name":{"cfL4":true}},"token":"6e2c2575ac8f44ed824cef7899ba8463","b":1}' crossorigin="anonymous"></script>