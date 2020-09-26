@extends('sites-student.layout.student')
@section('content')
    <link rel="stylesheet" href="{{ asset('public/student/plugins/fullcalendar/main.min.css') }}">
    <!--<link rel="stylesheet" href="{{ asset('public/student/plugins/fullcalendar-interaction/main.min.css') }}">-->
    <link rel="stylesheet" href="{{ asset('public/student/plugins/fullcalendar-daygrid/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/student/plugins/fullcalendar-timegrid/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/student/plugins/fullcalendar-bootstrap/main.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <style>

        .fc-content {
            height: 30px;
        }
        .fc-title{
            /*text-align: center;*/
            /*padding: 20px 0 0 71px;*/
            color: #ffffff;
            font-size: larger;
            font-weight: bold;

        }

    </style>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-1">
                            <h1>Calendar</h1>
                        </div>
                        <div class="col-sm-7">
                            <form action="{{url('student/calendar')}}" id="filterForm" class="tuti-form profile-form" method="get" accept-charset="utf-8">
                                <div class="btn-group">
                                    <select id="LcList" name="lc" class="form-control">
                                        <option value="">--- Select Lc ---</option>
                                        @foreach ($LearningCenters as $key => $value)
                                        <option value="{{ $key }}" {{ @$filterLc == $key ? 'selected' : ''}}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="btn-group">
                                    <select id="classList" name="class" class="form-control">
                                        <option value="">--- Select Class ---</option>
                                        @foreach ($classes as $key => $value)
                                        <option value="{{ $key }}" {{ $classfilter == $key ? 'selected' : ''}}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>

                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Calendar</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-0">
                            <!-- the events -->
                            <div id="external-events">
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-body p-0">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="{{ asset('public/student/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('public/student/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('public/student/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('public/student/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('public/student/dist/js/demo.js') }}"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="{{ asset('public/student/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('public/student/plugins/fullcalendar/main.min.js') }}"></script>
    <script src="{{ asset('public/student/plugins/fullcalendar-daygrid/main.min.js') }}"></script>
    <script src="{{ asset('public/student/plugins/fullcalendar-timegrid/main.min.js') }}"></script>
    <script src="{{ asset('public/student/plugins/fullcalendar-interaction/main.min.js') }}"></script>
    <script src="{{ asset('public/student/plugins/fullcalendar-bootstrap/main.min.js') }}"></script>
    <!-- Page specific script -->
    <script>

$("#LcList,#classList").change(function () {
$("#filterForm").submit()
});


$(function () {

var calendarEvents = JSON.parse('<?= $calendarEvents ?>');
console.log(calendarEvents);
/* initialize the external events
 -----------------------------------------------------------------*/
function ini_events(ele) {
    ele.each(function () {
        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
        }
        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)
        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 1070,
            revert: true, // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        })
    })
}

ini_events($('#external-events div.external-event'))

/* initialize the calendar
 -----------------------------------------------------------------*/
//Date for the calendar events (dummy data)
var date = new Date()
var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear()

var Calendar = FullCalendar.Calendar;
var Draggable = FullCalendarInteraction.Draggable;
var containerEl = document.getElementById('external-events');
var checkbox = document.getElementById('drop-remove');
var calendarEl = document.getElementById('calendar');

// initialize the external events
// -----------------------------------------------------------------

new Draggable(containerEl, {
    itemSelector: '.external-event',
    eventData: function (eventEl) {
//            console.log(eventEl);
        return {
            title: eventEl.innerText,
            backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
            borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
            textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
        };
    }
});

// Array to hold the events
var events = []
// Itrerate the events object and push its data in another array in required format
calendarEvents.forEach(function (calendarEvent) {
    // Split the date and get y m d component from it
    eventDate = calendarEvent.created_at.split('-');
    var backgroundColor = '#3788D8';
    var borderColor = '#3788D8';

    var atitle = 'Present (' + calendarEvent.class_name + ')'
    if (calendarEvent.present == '0')	// Event is created by ALI user from frontend
    {
        atitle = 'Absent (' + calendarEvent.class_name + ')'
        var backgroundColor = '#dc3545';
        var borderColor = '#00a65a';
    }

    // Push the values in events variable in required format
    events.push({
        id: calendarEvent.student_id,
        title: atitle,
        start: new Date(eventDate[2], (eventDate[1] - 1), eventDate[0]), // Month array start from 0 in JS that's -1
        backgroundColor: backgroundColor,
        borderColor: borderColor,
        // url: 'https://calendar.google.com/calendar/r/week/'+ eventDate[0] +'/'+ eventDate[1] +'/' + eventDate[2]
    });
});

console.log(events);

var calendar = new Calendar(calendarEl, {
    plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid'],
    header: {
        left: 'prev,next today',
        center: 'title',
//            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        right: 'dayGridMonth,listYear'
    },
    //Random default events
    events: events,
    timeFormat: 'H(:mm)',
    displayEventTime: false,
    editable: true,
    droppable: true, // this allows things to be dropped onto the calendar !!!
    drop: function (info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
            // if so, remove the element from the "Draggable Events" list
            info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
    }
});
calendar.render();
// $('#calendar').fullCalendar()

/* ADDING EVENTS */
var currColor = '#3c8dbc' //Red by default
//Color chooser button
var colorChooser = $('#color-chooser-btn')
$('#color-chooser > li > a').click(function (e) {
    e.preventDefault()
    //Save color
    currColor = $(this).css('color')
    //Add color effect to button
    $('#add-new-event').css({
        'background-color': currColor,
        'border-color': currColor
    })
})
$('#add-new-event').click(function (e) {
    e.preventDefault()
    //Get value and make sure it is not null
    var val = $('#new-event').val()
    if (val.length == 0) {
        return
    }

    //Create events
    var event = $('<div />')
    event.css({
        'background-color': currColor,
        'border-color': currColor,
        'color': '#fff'
    }).addClass('external-event')
    event.html(val)
    $('#external-events').prepend(event)

    //Add draggable funtionality
    ini_events(event)

    //Remove event from text input
    $('#new-event').val('')
})
})
    </script>
@endsection