    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
    </style>
    <link rel="stylesheet" href="Assets/vendor/fullcalendar/fullcalendar.css" />
	<link rel="stylesheet" href="Assets/vendor/fullcalendar/fullcalendar.print.css" media="print" />
    <link rel="stylesheet" href="Assets/vendor/jquery-ui/jquery-ui.css" />
	<link rel="stylesheet" href="Assets/vendor/jquery-ui/jquery-ui.theme.css" />
    
				<div class="inner-wrapper" style="padding:0px !important">
				<section role="main" class="content-body">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-9">
									<div id="calendar"></div>
								</div>
								<div class="col-lg-3">
									<p class="h4 font-weight-light">Draggable Events</p>

									<hr />

									<div id='external-events'>
										<div class="external-event badge badge-default" data-event-class="fc-event-default">Default Event</div>
										<div class="external-event badge badge-primary" data-event-class="fc-event-primary">Primary Event</div>
										<div class="external-event badge badge-success" data-event-class="fc-event-success">Success Event</div>
										<div class="external-event badge badge-warning" data-event-class="fc-event-warning">Warning Event</div>
										<div class="external-event badge badge-info" data-event-class="fc-event-info">Info Event</div>
										<div class="external-event badge badge-danger" data-event-class="fc-event-danger">Danger Event</div>
										<div class="external-event badge badge-dark" data-event-class="fc-event-dark">Dark Event</div>

										<hr />
										<div>
											<div class="checkbox-custom checkbox-default ib">
												<input id="RemoveAfterDrop" type="checkbox"/>
												<label for="RemoveAfterDrop">remove after drop</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
			</div>

			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close d-md-none">
							Collapse <i class="fas fa-chevron-right"></i>
						</a>
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<h6>Upcoming Tasks</h6>
								<div data-plugin-datepicker data-plugin-skin="dark"></div>
			
								<ul>
									<li>
										<time datetime="2017-04-19T00:00+00:00">04/19/2017</time>
										<span>Company Meeting</span>
									</li>
								</ul>
							</div>
			
							<div class="sidebar-widget widget-friends">
								<h6>Friends</h6>
								<ul>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
								</ul>
							</div>
			
						</div>
					</div>
				</div>
			</aside>

		</section>	

		<!-- Examples -->
		<script src="Assets/vendor/jquery-ui/jquery-ui.js"></script>
		<script src="Assets/vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="Assets/vendor/moment/moment.js"></script>
		<script src="Assets/vendor/fullcalendar/fullcalendar.js"></script>
        <!-- <script src="Assets/js/examples/examples.calendar.js"></script> -->
        <script>
            (function($) {

'use strict';

var initCalendarDragNDrop = function() {
    $('#external-events div.external-event').each(function() {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });

    });
};

var initCalendar = function() {
    var $calendar = $('#calendar');
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    $calendar.fullCalendar({
        header: {
            left: 'title',
            right: 'prev,today,next,basicDay,basicWeek,month'
        },

        timeFormat: 'h:mm',

        themeButtonIcons: {
            prev: 'fas fa-caret-left',
            next: 'fas fa-caret-right',
        },

        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function(date, allDay) { // this function is called when something is dropped
            var $externalEvent = $(this);
            // retrieve the dropped element's stored Event Object
            var originalEventObject = $externalEvent.data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.className = $externalEvent.attr('data-event-class');

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#RemoveAfterDrop').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }

        },
        events: '?controller=query&method=getCalendarData',
        color:'yellow',
    });

    // FIX INPUTS TO BOOTSTRAP VERSIONS
    var $calendarButtons = $calendar.find('.fc-header-right > span');
    $calendarButtons
        .filter('.fc-button-prev, .fc-button-today, .fc-button-next')
            .wrapAll('<div class="btn-group mt-sm mr-md mb-sm ml-sm"></div>')
            .parent()
            .after('<br class="hidden"/>');

    $calendarButtons
        .not('.fc-button-prev, .fc-button-today, .fc-button-next')
            .wrapAll('<div class="btn-group mb-sm mt-sm"></div>');

    $calendarButtons
        .attr({ 'class': 'btn btn-sm btn-default' });
};

$(function() {
    initCalendar();
    initCalendarDragNDrop();
});

}).apply(this, [jQuery]);
        </script>