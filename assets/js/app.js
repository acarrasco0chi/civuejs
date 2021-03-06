
Vue.component('modal',{ //modal
    template:`
      <transition
                enter-active-class="animated rollIn"
                     leave-active-class="animated rollOut">
    <div class="modal is-active" >
  <div class="modal-card border border border-secondary">
    <div class="modal-card-head text-center bg-dark">
    <div class="modal-card-title text-white">
          <slot name="head"></slot>
    </div>
<button class="delete" @click="$emit('close')"></button>
    </div>
    <div class="modal-card-body">
         <slot name="body"></slot>
    </div>
    <div class="modal-card-foot" >
      <slot name="foot"></slot>
    </div>
  </div>
</div>
</transition>
    `
})
var v = new Vue({
   el:'#app',
    data:{
        url:'http://localhost/civuejs/',
        addModal: false,
        editModal:false,
        deleteModal:false,
        users:[],
        search: {text: ''},
        emptyResult:false,
        newUser:{
            firstname:'',
            lastname:'',
            gender:'',
            birthday:'',
            email:'',
            contact:'',
            address:''},
        chooseUser:{},
        formValidate:[],
        successMSG:'',
        
        //pagination
        currentPage: 0,
        rowCountPage:5,
        totalUsers:0,
        pageRange:2
    },
     created(){
      this.showAll(); 
    },
    methods:{
         showAll(){ axios.get(this.url+"user/showAll").then(function(response){
                 if(response.data.users == null){
                     v.noResult()
                    }else{
                        v.getData(response.data.users);
                    }
            })
        },
          searchUser(){
            var formData = v.formData(v.search);
              axios.post(this.url+"user/searchUser", formData).then(function(response){
                  if(response.data.users == null){
                      v.noResult()
                    }else{
                      v.getData(response.data.users);
                    
                    }  
            })
        },
          addUser(){   
            var formData = v.formData(v.newUser);
              axios.post(this.url+"user/addUser", formData).then(function(response){
                if(response.data.error){
                    v.formValidate = response.data.msg;
                }else{
                    v.successMSG = response.data.msg;
                    v.clearAll();
                    v.clearMSG();
                }
               })
        },
        updateUser(){
            var formData = v.formData(v.chooseUser); axios.post(this.url+"user/updateUser", formData).then(function(response){
                if(response.data.error){
                    v.formValidate = response.data.msg;
                }else{
                      v.successMSG = response.data.success;
                    v.clearAll();
                    v.clearMSG();
                
                }
            })
        },
        deleteUser(){
             var formData = v.formData(v.chooseUser);
              axios.post(this.url+"user/deleteUser", formData).then(function(response){
                if(!response.data.error){
                     v.successMSG = response.data.success;
                    v.clearAll();
                    v.clearMSG();
                }
            })
        },
         formData(obj){
			var formData = new FormData();
		      for ( var key in obj ) {
		          formData.append(key, obj[key]);
		      } 
		      return formData;
		},
        getData(users){
            v.emptyResult = false; // se vuelve falso si tiene un registro
            v.totalUsers = users.length // obtiene un total de usuarios
            v.users = users.slice(v.currentPage * v.rowCountPage, (v.currentPage * v.rowCountPage) + v.rowCountPage); //slice the result for pagination
            
             //si el registro est?? vac??o, retrocede una p??gina
            if(v.users.length == 0 && v.currentPage > 0){ 
            v.pageUpdate(v.currentPage - 1)
            v.clearAll();  
            }
        },
            
        selectUser(user){
            v.chooseUser = user; 
        },
        clearMSG(){
            setTimeout(function(){
			 v.successMSG=''
			 },3000); // desapareciendo el mensaje exitoso en 2 segundos
        },
        clearAll(){
            v.newUser = { 
            firstname:'',
            lastname:'',
            gender:'',
            birthday:'',
            email:'',
            contact:'',
            address:''};
            v.formValidate = false;
            v.addModal= false;
            v.editModal=false;
            v.deleteModal=false;
            v.refresh()
            
        },
        noResult(){
          
               v.emptyResult = true;  // se convierte en verdadero si el registro est?? vac??o, imprime 'No Record Found'
                      v.users = null 
                     v.totalUsers = 0 // eliminar la p??gina actual si est?? vac??a
            
        },

        pickGender(gender){
           return v.newUser.gender = gender // agregar nuevo usuario con la selecci??n de g??nero
        },
        changeGender(gender){
             return v.chooseUser.gender = gender // actualizar el g??nero
        },
        imgGender(value){
            return v.url+'assets/img/gender_'+value+'.png' // para el signo de g??nero de imagen en la tabla
        },
        pageUpdate(pageNumber){
              v.currentPage = pageNumber; // recibir el n??mero de la p??gina actual provino de la plantilla de paginaci??n
                v.refresh()  
        },
        refresh(){
             v.search.text ? v.searchUser() : v.showAll(); // para prevenir
        }
    }
})