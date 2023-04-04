@extends('main')

@section('isi')

<div class="content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ">
        <h1 class="mx-auto my-auto h3 mr-lg-auto mb-0 text-gray-800">Scan Absensi</h1>
    </div> 
    <div class="card-body">
        <div id="reader" class="card bg-white shadow rounded-3 p-3 border-0 w-50 h-50 mx-auto my-auto">
            <input type="hidden" name="id_pengurus" id="id_pengurus">
        </div>
    </div>
</div>


<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>


// Kirim Hasil Scanner
 function onScanSuccess(decodedText, decodedResult) {
                // alert(decodedText);
                $('#id_pengurus').val(decodedText);
                let id = decodedText;                
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                html5QrcodeScanner.clear().then(_ => {
                    $.ajax({
                        
                        url: "{{ route('scan_ulang') }}",
                        type: 'POST',            
                        data: {
                            _methode : "POST",
                            _token: "{{ csrf_token() }}", 
                            qr_code : id
                        },            
                        success: function (response) { 
                            console.log(response);
                            if(response.status == 200){
                                alert(response.message);
                            }
                            else if (response.status == 500){
                                alert(response.message);
                            }
                            else {
                                alert(response.message);
                            }
                            setTimeout(function(){
                                    window.location.reload(1);
                            }, 0000);
                        }
                    });   
                }).catch(error => {
                    alert('something wrong');
                });
                
            }

 
            function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
                // console.warn(`Code scan error = ${error}`);
            }
 
            let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader",
            { fps: 10, qrbox: {width: 270, height: 250} },
            /* verbose= */ false);
            html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        
</script>


@endsection