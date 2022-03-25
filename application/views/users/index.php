<ul class="nav justify-content-center bg-dark text-light">
  <li class="nav-item">
        <a class="nav-link text-white h4" href="<?php echo base_url();?>user">Codeigniter + Vue JS - AnthonCode<img src="<?php echo base_url();?>assets/img/civue.png" width="60" height="70"></a>
        <a class="nav-link text-white h5 text-center" href="http://facebook.com/anthoncode" target="_blank"><i class="fa fa-facebook-official"></i> AnthonCode</a>
  </li>
</ul>
  <div id="app">
   <div class="container">
    <div class="row">
        <transition
                enter-active-class="animated fadeInLeft"
                     leave-active-class="animated fadeOutRight">
                     <div class="notification is-success text-center px-5 top-middle" v-if="successMSG" @click="successMSG = false">{{successMSG}}</div>
            </transition>
        <div class="col-md-12">
           <table class="table bg-dark my-3">
               <tr>
                   <td> <button class="btn btn-default btn-block" @click="addModal= true">Nuevo</button></td>
                   <td><input placeholder="Search"type="search" class="form-control" v-model="search.text" @keyup="searchUser" name="search"></td>
               </tr>
           </table>
            <table class="table is-bordered is-hoverable">
               <thead class="text-white bg-dark" >
                
                <th class="text-white">ID</th>
                <th class="text-white">Nombre</th>
                <th class="text-white">Apellido</th>
                <th class="text-white">Email</th>
                <th class="text-white">Teléfono</th>
                <th class="text-white">Dirección</th>
                <th class="text-white">Sexo</th>
                <th colspan="2" class="text-center text-white">Acción</th>
                </thead>
                <tbody class="table-light">
                    <tr v-for="user in users" class="table-default">
                        <td>{{user.id}}</td>
                        <td>{{user.firstname}}</td>
                        <td>{{user.lastname}}</td>
                        <td>{{user.email}}</td>
                        <td>{{user.contact}}</td>
                        <td>{{user.address}}</td>
                        <td>
                        <img :src="imgGender(user.gender)"  width='50' height="50">
                        </td>
                        <td><button class="btn btn-info fa fa-edit" @click="editModal = true; selectUser(user)"></button></td>
                        <td><button class="btn btn-danger fa fa-trash" @click="deleteModal = true; selectUser(user)"></button></td>
                    </tr>
                    <tr v-if="emptyResult">
                      <td colspan="9" rowspan="4" class="text-center h1">No Record Found</td>
                  </tr>
                </tbody>
                
            </table>
            
        </div>
  
    </div>
     <pagination
        :current_page="currentPage"
        :row_count_page="rowCountPage"
         @page-update="pageUpdate"
         :total_users="totalUsers"
         :page_range="pageRange"
         >
      </pagination><br>

      <div class="row">
      <div class="col-sm-12">
        <a href="http://www.4avisos.com/sistema-de-ventas-en-php-mysql-ajax/" target="_blank">
          <img src="http://www.4avisos.com/wp-content/uploads/2018/09/sistema-de-venta-en-php.gif" alt="sitema de ventas -" width="500px" height="200px">
        </a>
        <a href="http://www.4avisos.com/sistema-gestion-escolar-lesson-en-codeigniter/" target="_blank">
          <img src="http://www.4avisos.com/wp-content/uploads/2018/08/sistema-de-gestion-escolar.gif" alt="sitema de gestion escolar" width="500px" height="200px">
        </a>
      </div>
    </div>
</div>
<?php include 'modal.php';?>

</div>

