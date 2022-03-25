<!--agregar modal-->
<modal v-if="addModal" @close="clearAll()">

<h3 slot="head" >Agregar usuario</h3>
<div slot="body" class="row">
    <div class="col-md-6">
          <div class="form-group">
    <label>Nombre</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.firstname}" name="firstname" v-model="newUser.firstname">
            
             <div class="has-text-danger" v-html="formValidate.firstname"> </div>
            </div>
         <div class="form-group"> 
    <label>Apellido</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.lastname}" name="lastname" v-model="newUser.lastname">
            
             <div class="has-text-danger" v-html="formValidate.lastname"> </div>
</div>
            <div class="form-group">
     <label for="">Sexo</label><br>
    <div class="btn-group">
        <button class="btn btn-outline-dark fa fa-mars" :class="{'active':(newUser.gender == 'boy')}" @click.prevent="pickGender('boy')"> Masculino</button>
  <button class="btn btn-outline-dark fa fa-venus" :class="{'active': (newUser.gender == 'girl')}" @click.prevent="pickGender('girl')"> Femenino</button>
    </div>
   <div  class="has-text-danger"v-html="formValidate.gender"></div>
    </div>
    <div class="form-group">
       <label>Cumpleaños</label>
        <input type="date" class="form-control" :class="{'is-invalid': formValidate.birthday}" name="birthday" v-model="newUser.birthday">
        <div class="has-text-danger" v-html="formValidate.birthday"> </div>
    </div>
    </div>
    <div class="col-md-6">
  <div class="form-group">
           <label>Email</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.email}" name="email" v-model="newUser.email">
                <div class="has-text-danger" v-html="formValidate.email"></div>
        </div>
        <div class="form-group">
           <label>Contacto</label>
            <input type="text" class="form-control":class="{'is-invalid': formValidate.contact}" name="contact" v-model="newUser.contact">
             <div class="has-text-danger" v-html="formValidate.contact"> </div>
        </div>
        <div class="form-group">
            <label>Dirección</label>
            <textarea cols="35" rows="5" :class="{'is-invalid': formValidate.address}" name="address" v-model="newUser.address" class="form-control"></textarea>
            <div class="has-text-danger" v-html="formValidate.address"> </div>
        </div>
    </div>
</div>
<div slot="foot">
    <button class="btn btn-dark" @click="addUser">Agregar</button>
</div>

</modal>



<!--actualizar modal-->

<modal v-if="editModal" @close="clearAll()">
<h3 slot="head" >Editar Usuario</h3>
<div slot="body" class="row">
    <div class="col-md-6">
          <div class="form-group">
       
    <label>Nombre</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.firstname}" name="firstname" v-model="chooseUser.firstname">
            
             <div class="has-text-danger" v-html="formValidate.firstname"> </div>
</div>
         <div class="form-group">
       
    <label>Apellido</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.lastname}" name="lastname" v-model="chooseUser.lastname">
            
             <div class="has-text-danger" v-html="formValidate.lastname"> </div>
</div>
     
            <div class="form-group">
     <label for="">Sexo</label><br>
    <div class="btn-group">
        <button class="btn btn-outline-dark fa fa-mars" :class="{'active':(chooseUser.gender == 'boy')}" @click="changeGender('boy')"> Masculino</button>
  <button class="btn btn-outline-dark fa fa-venus" :class="{'active': (chooseUser.gender == 'girl')}" @click="changeGender('girl')"> Femenino</button>
    </div>
   <div  class="has-text-danger"v-html="formValidate.gender"></div>
    </div>
    <div class="form-group">
       <label>Cumpleaños</label>
        <input type="date" class="form-control" :class="{'is-invalid': formValidate.birthday}" name="birthday" v-model="chooseUser.birthday">
        <div class="has-text-danger" v-html="formValidate.birthday"> </div>
    </div>
    </div>
    <div class="col-md-6">
  <div class="form-group">
           <label>Email</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.email}" name="email" v-model="chooseUser.email">
                <div class="has-text-danger" v-html="formValidate.email"></div>
        </div>
        <div class="form-group">
           <label>Contacto</label>
            <input type="text" class="form-control":class="{'is-invalid': formValidate.contact}" name="contact" v-model="chooseUser.contact">
             <div class="has-text-danger" v-html="formValidate.contact"> </div>
        </div>
        <div class="form-group">
            <label>Dirección</label>
            <textarea cols="35" rows="5" :class="{'is-invalid': formValidate.address}" name="address" v-model="chooseUser.address" class="form-control"></textarea>
            <div class="has-text-danger" v-html="formValidate.address"> </div>
        </div>
    </div>
</div>
<div slot="foot">
    <button class="btn btn-dark" @click="updateUser">Actualizar</button>
</div>
</modal>


<!--eliminar modal-->
<modal v-if="deleteModal" @close="clearAll()">
    <h3 slot="head">Elimimar</h3>
    <div slot="body" class="text-center">¿Estas seguro de eliminar estos datos?</div>
    <div slot="foot">
        <button class="btn btn-dark" @click="deleteModal = false; deleteUser()" >Eliminar</button>
        <button class="btn" @click="deleteModal = false">Cancelar</button>
    </div>
</modal>