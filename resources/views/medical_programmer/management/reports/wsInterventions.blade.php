<div align="right">
  Última carga desde hospital: <b>{{$executedActivities->first()->created_at}}</b>
  <a href="{{ route('medical_programmer.operating_room/ws_hospital_intervenciones') }}" class="btn btn-sm btn-outline-secondary">
    <i class="fas fa-sync-alt" style="color:green"></i>
  </a>

</div>
