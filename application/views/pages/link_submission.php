<div class="row">
    <div class="col-md-6 offset-md-3 mb-9">
        <div class="card">
            <!-- Card header -->
            <div class="col">
                <div class="card-header border-0" style="padding:1.275rem 0rem">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Submission Form</h3>
                        </div>
                        <div class="col text-right">
                            <a href="<?=base_url('main/link_list');?>" class="btn btn-sm btn-primary">All Links <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Light table -->
            <div class="col-md-12 " style="padding-top:0px">
                <hr style="margin:20px 0px;margin-top:0px">
                <div id="alertContainer" class="alert alert-danger alert-dismissible fade show" role="alert" style="display:none">
                    <span class="alert-text" style="font-size:15px">
                        <i class="fa fa-exclamation-circle fa-fw"></i> 
                        <span id="alertText"></span>
                    </span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="form-group">
                    <label>Product Page Link</label>
                    <input id="urlInput" name="url_input" type="text" class="form-control" placeholder="e.g https://fabelio.com/ip/kursi-kantor-dorian-black.html" required>
                    <p style="font-size:12px"><em>Note : The url must be a <b>Fabelio</b> product page link</em></p>
                </div>
                <div class="form-group">
                    <center>
                        <input type="text" hidden>
                        <button id="btnSubmit" type="button" onclick="submitUrl(this)"  class="btn btn-success">
                            <span id="loaderText" style="display:none"><i class="fa fa-spinner fa-pulse"></i> Submitting Link</span>
                            <span id="submitText">Submit</span>
                        </submit>
                    </center>
                </div>
             </div>
        </div>
    </div>
</div>

<script>
var state = "";
var tokenName = "<?=$this->security->get_csrf_token_name();?>";
var token = "<?=$this->security->get_csrf_hash();?>";

$("#urlInput").keypress(function(event){
   var key = (event.keyCode ? event.keyCode : event.which);
   if(key == "13"){
      $("#btnSubmit").click();
   }
});

function submitUrl(elm){
    var urlInput = $("#urlInput").val();

    if(urlInput.trim()==""){
        $("#alertContainer").show();
        $("#alertText").html("Product page url input can not be empty");

    }else{
        disableBtnUrl(elm);    
        dataJson = {
            [tokenName] : token,
            url : urlInput
        }

        $.ajax({
            url : "<?=base_url('api/product/submit_link');?>",
            type : "POST",
            data : dataJson,
            dataType : "json",
            success : function(data){
                enableBtnUrl(elm);

                if(data.status=="failed"){
                    tokenName = data.tokenName;
                    token = data.tokenHash;
                    $("#alertContainer").show();
                    $("#alertText").html(data.message);
                }else{
                   window.location.href = "<?=base_url('main/detail/');?>" + data.productSlug;
                }
            }
        });

    }
}

function disableBtnUrl(elm){
    $(elm).attr("disabled",true);
    $("#loaderText").show();
    $("#submitText").hide();
}

function enableBtnUrl(elm){
    $(elm).attr("disabled",false);
    $("#loaderText").hide();
    $("#submitText").show();
}
</script>