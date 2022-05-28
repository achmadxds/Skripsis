function dosbing1(el) {
  var dosbing1 = el.value;
  var daftarid = $("#id").val();
  console.log(daftarid);

  var pilih = "Pilih Dosen 2";
  $.ajax({
    url: base_url + "secure/bimbingan/tampil",
    method: "POST",
    data: { dosbing1: dosbing1 },
    async: false,
    dataType: "json",
    success: function (data) {
      console.log(data);
      var i;
      var html = "<option disabled selected>" + pilih + "</option>";
      for (i = 0; i < data.length; i++) {
        html += "<option value=" + data[i].DosenId + ">" + data[i].DosenNama + "</option>";
      }
      $("#dosbing2_" + daftarid).html(html);
    }
  });
}