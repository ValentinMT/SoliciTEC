Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("#token").getAttribute('value');
new Vue({
	//Atributos.
	el: 'body', //Ambiente de trabajo de Vue.
	data: {
		newDptoNombre: "",
		newDptoExtension: "",
		newDptoEdificio: "",
		departamentos: [],
	},
	// Metodos
	ready: function() {
		//this.getDepartamentos();
	},
	methods:{
		/*getDepartamentos: function(){
			this.$http.get('/administrador/departamentos').then(function(response){
				this.$set('departamentos', response.data);
			});
		},*/

		InsertarDepto: function(){
            //Petición AJAX.
			this.$http.post('/insertarDepto', {'nombre': this.newDptoNombre, 'extension': this.newDptoExtension, 'edificio': this.newDptoEdificio}).then(function(response){
				this.departamentos.push(response.data);
				Materialize.toast('Departamento registrado de forma correcta.', 3500, 'rounded')
				this.newDptoNombre = "";
				this.newDptoExtension = "";
				this.newDptoEdificio = "";
			},function(error) {
				Materialize.toast('Ingresa un departamento válido, por favor.', 3500, 'rounded')
				this.newDptoNombre = "";
				this.newDptoExtension = "";
				this.newDptoEdificio = "";
			});
        },
	}
});