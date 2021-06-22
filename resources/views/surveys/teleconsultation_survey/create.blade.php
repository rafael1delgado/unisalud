@extends('fq.app')

@section('title', 'Encuesta: Habilitantes Teleconsulta')

@section('content')

<h5><i class="fas fa-tasks"></i> Encuesta: Habilitantes Teleconsulta</h5>

<br>

<hr>
<div class="card">
  <div class="card-body">
    <form method="POST" class="form-horizontal" action="{{ route('surveys.teleconsultation.store') }}">
        @csrf
        @method('POST')
        <div class="row active">
            <div class="col">
              1-. ¿Cuenta con computador o dispositivo similar?
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="computer_or_similar"
                  id="for_computer_or_similar" value="1">
                <label class="form-check-label" for="for_computer_or_similar">
                  Si
                </label>
              </div>
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="computer_or_similar"
                id="for_computer_or_similar" value="0">
                <label class="form-check-label" for="for_computer_or_similar">
                  No
                </label>
              </div>
            </div>
        </div>

        <hr>

        <div class="row active">
            <div class="col">
              2-. ¿Cuenta con conexión a internet?
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="internet"
                  id="for_internet" value="1">
                <label class="form-check-label" for="for_internet">
                  Si
                </label>
              </div>
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="internet"
                id="for_internet" value="0">
                <label class="form-check-label" for="for_internet">
                  No
                </label>
              </div>
            </div>
        </div>

        <hr>

        <div class="row active">
            <div class="col">
              3-. ¿Cuenta con sistema de audio? (Parlantes o Audifonos).
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="audio"
                  id="for_audio" value="1">
                <label class="form-check-label" for="for_audio">
                  Si
                </label>
              </div>
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="audio"
                id="for_audio" value="0">
                <label class="form-check-label" for="for_audio">
                  No
                </label>
              </div>
            </div>
        </div>

        <hr>

        <div class="row active">
            <div class="col">
              4-. ¿Cuenta con cámara web?
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="webcam"
                  id="for_webcam" value="1">
                <label class="form-check-label" for="for_webcam">
                  Si
                </label>
              </div>
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="webcam"
                id="for_webcam" value="0">
                <label class="form-check-label" for="for_webcam">
                  No
                </label>
              </div>
            </div>
        </div>

        <hr>

        <div class="row active">
            <div class="col">
              5-. ¿Cuenta con micrófono?
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="microphone"
                  id="for_microphone" value="1">
                <label class="form-check-label" for="for_microphone">
                  Si
                </label>
              </div>
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="microphone"
                id="for_microphone" value="0">
                <label class="form-check-label" for="for_microphone">
                  No
                </label>
              </div>
            </div>
        </div>

        <hr>

        <div class="row active">
            <div class="col">
              6-. ¿Como definiría su habilidad con el internet: ?
            </div>
            <div class="col">
              <fieldset class="form-group">
                  <select name="internet_skill" id="for_internet_skill" class="form-control" required>
                      <option value="">Seleccione...</option>
                      <option value="good">Buena</option>
                      <option value="regular">Regular</option>
                      <option value="bad">Mala</option>
                  </select>
              </fieldset>
            </div>
            <div class="col">

            </div>
        </div>

        <hr>

        <div class="row active">
            <div class="col">
              7-. ¿Cuenta con un lugar con buena luz, espacio físico y privacidad para
              poder desarrollar una sesión de telemedicina ?
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="place"
                  id="for_place" value="1">
                <label class="form-check-label" for="for_place">
                  Si
                </label>
              </div>
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="place"
                id="for_place" value="0">
                <label class="form-check-label" for="for_place">
                  No
                </label>
              </div>
            </div>
        </div>

        <hr>

        <div class="row active">
            <div class="col">
              8-. ¿Ha tenido experiencia previa con atención con modalidad remota?
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="has_experience"
                  id="for_has_experience" value="1">
                <label class="form-check-label" for="for_has_experience">
                  Si
                </label>
              </div>
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="has_experience"
                id="for_has_experience" value="0">
                <label class="form-check-label" for="for_has_experience">
                  No
                </label>
              </div>
            </div>
        </div>

        <hr>

        <div class="row active">
            <div class="col">
              9-. ¿Presenta alguna dificultad visual o auditiva ?
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="hearing_or_visual_impairment"
                  id="for_hearing_or_visual_impairmente" value="1">
                <label class="form-check-label" for="for_hearing_or_visual_impairment">
                  Si
                </label>
              </div>
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="hearing_or_visual_impairment"
                id="for_hearing_or_visual_impairment" value="0">
                <label class="form-check-label" for="for_hearing_or_visual_impairment">
                  No
                </label>
              </div>
            </div>
        </div>

        <br>
        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Guardar</button>

    </form>
  </div>
</div>

<br><br><br>

@endsection

@section('custom_js')

@endsection
