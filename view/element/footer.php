<section>
        <!-- Remove the container if you want to extend the Footer to full width. -->
<div class="container my-5">

    <!-- Footer -->
    <footer
            class="text-center text-lg-start text-white"
            style="background-color: #fff"
            >
      <!-- Section: Social media -->
      <section
               class="d-flex justify-content-between p-4 text-dark"
               style="background-color: #fff"
               >
        <!-- Left -->
        <div class="me-5">
          <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->
  
        <!-- Right -->
        <div>
          <a href="" class=" me-4 text-decoration-none text-dark">
            <i class="bi bi-facebook"></i>
          </a>
          <a href="" class=" me-4 text-decoration-none text-dark">
            <i class="bi bi-twitter"></i>
          </a>
          <a href="" class=" me-4 text-decoration-none text-dark">
            <i class="bi bi-google"></i>
          </a>
          <a href="" class=" me-4 text-decoration-none text-dark">
            <i class="bi bi-instagram"></i>
          </a>
          <a href="" class=" me-4 text-decoration-none text-dark">
            <i class="bi bi-github"></i>
          </a>
        </div>
        <!-- Right -->
      </section>
      <!-- Section: Social media -->
  
      <!-- Section: Links  -->
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-6 col-lg-6 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold text-dark">Ogani</h6>
              <hr
                  class="mb-4 mt-0 d-inline-block mx-auto"
                  style="width: 60px; background-color: #000; height: 2px"
                  />
              <p class="text-dark fw-normal">
                Công ty Thực phẩm Organic là một trong những đơn vị hàng đầu trong lĩnh vực sản xuất và cung cấp thực phẩm hữu cơ. Chúng tôi cam kết mang đến cho khách hàng những sản phẩm chất lượng cao, được sản xuất từ nguồn nguyên liệu tự nhiên và không chứa các hóa chất độc hại.
              </p>
            </div>
            <!-- Grid column -->
  
            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold text-dark">Products</h6>
              <hr
                  class="mb-4 mt-0 d-inline-block mx-auto"
                  style="width: 60px; background-color: #000; height: 2px"
                  />
              <p>
                <a href="#!" class="text-dark text-decoration-none fw-normal">Rau xanh</a>
              </p>
              <p>
                <a href="#!" class="text-dark text-decoration-none fw-normal">Thịt</a>
              </p>
              <p>
                <a href="#!" class="text-dark text-decoration-none fw-normal">Trứng</a>
              </p>
              <p>
                <a href="#!" class="text-dark text-decoration-none fw-normal">Thực phẩm xanh</a>
              </p>
            </div>
            <!-- Grid column -->
  
            <!-- Grid column -->
            <!-- Grid column -->
  
            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold text-dark">Contact</h6>
              <hr
                  class="mb-4 mt-0 d-inline-block mx-auto"
                  style="width: 60px; background-color: #000; height: 2px"
                  />
              <p class="text-dark fw-normal"> Minh Đạo, Tiên Du, Bắc Ninh</p>
              <p class="text-dark fw-normal"> vanthuc08888@gmail.com</p>
              <p class="text-dark fw-normal"> (+84)76049347</p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->
  
      <!-- Copyright -->
      <div
           class="text-center p-3"
           style="background-color: rgba(0, 0, 0, 0.2)"
           >
        © 2020 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/"
           >MDBootstrap.com</a
          >
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  
  </div>
  <!-- End of .container -->
</section>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

<script>
    const imgPosition = document.querySelectorAll(".img-slider img")
    const numOfimg = imgPosition.length;
    let index = 0;
    var myArray = Array.from(imgPosition);
    imgPosition.forEach(function(img, index)
    {
        img.classList.add("d-none");
    })
    function slider()
    {
        if(index >= numOfimg) index =0;
        imgPosition[index].classList.remove("d-none");
        if(index >=1 && index <numOfimg)
        {
            imgPosition[index-1].classList.add("d-none");
        }
        if(index == 0)
        {
            imgPosition[numOfimg-1].classList.add("d-none");
        }
        console.log(index);
        index++;
    }
    slider();
    setInterval(slider,6000);
</script>
<script>
    const featured_items = document.querySelectorAll(".featured-item");
    for (const featured_item of featured_items)
    {
        featured_item.addEventListener('click',function()
        {
            featured_items.forEach(function(featured_item)
        {
            featured_item.classList.remove('active');
        })
        featured_item.classList.add('active');
        })
    }
    const department_items = document.querySelectorAll(".heading-department");
    const department_menu = department_items[0].getElementsByClassName("menu");
    department_items[0].addEventListener('click',function()
    {
        if(department_menu[0].classList.contains("active"))
        {
            department_menu[0].classList.remove("active")
        }else
        {
            department_menu[0].classList.add("active")
        }
    })
</script>
<script>
    let items = document.querySelectorAll('.carousel .carousel-item')
    items.forEach((el) => {
        const minPerSlide = 4
        let next = el.nextElementSibling
        for (var i=1; i<minPerSlide; i++) {
            if (!next) {
                // wrap carousel by using first child
              next = items[0]
            }
            let cloneChild = next.cloneNode(true)
            el.appendChild(cloneChild.children[0])
            next = next.nextElementSibling
        }
})
</script>
</html>