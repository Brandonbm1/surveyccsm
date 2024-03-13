<body>
  <x-layout>
    <x-slot:title>Editar</x-slot:title>
    <div class="row h-100 p-5" style="justify-content: center;">
      <article>
        <p class="text-center fs-2 fw-bold">Bienvenido, acá puedes editar las preguntas que requieras.</p>
        <p class="text-center mt-2 fs-5 text-body-secondary fw-semibold " style="text-wrap: balance;">
          Al presionar los botones debajo, se va a mostrar un modal donde se podrá modificar las preguntas actuales.
        </p>
      </article>
      <section class="row gap-2 justify-content-center">
        <button class="btn btn-primary col-md-5" data-bs-toggle="modal" data-bs-target="#editModalMultiple">Pregunta de selección multiple</button>
        <button class="btn btn-success col-md-5" data-bs-toggle="modal" data-bs-target="#editModalOpen">Pregunta Abierta</button>
      </section>
      @if ($errors->any())
      <div class="position-absolute toast align-items-center border-0" style="top: 1rem; left: 50%; background-color: #fde8e7" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <div class="toast-body fw-bolder" style="color:#af110a">
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
          </div>
          <button type="button" class="btn-close me-2 m-auto" style="color: #af110a;" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
      @endif
      @if (session('success'))
      <div class="position-absolute toast align-items-center  border-0" style="top: 1rem; left: 50%; background: #e4f7f0;" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <div class="toast-body fw-bolder" style="color:#32b087">
            {{ session('success') }}
          </div>
          <button type="button" class="btn-close me-2 m-auto" style="color: #32b087" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
      @endif

      <x-modal dataTarget="editModalMultiple" dataTitle="Cambiar pregunta de opción multiple" dataRoute="create_question"></x-modal>
      <x-modal dataTarget="editModalOpen" dataTitle="Cambiar pregunta abierta" dataRoute="create_question"></x-modal>
  </x-layout>
  <script>
    document.addEventListener('DOMContentLoaded', (event) => {
      var toastElList = [].slice.call(document.querySelectorAll('.toast'))
      var toastList = toastElList.map(function(toastEl) {
        return new bootstrap.Toast(toastEl, {
          autohide: false
        })
      });
      toastList.forEach(toast => toast.show()); // This show them
    });
  </script>
</body>