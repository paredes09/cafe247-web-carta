document.addEventListener('DOMContentLoaded', function () {
    // Obtén una referencia a los elementos select
    var categoriaSelect = document.getElementById('categoria');
    var subcategoriaSelect = document.getElementById('subcategoria');
    var categoriaSelect1 = document.getElementById('categoria1');
    var subcategoriaSelect1 = document.getElementById('subcategoria1');


    // Agrega un evento de cambio al select de categoría 1
    if(categoriaSelect){
    categoriaSelect.addEventListener('change', function () {
        actualizarSubcategorias(categoriaSelect, subcategoriaSelect);
    });
    }

    // Agrega un evento de cambio al select de categoría 2
    if(categoriaSelect1){
        categoriaSelect1.addEventListener('change', function () {
            actualizarSubcategorias(categoriaSelect1, subcategoriaSelect1);
        });
    }

    // Función para actualizar las subcategorías
    function actualizarSubcategorias(categoriaSelect, subcategoriaSelect) {
        // Obtén el valor seleccionado de la categoría
        if(categoriaSelect){
        var categoriaValue = categoriaSelect.value;
        }
        // Limpia las opciones actuales en el select de subcategoría
        if(subcategoriaSelect){
        subcategoriaSelect.innerHTML = '';
        }
        // Si se selecciona una categoría, realiza una solicitud AJAX para obtener las subcategorías relacionadas
        if(categoriaSelect){
        if (categoriaValue !== '') {
            fetch('get_subcategoria.php?categoria=' + categoriaValue)
                .then(response => response.json())
                .then(data => {
                    // Verifica si hay subcategorías
                    if (data.length > 0) {
                        // Agrega las nuevas opciones al select de subcategoría
                        data.forEach(function (subcategoria) {
                            var option = document.createElement('option');
                            option.value = subcategoria.id;
                            option.textContent = subcategoria.nombre;
                            subcategoriaSelect.appendChild(option);
                        });

                        // Habilita el select de subcategoría
                        subcategoriaSelect.disabled = false;
                    } else {
                        // No hay subcategorías, deshabilita el select
                        subcategoriaSelect.disabled = true;
                    }
                })
                .catch(error => console.error('Error al obtener subcategorías:', error));
        } else {
            // Si no se selecciona una categoría, deshabilita y reinicia el select de subcategoría
            subcategoriaSelect.disabled = true;
        }
    }
    }

    // Al cargar la página, actualiza las subcategorías con la categoría preseleccionada (si hay una)
    actualizarSubcategorias(categoriaSelect, subcategoriaSelect);
    
});


document.addEventListener('DOMContentLoaded', function () {
    
    var editarButtons = document.querySelectorAll('.editar-producto');

    editarButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            // Obtener los datos del producto del atributo 'data-'
            var id = button.getAttribute('data-id');
            var producto = button.getAttribute('data-producto');
            var descripcion = button.getAttribute('data-descripcion');
            var precio = button.getAttribute('data-precio');
            var categoriaNombre = button.getAttribute('data-categoria');
            var subcategoriaNombre = button.getAttribute('data-subcategoria');
            var estado = button.getAttribute('data-estado');
        
            // Llenar los campos del formulario con los datos del producto
            document.getElementById('id_producto').value = id;
            document.getElementById('floatingInput1').value = producto;
            document.getElementById('descripcion1').value = descripcion;
            document.getElementById('Precio1').value = precio;
            document.getElementById('estado1').value = estado;
        
            // Establecer la categoría seleccionada en el formulario
            var categoriaSelect = document.getElementById('categoria1');
            // Encuentra la opción que tiene el valor igual al nombre de la categoría
            var categoriaOption = Array.from(categoriaSelect.options).find(option => option.text.trim() === categoriaNombre.trim());
  
            if (categoriaOption) {
                categoriaOption.selected = true;
                
               
                fetch('get_subcategoria.php?categoria=' + encodeURIComponent(categoriaOption.value))
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (subcategorias) {
                        // Llenar el select de subcategorías con las opciones obtenidas
                        var subcategoriaSelect = document.getElementById('subcategoria1');
                        subcategoriaSelect.innerHTML = '';

                        subcategorias.forEach(function (subcategoria) {
                            var option = document.createElement('option');
                            option.value = subcategoria.id;
                            option.text = subcategoria.nombre;

                            if (subcategoria.nombre.trim() === subcategoriaNombre.trim()) {
                                option.selected = true; 
                            }

                            subcategoriaSelect.appendChild(option);
                        });
                    })
                    .catch(function (error) {
                        console.error('Error al obtener subcategorías', error);
                    });
            }
        });
    });
});

// scrip para el cambio de categorias y subcategorias
$(document).ready(function () {
    // Obtener el valor inicial de "Categoría padre"
    var categoriaPadreInicial = $('#cpadre').val();

    // Al cambiar la opción de "Categoría principal"
    $('#cprincipal').change(function () {
        // Obtener el valor seleccionado como entero
        var categoriaPrincipal = parseInt($(this).val(), 10);

        // Obtener el campo "Categoría padre"
        var $cpadre = $('#cpadre');

        // Obtener el campo "Nombre de la categoría o subcategoría"
        var $nombreCategoria = $('#nombreCategoria');

        // Si la categoría principal es "Si"
        if (categoriaPrincipal === 1) {
            // Deshabilitar el campo "Categoría padre"
            $cpadre.prop('disabled', true);

            // Establecer el campo "Categoría padre" en blanco
            $cpadre.val('');

            // Establecer el campo "Nombre de la categoría o subcategoría" en blanco
           // $nombreCategoria.val('');
        } else {
            // Habilitar el campo "Categoría padre"
            $cpadre.prop('disabled', false);

            // Restaurar el valor inicial de "Categoría padre"
            $cpadre.val(categoriaPadreInicial);
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var editarButtons = document.querySelectorAll('.editar-oferta');

    editarButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            // Obtener los datos del producto del atributo 'data-'
            var id = button.getAttribute('data-id');
            var oferta = button.getAttribute('data-oferta');
            var precio = button.getAttribute('data-precio');
            var descripcion = button.getAttribute('data-desc');
            var condicion = button.getAttribute('data-condicion');
            var estado = button.getAttribute('data-estado');
            var imagen = button.getAttribute('data-imagen');
            var diasasociados = button.getAttribute('data-dias').split(',');
            var img = "../../" + imagen;
            
            // Llenar los campos del formulario con los datos del producto
            document.getElementById('oferta_id').value = id;
            document.getElementById('Oferta2').value = oferta;
            document.getElementById('Precio2').value = precio;
            document.getElementById('descripcion2').value = descripcion;
            document.getElementById('condicion2').value = condicion;
            document.getElementById('estado2').value = estado;
            document.getElementById('img').src = img;

            var checkboxes = document.querySelectorAll('[id^="check_1"]');
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = false;
            });

            diasasociados.forEach(function (diaId) {
                var checkbox = document.getElementById('check_1' + diaId);
                if (checkbox) {
                    checkbox.checked = true;
                }});
                // Función para manejar la selección de archivos
                function handleFileSelect(event) {
                    const archivoSeleccionado = event.target.files[0];

                    if (archivoSeleccionado) {
                        // Mostrar la imagen seleccionada
                        const imagenSeleccionada = document.getElementById('img');
                        imagenSeleccionada.src = URL.createObjectURL(archivoSeleccionado);
                    }
                }

                // Configurar el evento de cambio en el campo de entrada de archivos
                document.getElementById('seleccionar-archivo').addEventListener('change', handleFileSelect);
        });
    });
});