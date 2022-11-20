</div>
<footer style="background-color: #deded5;">
      <div class="container p-4">
        <div class="row">
          <div class="col-lg-6 col-md-12 mb-4">
            <h5 class="mb-3" style="letter-spacing: 2px; color: #818963;">Lokasi</h5>
            <p>
              Jl. Pandean Lamper III No.6, Peterongan, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50242
            </p>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <h5 class="mb-3" style="letter-spacing: 2px; color: #818963;">Kontak Kami</h5>
            <ul class="list-unstyled mb-0">
              <li class="mb-1">
                (024)8313468
              </li>
              <li class="mb-1">
                (024)8412206
              </li>
              <li class="mb-1">
                <a href="https://api.whatsapp.com/send?phone=62811271723" style="color: #4f4f4f;">0811271723</a>
              </li>
              <li>
                <a href="https://api.whatsapp.com/send?phone=628122878169" style="color: #4f4f4f;">08122878169</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <h5 class="mb-1" style="letter-spacing: 2px; color: #818963;">Kantor Buka</h5>
            <table class="table" style="color: #4f4f4f; border-color: #666;">
              <tbody>
                <tr>
                  <td>Senin - Jumat:</td>
                  <td>08:00 - 16:00</td>
                </tr>
                <tr>
                  <td>Sabtu:</td>
                  <td>08:00 - 13:00</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
      </div>
      <!-- Copyright -->
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>



</body>
<script>
$(document).ready(function(){
   $('#btn_submit').click(function(){
     var file_val = $('#gambar').val();
     if(file_val == ""){
     alert("Please select file.");
     return false;
     }
   });
  $("#hideAdd").click(function(){
    var tombol = document.getElementById("addEdit");
    document.getElementById("gambar2").value = '';
    if (tombol.style.display != "none") {
      tombol.style.display = "none";
      document.getElementById("addEditTombol").style.display = 'block';
    }
  });
  $("#hide").click(function(){
    var tombol = document.getElementById("addEdit");
    document.getElementById("frame2").src = '';
    document.getElementById("gambar2").value = '';
    if (tombol.style.display != "none") {
      tombol.style.display = "none";
      document.getElementById("addEditTombol").style.display = 'block';
    }
  });
  $('.tambahGambar').on('click', '.delete_', function() {
    $(this).parents('p').remove();
    var tombol = document.getElementById("add");
    var frame = document.getElementById("frame2");
    if (tombol.style.display === "none") {
      tombol.style.display = "block";
    }
  });
   
});


</script>
</html>