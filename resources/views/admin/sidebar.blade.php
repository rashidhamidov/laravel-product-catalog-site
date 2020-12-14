@section('sidebar')
<!--sidebar-menu-->

<!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
          <!-- Sidebar scroll-->
          <div class="scroll-sidebar">
              <!-- Sidebar navigation-->
              <nav class="sidebar-nav">
                  <ul id="sidebarnav" class="p-t-30">
                      <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Ana Sayfa</span></a></li>
                      <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-folder-open"></i><span class="hide-menu">Kategori Yönetimi </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="/admin/kategori_ekleme" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Kategori Ekle </span></a></li>
                            <li class="sidebar-item"><a href="/admin/kategori_listesi" class="sidebar-link"><i class="fas fa-folder-open"></i><span class="hide-menu">Tüm Kategoriler </span></a></li>

                        </ul>
                    </li>
                      <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                                   href="javascript:void(0)" aria-expanded="false"><i class="far
                                                   fa-object-group"></i><span class="hide-menu">Ürün Yönetimi
                              </span></a>
                          <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="/admin/icerik_ekleme" class="sidebar-link"><i class="far fa-plus-square"></i><span class="hide-menu"> Ürün Ekleme </span></a></li>
                              <li class="sidebar-item"><a href="/admin/icerik_listesi" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Ürün Listesi </span></a></li>

                          </ul>
                      </li>
                      <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-handshake"></i><span class="hide-menu">Referans Yönetimi </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">

                            <li class="sidebar-item"><a href="/admin/referans_ekleme" class="sidebar-link"><i class="far fa-plus-square"></i><span class="hide-menu"> Referans Ekleme </span></a></li>
                            <li class="sidebar-item"><a href="/admin/referans_listesi" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Referans Listesi </span></a></li>
                        </ul>
                    </li>
                    <?php
                       $sayfalar= DB::select('select *from sayfa ');
                     ?>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class=" far fa-clone"></i><span class="hide-menu">Kurumsal Sayfalar </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="/admin/kurumsal_ekleme" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Yeni Oluştur </span></a></li>
                            @foreach ($sayfalar as $rs)
                            <li class="sidebar-item"><a href="/admin/kurumsal_duzenle/{{$rs->id}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> {{$rs->title}} </span></a></li>
                            @endforeach
                            <li class="sidebar-item"><a href="/admin/kurumsal_listesi" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Kurumsal Listesi </span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/galery_listesi" aria-expanded="false"><i class="fas fa-images"></i><span class="hide-menu">Galeri</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/slider_listesi" aria-expanded="false"><i class="fas fa-images"></i><span class="hide-menu">Slider</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/video_listesi" aria-expanded="false"><i class="far fa-play-circle"></i><span class="hide-menu">Video</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i></i><span class="hide-menu">Ayarlar </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="/admin/ayar_duzenle" class="sidebar-link"><i class="fas fa-edit"></i><span class="hide-menu"> Site ayarları </span></a></li>

                        <li class="sidebar-item"><a href="/admin/user_duzenle/{{ Auth::user()->id }}" class="sidebar-link"><i class="fab fa-expeditedssl"></i><span class="hide-menu"> Hesap ayarları </span></a></li>
                        <li class="sidebar-item"><a href="/changePassword" class="sidebar-link"><i class="fas fa-key"></i><span class="hide-menu"> Şifre değiştir </span></a></li>
                            <li class="sidebar-item"><a href="/admin/yonetici_ekleme" class="sidebar-link"><i class="fas fa-user-plus"></i><span class="hide-menu"> Yönetici ekle </span></a></li>
                        </ul>
                    </li>
                  </ul>
              </nav>
              <style>
                  .sidebar-nav ul li{
                  }
                  .sidebar-nav ul li a{
                      color:#fff!important;
                  }

                  .sidebar-nav ul li ul li{
                      background-color: black!important;
                  }
                  .sidebar-nav i{
                      color: rgb(255, 186, 74)!important;
                  }
                  .sidebar-nav ul li ul i{
                      color: rgb(77, 212, 253)!important;
                  }
                  .btn{
                      margin-bottom:5px;
                  }


                  </style>
              <!-- End Sidebar navigation -->
          </div>
          <!-- End Sidebar scroll-->
      </aside>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
@endsection
