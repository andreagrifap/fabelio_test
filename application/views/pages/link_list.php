<style>
.img_table{
  max-width:100px;
  max-height:50px;
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
                        <h3 class="mb-0">All Links</h3>
                    </div>
                    <div class="col text-right">
                    <a href="<?=base_url('main/link_submission');?>" class="btn btn-sm btn-primary"><i class="fa fa-plus fa-fw"></i> Add New Product Link</a>
                    </div>
                    <hr style="margin:20px 0px;margin-bottom:0px">
                </div>
            </div>
        </div>

        <!-- Light table -->
        <div class="table-responsive mb-4">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort">Item</th>
                    <th scope="col" class="sort">Img</th>
                    <th scope="col" class="sort">Description</th>
                    <th scope="col" class="sort">Latest Price</th>
                    <th scope="col" class="sort">Added Date</th>
                    <th scope="col" class="sort">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                  <?php foreach($product->result() as $dat){ ?>
                  <tr>
                    <td>
                        <a href="<?=base_url('main/detail/'.$dat->slug);?>"><?=$dat->name;?></a>
                    </td>
                    <td>
                        <img src="<?=$dat->img_url;?>" class="img_table">
                    </td>
                    <td >
                        <?=substr($dat->description,0,50);?>...
                    </td>
                    <td>
                        <b>Rp <?=number_format($dat->price,0,",",".");?>,-</b>
                    </td>
                    <td>
                        <?=date_format(date_create($dat->created_at),"d F Y (H:i)");?>
                    </td>
                    <td>
                      <a href="<?=base_url('main/detail/'.$dat->slug);?>" class="btn btn-sm btn-info">Detail</a>
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" onclick="return confirm('Are you sure to delete this product link?')" href="<?=base_url('main/remove/'.$dat->id);?>">Remove</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
        </div>
      </div>
    </div>
</div>
