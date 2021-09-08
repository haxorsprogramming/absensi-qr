
  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


      <div class="row">
        <div class="col-lg-6">

        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('message'); ?>


          <div class='box'>
            <div class='box-header'></div>
            <div class='box-body'>
              <?php
              $attributes = array('id' => 'button');
              echo form_open('scan/cek_id',$attributes);?>
              <div id="sourceSelectPanel" style="display:none">
                  <label for="sourceSelect">Change video source:</label>
                  <select id="sourceSelect" style="max-width:400px"></select>
              </div>
              <div>
                  <video id="video" width="500" height="375" style="border: 1px solid gray"></video>
              </div>
              <textarea hidden="" name="id_karyawan" id="result" readonly></textarea>
              <span>  <input type="submit"  id="button" class="btn btn-success btn-md" value="Cek Kehadiran"></span>
              <?php echo form_close();?>
            </div>
          </div>
          

        </div>
      </div>


  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script type="text/javascript" src="<?php echo base_url()?>assets/vendor/zxing/zxing.min.js"></script>
<script type="text/javascript">
window.addEventListener('load', function () {
    let selectedDeviceId;
    let audio = new Audio("assets/audio/beep.mp3");
    const codeReader = new ZXing.BrowserQRCodeReader()
    console.log('ZXing code reader initialized')
    codeReader.getVideoInputDevices()
    .then((videoInputDevices) => {
        const sourceSelect = document.getElementById('sourceSelect')
        selectedDeviceId = videoInputDevices[0].deviceId
        if (videoInputDevices.length >= 1) {
            videoInputDevices.forEach((element) => {
                const sourceOption = document.createElement('option')
                sourceOption.text = element.label
                sourceOption.value = element.deviceId
                sourceSelect.appendChild(sourceOption)
            })
            sourceSelect.onchange = () => {
                selectedDeviceId = sourceSelect.value;
            };
            const sourceSelectPanel = document.getElementById('sourceSelectPanel')
            sourceSelectPanel.style.display = 'block'
        }
        codeReader.decodeFromInputVideoDevice(selectedDeviceId, 'video').then((result) => {
            console.log(result)
            document.getElementById('result').textContent = result.text
            if(result != null){
                audio.play();
            }
            $('#button').submit();
        }).catch((err) => {
            console.error(err)
            document.getElementById('result').textContent = err
        })
        console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
    })
    .catch((err) => {
        console.error(err)
    })
})
</script>