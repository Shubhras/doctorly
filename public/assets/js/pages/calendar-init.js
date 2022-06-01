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
            $('#selected_date').html(start.format('YYYY-DD-MM'));
            var startFormatDate = start.format('YYYY-DD-MM');
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
                            var date = moment(data[i].thirdanswer.date).format("YYYY-DD-MM");
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
                    function checkAdult(oject) {
                        return oject.thirdanswer.date == startFormatDate;
                    }
                    var list = '<table class="table table-bordered dt-responsive nowrap datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;"><thead class="thead-light"><tr><th>Sr.No</th>';
                    list += '<th>Patient Name</th>';
                    list += '<th>Patient Number</th>';
                    list += '<th>Time</th></tr></thead><tbody>';
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
            $.ajax({
                type: "get",
                url: "/appointment-filter",
                data: {
                    start: start,
                    end: end,
                    title: 'appointment',
                },
                success: function (response) {
                    const new_data = [];
                    for (let index = 0; index < response.length; index++) {
                        // console.log('kajshka',response[index]['thirdanswer']);
                        if (response[index]['thirdanswer']['date'] != undefined) {
                            // const element = response[index];
                            // var date = moment(data[i].thirdanswer.date).format("YYYY-DD-MM");
                            // console.log((response[index]['thirdanswer']['date'].toLocaleDateString()));
                            // var date = new Date(response[index]['thirdanswer']['date']).toISOString().slice(0, 10);
                            new_data.push({
                                date: new Date(response[index]['thirdanswer']['date']).toISOString().slice(0, 10)
                            });
                            //   date.toISOString().slice(0,10)
                            // console.log(date.toDateString());

                        }
                    }
                    var k = 0;
                    const new_data1 = [];
                    const cot = [];

                    for (var i = 1; i < new_data.length; i++) {
                        console.log(new_data[i]['date']);
                        // for (var j = 0; j < i; j++) {
                        //     if (new_data[i]['date'] == new_data[j]['date']) {
                        //         cot.push({
                        //                 total_appointment: k,
                        //                 appointment_date: new_data[j]['date'],
                        //             });
                        //            k++;
                        //         //    console.log(new_data[j]['date']);
                        //     } else {
                        //         new_data1.push({
                        //             total_appointment: 1,
                        //             appointment_date: new_data[j]['date'],
                        //         });
                        //     }
                        // }
                    }

                    // var myArr = ['apple', 'apple', 'orange', 'apple', 'banana', 'orange', 'pineapple'];
                    // var result = Object.keys(new_data).map((key) => [Number(new_data), new_data[key]]);
                    // console.log(result);
                    // var obj = {};   
                    // new_data.forEach(function (item) {
                    //     if (typeof obj[item] == 'number') {
                    //         obj[item]++;
                    //     } else {
                    //         obj[item] = 1;
                    //     }
                    // });
                    // console.log(obj);
                    // function groupArrayOfObjects(list, key) {
                    //     return list.reduce(function(rv, x) {
                    //       (rv[x[key]] = rv[x[key]] || []).push(x);
                    //       return rv;
                    //     }, {});
                    //   };
                    //   var groupedPeople=groupArrayOfObjects(cot,'appointment_date');

                    // console.log(new_data[j]['date']);
                    // let result = inventory.groupBy( ({ appointment_date }) => type );
                    // new_data1.push({
                    //     total_appointment: 2,
                    //     appointment_date: '2022-05-20',
                    // });
                    // console.log(new_data);
                    var events = [];
                    $(new_data1).each(function (key, value) {
                        events.push({
                            title: value.total_appointment + ' Appointment',
                            start: value.appointment_date,
                            end: value.appointment_date,
                            className: 'bg-success text-white',
                        });
                    });
                    callback(events);
                },
                error: function (response) {
                    console.log(response);
                }
            });
        },
    });

});