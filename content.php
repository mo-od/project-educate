<style> .containers {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    background-color: #060606;
}
        hr.new1 {
           border-top: 1px solid red;
              }
    </style>
    <?php
      include_once("config/connectdb.php");
      $sql= "SELECT * FROM contact WHERE status = 1";
      $result = mysqli_query($conn, $sql);
      $data = mysqli_fetch_array($result);
       ?>
      <div class="container containers  ">
      <div class="card-header"><h5><b><font color="#f99910">ข้อมูลข่าวสาร</font></b><h1></div>
      <hr class="new1">
      <div class="card-body">
        <h5><?php echo $data['topic'];?></h5>
        <p class="card-text"><?php echo $data['description'];?></p>
      </div>
    </div>


<section id="projects" class="projects-section mt-4 mb-5">
    <div class="container">
    <!-- Project Two Row -->
      <div class="row justify-content-center no-gutters shadow-lg">
        <div class="col-lg-6">
          <img class="img-fluid shadow-lg" href="store.php" src="http://cdn.dota2.com/apps/dota2/images/blogfiles/blg_zim_trove2017ti.jpg" alt="">
        </div>
        <div class="col-lg-6 order-lg-first">
          <div class="background-color:#060606db text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-right">
                <h4 class="">DOTA2</h4>
                <p class="mb-0 ">จำหน่ายไอเทมเกม Dot2 ราคาถูก จัดส่งสินค้ารวดเร็วได้ทันใจ</p>
                <hr class="d-none d-lg-block mb-0 mr-0">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Project One Row -->
      <div class="row justify-content-center no-gutters mb-5 mb-lg-0 shadow-lg">
        <div class="col-lg-6">
          <img class="img-fluid shadow-lg" src="img/steam.jpg" alt="">
        </div>
        <div class="col-lg-6">
          <div class="background-color:#060606db text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-left">
                <h4 class="">STEAM</h4>
                <p class="mb-0 ">บริการจำหน่ายไอเทมเกมใน Steam ราคาถูก</p>
                <hr class="d-none d-lg-block mb-0 ml-0">
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
<style>
.projects-section .featured-text {
  padding: 2rem;
}

@media (min-width: 992px) {
  .projects-section .featured-text {
    padding: 0 0 0 2rem;
    border-left: 0.5rem solid #64a19d;
  }
}

.projects-section .project-text {
  padding: 3rem;
  font-size: 90%;
}

@media (min-width: 992px) {
  .projects-section .project-text {
    padding: 5rem;
  }
  .projects-section .project-text hr {
    border-color: #64a19d;
    border-width: .25rem;
    width: 30%;
  }
}
</style>