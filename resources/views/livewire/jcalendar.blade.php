<div>
<style>
    #calendar-container{
        width: 100%;
    }
    #calendar{
        padding: 10px;
        margin: 10px;
        width: 100%;
        height: 100%;
        /* border:2px solid black; */
    }
</style>

<div>
  <div id='calendar-container' wire:ignore>
    <div id='calendar'></div>
  </div>
</div>

@push('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js'></script>

<script>
    function fun() {
        $("#exampleModal").calendar.refetchEvents();
        //document.calendar.refetchEvents();
    }
    document.addEventListener('livewire:load', function () {
        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendar.Draggable;
        var calendarEl = document.getElementById('calendar');
        var checkbox = document.getElementById('drop-remove');
        var calendar = new Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            allDaySlot: false,
            firstDay: 1,
            slotMinTime: "08:00:00",
            slotDuration: "00:15:00",
            slotMaxTime: "17:30:00",
            //timeFormat: 'HH:mm',
            locale: 'es',
            editable: true,
            selectable: true,
            displayEventTime: false,
            droppable: true, // this allows things to be dropped onto the calendar
            lazyFetching: false,
            slotLabelFormat: {
                hour: 'numeric',
                minute: '2-digit',
                omitZeroMinute: false,
                hour12: false,
                meridiem: 'short'
            },
            eventSources:[
                {
                    id: 1,
                    events: JSON.parse(@this.events),
                }

            ],
            dateClick(info) {
                @this.resetdata();
                $('#exampleModal').modal('show');
                @this.dateStr = info.dateStr;
                calendar.refetchEvents();
                //calendar.getEvents();
            },

            eventClick: function(info) {
              let id = info.event.id;
              window.open('appointment_detail/'+id,"_self");
            },

            eventResize: info => @this.eventResize(info.event, info.oldEvent),
            eventDrop: info => @this.eventDrop(info.event, info.oldEvent),
            loading: function (isLoading) {
                if (!isLoading) {
                    // Reset custom events
                    this.getEvents().forEach(function (e) {
                        if (e.source === null) {
                            e.remove();
                        }
                    });
                }
            }
        });

        calendar.render();

        @this.on('reloadEvents', () => {
            calendar.refetchEvents();
        });

        @this.on(`refreshCalendar`, (event) => {
            calendar.refetchEvents();
            console.log(event);
            var json = JSON.parse(event);
            var eventAdd = {
                id: json.id,
                title: json.title,
                start: json.start,
                end: json.end
            };
            calendar.addEvent(eventAdd);
        });
    });
</script>
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css' rel='stylesheet' />
@endpush

<div wire:loading>
    Cargando...
</div>

</div>
