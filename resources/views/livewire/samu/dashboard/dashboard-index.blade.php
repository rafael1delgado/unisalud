<div>
    <h3 class="mb-2">
        <i class="fas fa-chart-line"></i> Panel de Estadísticas
    </h3>

    <div class="row pt-2">
        <div class="col">
            <div class="card p-2">
                <div id="chart-top" style="height: 300px;"></div>
            </div>
        </div>
    </div>

    <div class="row pt-2">
        <div class="col">
            <div class="card p-2">
                <div id="chart-1" style="height: 300px;"></div>
            </div>
        </div>
        <div class="col">
            <div class="card p-2">
                <div id="chart-2" style="height: 300px;"></div>
            </div>  
        </div>
    </div>

    <div class="row py-2">
        <div class="col">
            <div class="card p-2">
                <div id="chart-3" style="height: 300px;"></div>
            </div>
        </div>
        <div class="col">
            <div class="card p-2">
                <div id="chart-4" style="height: 300px;"></div>
            </div>
        </div>
    </div>
</div>

@section('custom_js')
   <!-- Charting library -->
    <script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
    <!-- Chartjs script -->
    <script>
        const loader = {
            color: '#006cb7',
            size: [50, 50],
            type: 'bar',
            textColor: '#000000',
            text: 'Cargando...',
        };

        const error = {
            color: '#006cb7',
            size: [50, 50],
            text: 'Ups Hubo un error...',
            textColor: '#000000',
            type: 'general',
            debug: true,
        };

        const chartTop = new Chartisan({
            el: '#chart-top',
            url: "@chart('event_last_month')",
            loader: loader,
            error: error,
            hooks: new ChartisanHooks()
            .colors(['#491152'])
            .responsive()
            .beginAtZero()
            .title('# Eventos de los últimos 30 días')
            .datasets([{ type: 'bar', fill: true }, 'bar']),
        });

        const chartOne = new Chartisan({
            el: '#chart-1',
            url: "@chart('event_by_mobile')",
            loader: loader,
            error: error,
            hooks: new ChartisanHooks()
            .colors(['#006cb7'])
            .responsive()
            .beginAtZero()
            .title('# Eventos atendidos por móvil durante mes de Marzo')
            .datasets([{ type: 'bar', fill: true }, 'bar']),
        });

        const chartTwo = new Chartisan({
            el: '#chart-2',
            url: "@chart('event_by_commune_month')?month={{ $month }}",
            loader: loader,
            error: error,
            hooks: new ChartisanHooks()
            .colors(['#006cb7'])
            .responsive()
            .beginAtZero()
            .title('# de Eventos atendidos por comunas durante mes de Marzo')
            .datasets([{ type: 'bar', fill: true }, 'bar']),
        });

        const chartForut = new Chartisan({
            el: '#chart-3',
            url: "@chart('event_by_sex')",
            loader: loader,
            error: error,
            hooks: new ChartisanHooks()
            .colors(['#006cb7'])
            .responsive()
            .beginAtZero()
            .title('# de Eventos agrupados por sexo durante mes de Marzo')
            .datasets([{ type: 'bar', fill: true }, 'bar']),
        });

        const chartThree = new Chartisan({
            el: '#chart-4',
            url: "@chart('event_by_month')",
            loader: loader,
            error: error,
            hooks: new ChartisanHooks()
            .colors(['#006cb7'])
            .responsive()
            .beginAtZero()
            .title('# de Eventos de los últimos tres meses')
            .datasets([{ type: 'bar', fill: true }, 'bar']),
        });

    </script>
@endsection
