
const formFilter = document.querySelector('#filter-form');
let category = query.get('category');
let totalItems = 0;
let perPage = 5; 
let currentPage = 1;
let datas;

getDataByFilter('');

let jsonData = {};
formFilter.addEventListener('submit', (e) => {
  e.preventDefault();
  const formData = new FormData(formFilter);
  const filteredFormData = new FormData();

  // Lặp qua các cặp key-value trong formData
  for (const [key, value] of formData) {
    // Kiểm tra nếu value không phải là chuỗi rỗng và thêm vào filteredFormData
    if (value !== '') {
      filteredFormData.append(key, value);
    }
  }

  // Tạo query từ filteredFormData
  const query = new URLSearchParams(filteredFormData);

  // Gọi hàm để lấy dữ liệu theo bộ lọc
  getDataByFilter(query.toString());
});

function getDataByFilter(req) {
  fetch(`${webRoot}/clientproducts/filter?${req}`, {
    method: 'get'
  })
    .then(response => response.json())
    .then(responseDatas => {

      datas = responseDatas;
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

  totalItems = datas.length;
  if(totalItems === 0) {
    productsWrapper.innerHTML = '<h4 class="text-danger p-3 text-center">Không tìm thấy sản phẩm</h4>';
    return;
  }
  let totalPages = calculateTotalPages(totalItems, perPage);

  // Hiển thị sản phẩm cho trang hiện tại
  let startIndex = (currentPage - 1) * perPage;
  let endIndex = startIndex + perPage;
  let currentProducts = datas.slice(startIndex, endIndex);

  currentProducts.forEach((data) => {
    template += viewsProducts(data);
  });

  renderPaginationButtons(totalPages, currentPage);

  productsWrapper.innerHTML = template;
}

function onPageButtonClick(page) {
  currentPage = page;
  loadProducts(datas);
}

const paginationElement = document.getElementById('pagination');

function renderPaginationButtons(totalPages, currentPage) {
    paginationElement.innerHTML = '';

    paginationElement.appendChild(createPaginationButton(currentPage - 1, 'Trước', currentPage === 1));

    for (let i = 1; i <= totalPages; i++) {
        paginationElement.appendChild(createPaginationButton(i, i, i === currentPage));
    }

    paginationElement.appendChild(createPaginationButton(currentPage + 1, 'Kế tiếp', currentPage === totalPages));
}

function createPaginationButton(page, text, isActive = false) {
  const li = document.createElement('li');
  li.className = `page-item${isActive ? ' active' : ''}`;
  
  const a = document.createElement('a');
  a.className = 'page-link';
  a.href = '#';
  a.textContent = text;
  a.addEventListener('click', () => onPageButtonClick(page));

  li.appendChild(a);
  return li;
}

function removeHtmlTags(input) {
  var doc = new DOMParser().parseFromString(input, 'text/html');
  return doc.body.textContent || "";
}

function calculateTotalPages(totalItems, itemsPerPage) {
  return Math.ceil(totalItems / itemsPerPage);
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