<script type="text/javascript" src="<?php echo base_url();?>assets_home/material/js/jquery-3.2.1.min.js"></script>
<section id="contact" style="background-image:url('<?php echo base_url();?>assets_home/material/img/C360_2018-11-07-19-58-32-673.jpg');">
    <div class="rgba-black-strong py-5">
        <div class="container">
            <div class="wow fadeIn">
                <h2 class="h1 text-white pt-5 pb-3 text-center">Penelusuran Permohonan</h2>
                <!-- <p class="text-white px-5 mb-5 pb-3 lead text-center">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate
                    esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam.
                </p> -->
            </div>

            <div id="form_application" class="card mb-5 wow fadeInUp" data-wow-delay=".4s">
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">

                            <div class="col-md-12">
                                    <div class="md-form">
                                        <input class="form-control" id="f_kode_token" type="text"/>
                                        <label for="name">Masukkan Kode Token </label>
                                    </div>
                                </div>

                            </div>
                            <div class="center-on-small-only mb-4">
                                <button class="btn btn-indigo ml-0 pull-right" id="btn_search" type="submit"><i class="fa fa-search mr-2"></i> Pencarian</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div id="search_application" class="card mb-5 wow fadeInUp" data-wow-delay=".4s">

            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function()
    {
        $("#btn_search").click(function()
        {
            var token = $("#f_kode_token").val();
            if (token.length <= 0) {
                toastr.error('Tidak bisa melanjutkan proses pencarian, harap isi token terlebih dahulu')   
            }
            else
            {
                $.ajax({
                    url :"<?php echo site_url();?>home/search_request/"+token,
                    type:"post",
                    beforeSend:function(){
                        $(".progress_load").modal('show');
                        $("#search_application").html('');
                    },
                    success:function(msg){
                        $(".progress_load").modal('hide');                                                
                        $("#search_application").html(msg);
                    },
                    error:function(jqXHR,exception)
                    {
                        ajax_catch(jqXHR,exception);					
                    }
                })
            }
        })
    });    
</script>