<div class="modal fade" id="{{$dataTarget}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">{{$dataTitle}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route($dataRoute)}}">
                    @csrf
                    @if($dataRoute == 'update_question')
                    @method('PUT')
                    @endif
                    <input type="text" name="id" value="{{$dataId}}" hidden>
                    <div class="form-group">
                        <label for="question" class="form-label">Pregunta</label>
                        <input type="text" name="description" class="form-control" id="question">
                    </div>
                    <!-- Si es el modal de editar y la pregunta es la pregunta de multiple respuesta -->
                    @if($dataRoute == 'update_question' && $dataTarget == 'editModalMultiple')
                    <label">
                        <input type="checkbox" name="updateOptions" id="updateOptions" checked>
                        Actualizar opciones
                        </label>
                    @endif
                    @if($dataTarget == 'editModalMultiple')
                    <div class="row mb-3" id="container_options">
                        <div class="col-12 col-md-6 form-group">
                            <label class="form-label w-100">
                                Option
                                <input type="text" name="optiondescription[]" class="form-control">
                            </label>
                        </div>
                    </div>
                    <button type="button" id="addNewOption" class="rounded btn btn-small btn-primary">+</button>
                    <input type="text" name="type" value="1" hidden>
                    @else
                    <input type="text" name="type" value="2" hidden>
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const addNewOptions = () => {
        let container = document.querySelector('#container_options');
        let newOption = document.createElement('div');
        newOption.classList.add('col-12', 'col-md-6', 'form-group');
        newOption.innerHTML = `
                <label class="form-label w-100">
                    Option 
                    <input type="text" name="optiondescription[]" class="form-control">
                </label>
        `;
        container.appendChild(newOption);
    }
    document.querySelector('#addNewOption').addEventListener('click', addNewOptions);
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('#updateOptions').addEventListener('change', function() {
            let containerOptions = document.querySelector('#container_options');
            let addButton = document.querySelector('#addNewOption')
            if (this.checked) {
                containerOptions.style.display = 'block';
                addButton.style.display = 'block';
            } else {
                containerOptions.style.display = 'none';
                addButton.style.display = 'none';
            }
        });
    });
</script>