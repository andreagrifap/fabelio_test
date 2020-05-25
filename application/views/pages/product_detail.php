<link rel="stylesheet" href="<?=base_url();?>assets/css/jquery.dataTables.min.css">
<style>
.img-roll{
  width:auto;
  height:450px;
}

@media(max-width:768px){
    .img-roll{
        width:auto;
        height:250px;
    }
}

.carousel-control-next-icon,
.carousel-control-prev-icon {
  filter: invert(1);
}
</style>
<div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="col">
            <div class="card-header border-0" style="padding:1.275rem 0rem">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Detail</h3>
                    </div>
                    <div class="col text-right">
                        <a href="<?=base_url('main/link_list');?>" class="btn btn-sm btn-primary">All Links <i class="fa fa-chevron-right"></i></a>
                    </div>
                    <hr style="margin:20px 0px;margin-bottom:0px">
                </div>
            </div>
        </div>

    <div class="row" style="padding:0px 20px">
        <div class="col-md-7 mb-5 mt-1">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php $i=0; foreach($imgs as $data){  ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?=$i;?>" class="<?php if($i==0){echo "active";}?>"></li>
            <?php $i++; } ?>
        </ol>
        <div class="carousel-inner" style="background-color:#212F3D">
            <?php $i=0; foreach($imgs as $data){  ?>
                <div class="carousel-item <?php if($i==0){echo "active";}?>">
                    <center><img src="<?=$data->img_url;?>" class="img-roll" alt="..."></center>
                </div>
            <?php $i++; } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <h2><?=$item->name;?></h2>
                <hr>
            </div>
            <div class="form-group">
                <label><b>Description</b></label>
                <p><?=$item->description;?></p>
            </div>
            <div class="form-group">
                <label><b>Latest Price</b></label>
                <p style="font-size:25px">Rp <?=number_format($item->price,0,",",".");?>,-</p>
            </div>

            <div class="form-group">
            <label><b>Price History</b></label>
                <div class="table-responsive mb-5">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sort">No.</th>
                        <th scope="col" class="sort">Price</th>
                        <th scope="col" class="sort">Date</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                        <?php $i=0; foreach($priceHistory as $priceData){ $i++; ?>
                            <tr>
                            <td>
                                <?=$i;?>
                            </td>
                            <td>
                                Rp <?=number_format($priceData->price,0,",",".");?>,
                            </td>
                            <td>
                                <?=date_format(date_create($priceData->created_at),"d F Y (H:i)");?>
                            </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>

        </div>
    </div>

      </div>
    </div>
</div>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function(){
    $(".table").DataTable({
        "lengthMenu" : [[5,10,25,50,-1],[5,10,25,50,"All"]]
    });
});
</script>