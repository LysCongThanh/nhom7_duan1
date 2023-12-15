
const formFilter = document.querySelector('#filter-form');
getDataByFilter('');
let jsonData = {};
formFilter.addEventListener('submit', (e) => {
  e.preventDefault();
  const formData = new FormData(formFilter);
  formData.forEach((data, key) => {
    jsonData[key] = data;
  });

  const query = new URLSearchParams(jsonData);
  
  getDataByFilter(query.toString());

});

function getDataByFilter(req) {
  fetch(`${webRoot}/clientproducts/filter?${req}`, {
    method: 'get'
  })
    .then(response => response.json())
    .then(datas => {

      loadProducts(datas);

    })
    .catch(error => {
      // Xử lý lỗi nếu có
      console.error(error);
    });
}

const loadProducts = (datas) => {
  const productsWrapper = document.querySelector('.card-product-list');
  let template = '';
  productsWrapper.innerHTML = '';

  datas.forEach((data) => {
    template += viewsProducts(data);
  });

  productsWrapper.innerHTML = template;
}

const viewsProducts = (data) => {
  return `
  <div class="row no-gutters my-2">
  <aside class="col-md-3">
    <a href="#" class="img-wrap">
      <span class="badge badge-danger">
        <font style="vertical-align: inherit;">
          <font style="vertical-align: inherit;">MỚI</font>
        </font>
      </span>
      <img src="<?= _WEB_ROOT ?>/${data.images}">
    </a>
  </aside> <!-- col.// -->
  <div class="col-md-6">
    <div class="info-main">
      <a href="#" class="h5 title">
        <font style="vertical-align: inherit;">
          <font style="vertical-align: inherit;">${data.book_name}</font>
        </font>
      </a>
      <div class="rating-wrap mb-2">
        <ul class="rating-stars">
          <li style="width:100%" class="stars-active">
            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </li>
          <li>
            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </li>
        </ul>
        <div class="label-rating">5/5</div>
      </div> <!-- rating-wrap.// -->
  
      <p class="mb-3">
        <span class="tag"> <i class="fa fa-check"></i>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Đã xác minh</font>
          </font>
        </span>
        <span class="tag">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">5 năm</font>
          </font>
        </span>
        <span class="tag">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">${data.ratings} đánh giá</font>
          </font>
        </span>
        <span class="tag">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">${data.categorie}</font>
          </font>
        </span>
      </p>
  
      <p>
        <font style="vertical-align: inherit;">
          <font style="vertical-align: inherit;">${removeHtmlTags(data.describe_short)}</font>
        </font>
      </p>
  
    </div> <!-- info-main.// -->
  </div> <!-- col.// -->
  <aside class="col-sm-3">
    <div class="info-aside">
      <div class="price-wrap">
        <span class="h5 price">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">${data.price} đ</font>
          </font>
        </span>
        <small class="text-muted">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">/ 1 cuốn</font>
          </font>
        </small>
      </div> <!-- price-wrap.// -->
      <small class="text-warning">
        <font style="vertical-align: inherit;">
          <font style="vertical-align: inherit;">Miễn phí vận chuyển</font>
        </font>
      </small>
  
      <p class="text-muted mt-3">
        <font style="vertical-align: inherit;">
          <font style="vertical-align: inherit;">${data.categorie}</font>
        </font>
      </p>
      <p class="mt-3">
        <a href="#" class="btn btn-outline-primary" id="${data.id}" onclick="sendCartData(event)"><i class="fa fa-shopping-cart"></i>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;"> Thêm vào giỏ hàng</font>
          </font>
        </a>
        <!-- <a href="#" class="btn btn-light mt-2"><i class="fa fa-heart" id="{{$column['id']}}" onclick="sendData(event)"></i>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;"> Thêm vào yêu thích</font>
          </font>
        </a> -->
        <a data-original-title="Save to Wishlist" title="" href="#" class="btn btn-light" data-toggle="tooltip" onclick="sendData(event)" id="{{$column['id']}}"><i class="fa fa-heart"></i></a>
      </p>
  
  
    </div> <!-- info-aside.// -->
  </aside> <!-- col.// -->
  </div> <!-- row.// --> 
  `;
}

function removeHtmlTags(input) {
  var doc = new DOMParser().parseFromString(input, 'text/html');
  return doc.body.textContent || "";
}