// alertify.set('notifier', 'position', 'top.right')

const app = new Vue({
    el: "#app",
    data: {
        alumnos: [],
        usuario: {},
        url: null,
        eurl: null
    },

    mounted: function() {
        this.mostrarAlumnos()
    },
    methods: {
        mostrarAlumnos: function() {
            axios.get("http://localhost/api/php/api.php?evento=mostrar")
                .then(function(responde) {
                    if (responde.data.verificar == true) {
                        app.alumnos = responde.data.alumnos
                        console.log(app.alumnos)
                        alertify.success(responde.data.mensaje)
                    } else {
                        alertify.error(responde.data.mensaje)
                    }
                })
        },
        verImagen: function() {
            this.file = this.$refs.foto.files[0];
            this.url = URL.createObjectURL(this.file);
        },
        everImagen: function() {
            this.file = this.$refs.efoto.files[0];
            this.eurl = URL.createObjectURL(this.file);
        },
        insertarAlumno: function() {
            let formdata = new FormData();
            formdata.append("dni", document.getElementById("dni").value)
            formdata.append("nombres", document.getElementById("nombres").value)
            formdata.append("appaterno", document.getElementById("appaterno").value)
            formdata.append("apmaterno", document.getElementById("apmaterno").value)
            formdata.append("celular", document.getElementById("celular").value)
            formdata.append("correo", document.getElementById("correo").value)
            formdata.append("foto", document.getElementById("foto").files[0])
            axios.post("http://127.0.0.1/api/php/api.php?evento=insertar", formdata)
                .then(function(responde) {
                    if (responde.data.verificar == true) {
                        document.getElementById("closeNew").click()
                        alertify.success(responde.data.mensaje);
                        app.mostrarAlumnos()
                    } else {
                        alertify.error(responde.data.mensaje);
                    }
                })
        },
        nlimpiarAlumno: function() {
            document.getElementById("dni").value = ''
            document.getElementById("nombres").value = ''
            document.getElementById("appaterno").value = ''
            document.getElementById("apmaterno").value = ''
            document.getElementById("celular").value = ''
            document.getElementById("correo").value = ''
            document.getElementById("foto").value = ''
            this.url = null
        },
        elegirAlumno: function(alumno) {
            app.usuario = alumno
        },
        editarAlumno: function() {
            // document.getElementById("efoto").value=''
            // this.eurl = null
            let formdata = new FormData();
            formdata.append("edni", document.getElementById("edni").value)
            formdata.append("enombres", document.getElementById("enombres").value)
            formdata.append("eappaterno", document.getElementById("eappaterno").value)
            formdata.append("eapmaterno", document.getElementById("eapmaterno").value)
            formdata.append("ecelular", document.getElementById("ecelular").value)
            formdata.append("ecorreo", document.getElementById("ecorreo").value)
            formdata.append("efoto", document.getElementById("efoto").files[0])
            axios.post("http://127.0.0.1/api/php/api.php?evento=editar", formdata)
                .then(function(responde) {
                    if (responde.data.verificar == true) {
                        document.getElementById("closeEdit").click()
                        alertify.success(responde.data.mensaje);
                        app.mostrarAlumnos()
                    } else {
                        alertify.error(responde.data.mensaje);
                    }
                })
        },
        eliminarAlumno: function() {
            let formdata = new FormData();
            formdata.append("ddni", document.getElementById("ddni").value)
            axios.post("http://127.0.0.1/api/php/api.php?evento=eliminar", formdata)
                .then(function(responde) {
                    if (responde.data.verificar == true) {
                        document.getElementById("closeEliminar").click()
                        alertify.success(responde.data.mensaje);
                        app.mostrarAlumnos()
                    } else {
                        alertify.error(responde.data.mensaje);
                    }
                })
        }
    }
})