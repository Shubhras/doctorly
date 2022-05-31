/*
 Template Name: Doctorly - Patient Management System
 Author: Lndinghub(Themesbrand)
 File: Calendar Init
 */


$(document).ready(function() {
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    /*  className colors

     className: default(transparent), important(red), chill(pink), success(green), info(blue)

     */


    /* initialize the external events
     -----------------------------------------------------------------*/

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
        eventRender: function(event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },

        allDaySlot: false,
        selectHelper: true,
        select: function(start, end, allDay) {
            var dt = start.format('YYYY/MM/DD');
            $('#selected_date').html(start.format('YYYY-DD-MM'));
            //console.log(start.format('YYYY-DD-MM'));
            $('#appointment_list').hide();
            $('#new_list').show();
            $.ajax({
                method: 'get',
                url: apilist_url,
                data: { date: dt },
                dataType: 'json',
                success: function(response) {
                    var t = 1;
                    var data = response;

                    var newArray = [];
                    for(let i = 0; i < data.length; i++){
                        let date = new Date(data[i].thirdanswer, 'YYYY/MM/DD');
                        if(data[i].thirdanswer != undefined){
                            newArray.push({"fifthanswer": data[i].fifthanswer,
                            "firstanswer": data[i].firstanswer,
                            "fourthanswer": data[i].fourthanswer,
                            "secondanswer": data[i].secondanswer,
                            "sixanswer": data[i].sixanswer,
                            "thirdanswer":{
                                "date": date
                            }});
                        }
                    }
                    console.log("dd",newArray);
                    // var newdata = data.filter(checkAdult);
                    // //console.log('newdata',newdata);
                    // function checkAdult(oject) {
                    // return oject.thirdanswer.date == start.format('YYYY-DD-MM HH:MM:SS');
                    // }
                    // thirdanswer:
                    // date: "2022-05-24 15:30"
                    var list = '<table class="table table-bordered dt-responsive nowrap datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;"><thead class="thead-light"><tr><th>Sr.No</th>';
                    list += '<th>Patient Name</th>';
                    list += '<th>Patient Number</th>';
                    list += '<th>Time</th></tr></thead><tbody>';
                        $.each(newdata, function(i, filterdata) {
                            console.log('filterdata',filterdata);

                            let firstanswer = filterdata.firstanswer;
                            let sevenhanswer = filterdata.sevenhanswer == undefined ? "" : filterdata.sevenhanswer.phone;
                            let thirdanswer = filterdata.thirdanswer == undefined ? "" :filterdata.thirdanswer.date;
                            // const d = new Date();
                            // let time = d.getTime(thirdanswer);
                            list += "<tr><td>" + t + "</td><td>" + firstanswer + "</td><td>" + sevenhanswer + "</td><td>" + thirdanswer + "</td>";
                            t++;
                        });
                    list += "</tbody></table>";
                    $('#new_list').html(list);
                },
                error: function() {
                    console.log('Errors...Something went wrong!!!!');
                }
            });
            calendar.fullCalendar('unselect');
        },
        events: function(start, end, timezone, callback) {
            var start = moment(start, 'DD.MM.YYYY').format('YYYY-MM-DD')
            var end = moment(end, 'DD.MM.YYYY').format('YYYY-MM-DD')
            $.ajax({
                type: "get",
                url: "/cal-appointment-show",
                data: {
                    start: start,
                    end: end,
                    title: 'appointment',
                },
                success: function(response) {
                    console.log('response',response);
                    var events = [];
                    $(response.appointments).each(function(key, value) {
                        events.push({
                            title: value.total_appointment + ' Appointment',
                            start: value.appointment_date,
                            end: value.appointment_date,
                            className: 'bg-success text-white',
                        });
                    });
                    callback(events);
                },
                error: function(response) {
                    console.log(response);
                }
            });
        },
    });

});