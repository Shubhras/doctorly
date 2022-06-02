/*
 Template Name: Doctorly - Patient Management System
 Author: Lndinghub(Themesbrand)
 File: Calendar Init
 */
$(document).ready(function () {
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    /*  className colors

     className: default(transparent), important(red), chill(pink), success(green), info(blue)

     */


    /* initialize the external events
     -----------------------------------------------------------------*/

    $('#external-events div.external-event').each(function () {

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
            revert: true, // will cause the event to go back to its
            revertDuration: 0 //  original position after the drag
        });

    });


    /* initialize the calendar
     -----------------------------------------------------------------*/

    var SITEURL = "{{url('/')}}"
    var calendar = $('#calendar').fullCalendar({

        header: {
            left: 'title',
            //center: 'agendaDay,agendaWeek,month',
            right: 'prev,next'
        },

        editable: true,
        firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
        selectable: true,
        longPressDelay: 1,
        defaultView: 'month',
        axisFormat: 'h:mm',
        columnFormat: {
            month: 'ddd', // Mon
            week: 'ddd d', // Mon 7
            day: 'dddd M/d', // Monday 9/7
            agendaDay: 'dddd d'
        },
        titleFormat: {
            month: 'MMMM YYYY', // September 2009
            week: "MMMM YYYY", // September 2009
            day: 'MMMM YYYY' // Tuesday, Sep 8, 2009
        },
        events: SITEURL + "/cal-appointment-show",
        displayEventTime: true,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },

        allDaySlot: false,
        selectHelper: true,
        select: function (start, end, allDay) {
            var dt = start.format('YYYY/MM/DD');
            $('#selected_date').html(start.format('YYYY-MM-DD'));
            var startFormatDate = start.format('YYYY-MM-DD');
            $('#appointment_list').hide();
            $('#new_list').show();
            $.ajax({
                method: 'get',
                url: apilist_url,
                data: { date: dt },
                dataType: 'json',
                success: function (response) {
                    var t = 1;
                    var data = response;
                    var newArray = [];
                    for (let i = 0; i < data.length; i++) {
                        if (data[i].thirdanswer != undefined) {
                            var date = moment(data[i].thirdanswer.date).format("YYYY-MM-DD");
                            newArray.push({
                                "fifthanswer": data[i].fifthanswer,
                                "firstanswer": data[i].firstanswer,
                                "fourthanswer": data[i].fourthanswer,
                                "secondanswer": data[i].secondanswer,
                                "sixanswer": data[i].sixanswer,
                                "sevenhanswer": data[i].sevenhanswer,
                                "thirdanswer": {
                                    "date": date
                                }
                            });
                        }
                    }
                    var newdata = newArray.filter(checkAdult);
                    function checkAdult(object) {
                        return object.thirdanswer.date == startFormatDate;
                    }
                    var list = '<table class="table table-bordered dt-responsive nowrap datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;"><thead class="thead-light"><tr><th>No Señor.</th>';
                    list += '<th>Paciente</th>';
                    list += '<th>Teléfono</th>';
                    list += '<th>Hora</th></tr></thead><tbody>';
                    $.each(newdata, function (i, filterdata) {
                        let firstanswer = filterdata.firstanswer;
                        let sevenhanswer = filterdata.sevenhanswer == undefined ? "" : filterdata.sevenhanswer.phone;
                        let thirdanswer = filterdata.thirdanswer == undefined ? "" : filterdata.thirdanswer.date;
                        list += "<tr><td>" + t + "</td><td>" + firstanswer + "</td><td>" + sevenhanswer + "</td><td>" + thirdanswer + "</td>";
                        t++;
                    });
                    list += "</tbody></table>";
                    $('#new_list').html(list);
                },
                error: function () {
                    console.log('Errors...Something went wrong!!!!');
                }
            });
            calendar.fullCalendar('unselect');
        },
        events: function (start, end, timezone, callback) {
            var start = moment(start, 'DD.MM.YYYY').format('YYYY-MM-DD')
            var end = moment(end, 'DD.MM.YYYY').format('YYYY-MM-DD')
            $('#new_list').show();
            $.ajax({
                type: "get",
                url: "/appointment-filter",
                data: {
                    start: start,
                    end: end,
                    title: 'appointment',
                },
                success: function (response) {
                    //console.log('appoinmentfilterresponse',response);
                    const new_data = [];
                    const newDublicate = [];
                    for (let index = 0; index < response.length; index++) {
                        if (response[index]['thirdanswer']['date'] != undefined) {
                            new_data.push({
                                date: new Date(response[index]['thirdanswer']['date']).toISOString().slice(0, 10)
                            });
                            newDublicate.push({
                                date: new Date(response[index]['thirdanswer']['date']).toISOString().slice(0, 10)
                            });
                        }
                    }
                    const new_data1 = [];
                    var clean = newDublicate.filter((newDublicate, index, self) =>
                        index === self.findIndex((t) => (t.date === newDublicate.date)));
                    if(newDublicate.length > 0){
                        var clean = newDublicate.filter((newDublicate, index, self) =>
                        index === self.findIndex((t) => (t.date === newDublicate.date)));
                        console.log("clean",clean);
                        for (let o = 0; o < clean.length; o++) {
                            var countData = new_data.filter(checkDate);
                            function checkDate(object) {
                                return object.date == clean[o].date;
                            }
                            new_data1.push({
                                total_appointment: countData.length,
                                appointment_date: clean[o].date,
                            });
                        }
                    }
                    // var currentdata = [];
                    // if(new Date().toISOString().slice(0, 10));
                    // console.log(new_data);
                    var events = [];
                    $(new_data1).each(function (key, value) {
                        events.push({
                            title: value.total_appointment + ' Appointment',
                            start: value.appointment_date,
                            end: value.appointment_date,
                            className: 'bg-success text-white',
                        });
                    });http://127.0.0.1:8000/appointment/create
                    callback(events);
                },
                error: function (response) {
                    console.log(response);
                }
            });
        },
    });

});