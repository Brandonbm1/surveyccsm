<body>
  <x-layout>
    <x-slot:title>Preguntas</x-slot:title>
    <style>
      .description::after {
        content: "*";
        color: red;
        margin-left: 4px;
      }

      li::marker,
      li>p {
        font-size: 1.2rem;
      }
    </style>
    <section class="row gap-4 justify-content-center">
      <header>
        <p class="fs-3 text-center fw-semibold text-secondary fst-italic" style="text-wrap: balance;">"Sistema de encuesta de la camara de Comercio de Santa Marta"</p>
      </header>
      <form method="post" class="row gap-4 justify-content-center" action="{{route('send_answer')}}">
        @csrf
        <h3 class="px-1">Preguntas</h3>
        <ol class="container ps-4 pe-0 ">
          <?php $questions = json_decode($questions); ?>
          @foreach ($questions as $index => $question)
          <li class="form-group p-0 mb-4">
            <p class="description mb-2">{{$question->description}}</p>
            <input type="hidden" name="question_ids[]" value="{{ $question->id }}">
            @if($question->type_id == 1)
            @foreach ($question->options as $option)
            <div class="form-check">
              <label class="form-check-label" style="display: block; cursor: pointer;">
                <input class="form-check-input" style="cursor: pointer;" type="radio" name="question_option" id="question{{ $index }}_{{ $loop->index }}" value="{{ $option }}">
                {{$option}}
              </label>
            </div>
            @endforeach
            @else
            <div class="form-floating">
              <textarea class="form-control" placeholder="Leave a comment here" id="question" name="question"></textarea>
              <label for="question">Pregunta abierta</label>
            </div>
            @endif
          </li>
          @endforeach
        </ol>
        <input class="btn btn-primary fw-bold fs-5" style="max-width: 40%" type="submit" value="Enviar">
      </form>
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