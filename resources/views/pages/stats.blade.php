<body>
  <x-layout>
    <x-slot:title>Estadísticas</x-slot:title>
    <div class="container">
      <h3 class="text-center">Historico de preguntas</h3>
      <p class="text-center" style="text-wrap: balance;">Estan ordenadas de más nuevas a más antiguas<br>Boton azul para ver las preguntas de opción multiple y botón verde para ver las preguntas abiertas</p>
      <?php $questions = json_decode($questions); ?>
      @foreach ($questions as $index => $question)
      <div class="row gap-4 d-flex justify-content-center">
        @if($question->type_id == 1)
        <button class="btn btn-primary fetchQuestion" data-type="{{$question->type_id}}" data-id="{{$question->id}}">{{$question->description}}</button>
        @else
        <button class="btn btn-success fetchQuestion" data-type="{{$question->type_id}}" data-id="{{$question->id}}">{{$question->description}}</button>
        @endif
        <article id="article{{$index}}" class="col-8"></article>

      </div>
      @endforeach
    </div>
  </x-layout>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>

  <script>
    // Busco los buttons con la clase fetchQuestion
    const buttons = document.querySelectorAll('.fetchQuestion')
    buttons.forEach(button => {
      const id = button.getAttribute('data-id')
      button.addEventListener('click', () => getAnswersData(id));
    })
    const getAnswersData = (id) => {
      const button = document.querySelector(`.fetchQuestion[data-id="${id}"]`);
      const questionDescription = button.textContent;
      const questionType = button.getAttribute('data-type');
      const article = button.nextElementSibling;

      fetch(`/answers/${id}/${questionType}`)
        .then(response => response.json())
        .then(data => {
          // Busco el article que sigue al button que accionó el evento
          if (questionType == 2) {
            article.innerHTML = `
              <ul>
                ${data.map(answer => `<li>${answer.description}</li>`).join('')}
              </ul>
            
            `;
          } else {
            createChart(article.getAttribute('id'), questionDescription, data);
          }
        });
    }
    const createChart = (elementId, description, data) => {
      Highcharts.chart(elementId, {
        chart: {
          type: "column",
        },
        title: {
          align: "left",
          text: description,
        },
        accessibility: {
          announceNewData: {
            enabled: true,
          },
        },
        xAxis: {
          type: "category",
        },
        yAxis: {
          title: {
            text: "Valores",
          },
        },
        legend: {
          enabled: true,
        },
        plotOptions: {
          series: {
            borderWidth: 0,
            dataLabels: {
              enabled: true,
              format: "{point.y}",
            },
          },
        },

        tooltip: {
          headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
          pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>',
        },

        series: [{
          name: "Browsers",
          colorByPoint: true,
          data: data,
        }, ],
      });
    }
  </script>
</body>