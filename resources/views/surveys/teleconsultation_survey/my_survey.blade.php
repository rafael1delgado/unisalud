@extends('fq.app')

@section('title', 'Encuesta: Habilitantes Teleconsulta')

@section('content')

<h5><i class="fas fa-tasks"></i> Encuesta: Habilitantes Teleconsulta</h5>

<br>

<hr>

    <div class="row active">
        <div class="col">
          1-. ¿Cuenta con computador o dispositivo similar con conexión a internet?
        </div>
        @if($teleconsultationSurvey->computer_or_similar == 1)
        <div class="col">
          <div class="form-check">
            Sí <i class="fas fa-check" style="color:green"></i>
          </div>
        </div>
        @else
        <div class="col">
          <div class="form-check">
            No <i class="fas fa-times" style="color:red"></i>
          </div>
        </div>
        @endif
    </div>

    <hr>

    <div class="row active">
        <div class="col">
          2-. ¿Cuenta con sistema de audio? (Parlantes o Audifonos).
        </div>
        @if($teleconsultationSurvey->audio == 1)
        <div class="col">
          <div class="form-check">
            Sí <i class="fas fa-check" style="color:green"></i>
          </div>
        </div>
        @else
        <div class="col">
          <div class="form-check">
            No <i class="fas fa-times" style="color:red"></i>
          </div>
        </div>
        @endif
    </div>

    <hr>

    <div class="row active">
        <div class="col">
          3-. ¿Cuenta con cámara web?
        </div>
        @if($teleconsultationSurvey->webcam == 1)
        <div class="col">
          <div class="form-check">
            Sí <i class="fas fa-check" style="color:green"></i>
          </div>
        </div>
        @else
        <div class="col">
          <div class="form-check">
            No <i class="fas fa-times" style="color:red"></i>
          </div>
        </div>
        @endif
    </div>

    <hr>

    <div class="row active">
        <div class="col">
          4-. ¿Cuenta con micrófono?
        </div>
        @if($teleconsultationSurvey->microphone == 1)
        <div class="col">
          <div class="form-check">
            Sí <i class="fas fa-check" style="color:green"></i>
          </div>
        </div>
        @else
        <div class="col">
          <div class="form-check">
            No <i class="fas fa-times" style="color:red"></i>
          </div>
        </div>
        @endif
    </div>

    <hr>

    <div class="row active">
        <div class="col">
          5-. ¿Como definiría su habilidad con el internet: ?
        </div>
        <div class="col">
          <fieldset class="form-group">
              <select name="internet_skill" id="for_internet_skill" class="form-control" disabled>
                  <option value="">Seleccione...</option>
                  <option value="good" {{ ($teleconsultationSurvey->internet_skill == 'good')?'selected':'' }}>Buena</option>
                  <option value="regular" {{ ($teleconsultationSurvey->internet_skill == 'regular')?'selected':'' }}>Regular</option>
                  <option value="bad" {{ ($teleconsultationSurvey->internet_skill == 'bad')?'selected':'' }}>Mala</option>
              </select>
          </fieldset>
        </div>
        <div class="col">

        </div>
    </div>

    <hr>

    <div class="row active">
        <div class="col">
          6-. ¿Cuenta con un lugar con buena luz, espacio físico y privacidad para
          poder desarrollar una sesión de telemedicina ?
        </div>
        @if($teleconsultationSurvey->place == 1)
        <div class="col">
          <div class="form-check">
            Sí <i class="fas fa-check" style="color:green"></i>
          </div>
        </div>
        @else
        <div class="col">
          <div class="form-check">
            No <i class="fas fa-times" style="color:red"></i>
          </div>
        </div>
        @endif
    </div>

    <hr>

    <div class="row active">
        <div class="col">
          7-. ¿Ha tenido experiencia previa con atención con modalidad remota?
        </div>
        @if($teleconsultationSurvey->has_experience == 1)
        <div class="col">
          <div class="form-check">
            Sí <i class="fas fa-check" style="color:green"></i>
          </div>
        </div>
        @else
        <div class="col">
          <div class="form-check">
            No <i class="fas fa-times" style="color:red"></i>
          </div>
        </div>
        @endif
    </div>

    <hr>

    <div class="row active">
        <div class="col">
          8-. ¿Presenta alguna dificultad visual o auditiva ?
        </div>
        @if($teleconsultationSurvey->hearing_or_visual_impairment == 1)
        <div class="col">
          <div class="form-check">
            Sí <i class="fas fa-check" style="color:green"></i>
          </div>
        </div>
        @else
        <div class="col">
          <div class="form-check">
            No <i class="fas fa-times" style="color:red"></i>
          </div>
        </div>
        @endif
    </div>

<br><br><br>

@endsection

@section('custom_js')

@endsection
