document.addEventListener('DOMContentLoaded', () => {

    if( document.querySelector('#dropzone') ){

        Dropzone.autoDiscover = false;

        const dropzone = new Dropzone('#dropzone', {
            url: '/imagenes/store',
            dictDefaultMessage: 'Máximo 10 imágenes',
            maxFiles: 10,
            required: true,
            acceptedFiles: ".png, .jpg, .jpeg, .gif, .bmp",
            addRemoveLinks: true,
            dictRemoveFile: 'Eliminar imagen',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
            },
            success: function( file, respuesta ){
                //console.log( file );
                console.log( respuesta );
                file.nombreServidor = respuesta.archivo;
            },
            sending: function( file, xhr, formData ){
                formData.append('uuid', document.querySelector('#uuid').value );
                //console.log('Enviando ');
            },

            error: function( respuesta ){
                console.log( respuesta );
            },

            removedfile: function( file, response ){
                console.log( file );

                const params = {
                    imagen: file.nombreServidor,
                };

                axios.post('/imagenes/destroy', params)
                    .then( respuesta => {
                        console.log( respuesta );

                        //Eliminar del DOM
                        file.previewElement.parentNode.removeChild( file.previewElement );
                    })
            }
        });

    }

});
