<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
  <div class="container">
  
  <div class="row">
    <aside class="col-md-3">
      <nav class="list-group">
          <a class="list-group-item active" href="ca-nhan"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tổng quan về tài khoản </font></font></a>
          <a class="list-group-item" href="dia-chi"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Địa chỉ của tôi</font></font></a>
          <a class="list-group-item" href="don-hang"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đơn hàng của tôi</font></font></a>
          <a class="list-group-item" href="yeu-thich"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sản phẩm yêu thích</font></font></a>
          <a class="list-group-item" href="cai-dat"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cài đặt</font></font></a>
          <a class="list-group-item" href="cai-dat"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đăng xuất</font></font></a>
        </nav>
		</aside> 
    <main class="col-md-9">
  
      <article class="card">
        <div class="card-body">
  
      <div class="row wishlist">
        @if($data !== null)
          @foreach($data as $key)
            <div class="col-md-6">
              <figure class="itemside mb-4">
                <div class="aside"><img src="<?= _WEB_ROOT; ?>{{$key['slug']}}" class="border img-md"></div>
                <figcaption class="info">
                  <a href="#" class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$key['book_name']}}</font></font></a>
                  <p class="price mb-2">{{number_format($key['price'])}} đ</p>
                  <a href="#" class="btn btn-secondary btn-sm" id="{{$key['book_id']}}" onclick="sendCartData(event)"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thêm vào giỏ hàng</font></font></a>
                  <a href="#"  id="{{$key['id']}}" onclick="confirmDeleteWishList(event)" class="btn btn-danger btn-sm" data-toggle="tooltip" title="" data-original-title="Xóa sản phẩm khỏi yêu thích"> <i class="fa fa-times"></i> </a>
                </figcaption>
              </figure>
            </div> <!-- col.// -->
          @endforeach
        @else
          <div class="col-md-12 alert alert-warning" role="alert">
            Dữ liệu trống. Vui lòng thêm dữ liệu vào.
          </div>
        @endif
        </div> <!-- row .//  -->
  
        </div> <!-- card-body.// -->
      </article>
  
  
    </main> <!-- col.// -->
  </div>
  
  </div> <!-- container .//  -->
</section>