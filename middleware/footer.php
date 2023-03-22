</div>
<!-- content -->

<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <script>
                    document.write(new Date().getFullYear());
                </script>
                &copy; Coded by <a href="https://triyatna.my.id/" target="_blank">TY Studio Dev</a>
            </div>
            <div class="col-md-6">
                <div class="text-md-end footer-links d-none d-sm-block">
                    <a href="<?= $domain ?>app/report">Report BUG</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->
</div>
<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->
</div>
<!-- END wrapper -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-end">
                <i class="mdi mdi-close"></i>
            </a>
            <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
        </div>

        <!-- Tab panes -->
        <div class="tab-content pt-0">
            <div class="tab-pane active" id="settings-tab" role="tabpanel">
                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, Layout,
                        etc.
                    </div>

                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h6>
                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="light" id="light-mode-check" />
                        <label class="form-check-label" for="light-mode-check">Light Mode</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="dark" id="dark-mode-check" checked />
                        <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                    </div>

                    <!-- Width -->
                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Width</h6>
                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="width" value="fluid" id="fluid-check" checked />
                        <label class="form-check-label" for="fluid-check">Fluid</label>
                    </div>
                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="width" value="boxed" id="boxed-check" />
                        <label class="form-check-label" for="boxed-check">Boxed</label>
                    </div>

                    <!-- Menu positions -->
                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">
                        Menus (Leftsidebar and Topbar) Positon
                    </h6>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="menus-position" value="fixed" id="fixed-check" checked />
                        <label class="form-check-label" for="fixed-check">Fixed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="menus-position" value="scrollable" id="scrollable-check" />
                        <label class="form-check-label" for="scrollable-check">Scrollable</label>
                    </div>

                    <!-- Left Sidebar-->
                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">
                        Left Sidebar Color
                    </h6>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="light" id="light-check" />
                        <label class="form-check-label" for="light-check">Light</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="dark" id="dark-check" checked />
                        <label class="form-check-label" for="dark-check">Dark</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="brand" id="brand-check" />
                        <label class="form-check-label" for="brand-check">Brand</label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="gradient" id="gradient-check" />
                        <label class="form-check-label" for="gradient-check">Gradient</label>
                    </div>

                    <!-- size -->
                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">
                        Left Sidebar Size
                    </h6>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="default" id="default-size-check" checked />
                        <label class="form-check-label" for="default-size-check">Default</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="condensed" id="condensed-check" />
                        <label class="form-check-label" for="condensed-check">Condensed <small>(Extra Small size)</small></label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="compact" id="compact-check" />
                        <label class="form-check-label" for="compact-check">Compact <small>(Small size)</small></label>
                    </div>

                    <!-- User info -->
                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">
                        Sidebar User Info
                    </h6>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftsidebar-user" value="fixed" id="sidebaruser-check" />
                        <label class="form-check-label" for="sidebaruser-check">Enable</label>
                    </div>

                    <!-- Topbar -->
                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Topbar</h6>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="topbar-color" value="dark" id="darktopbar-check" checked />
                        <label class="form-check-label" for="darktopbar-check">Dark</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="topbar-color" value="light" id="lighttopbar-check" />
                        <label class="form-check-label" for="lighttopbar-check">Light</label>
                    </div>

                    <div class="d-grid mt-4">
                        <button class="btn btn-primary" id="resetBtn">
                            Reset to Default
                        </button>
                        <a href="https://triyatna.my.id/" class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> TY Studio Dev</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="../assets/js/vendor.min.js"></script>
<script src="../assets/js/jqclock.js"></script>
<!-- knob plugin -->
<script src="../assets/libs/jquery-knob/jquery.knob.min.js"></script>

<!--Morris Chart-->
<script src="../assets/libs/morris.js06/morris.min.js"></script>
<script src="../assets/libs/raphael/raphael.min.js"></script>

<!-- third party js -->
<script src="../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="../assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="../assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="../assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="../assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="../assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="../assets/libs/moment/min/moment.min.js"></script>
<script src="../assets/libs/fullcalendar/main.min.js"></script>
<script src="../assets/libs/selectize/js/standalone/selectize.min.js"></script>
<script src="../assets/libs/mohithg-switchery/switchery.min.js"></script>
<script src="../assets/libs/multiselect/js/jquery.multi-select.js"></script>
<script src="../assets/libs/select2/js/select2.min.js"></script>
<script src="../assets/libs/jquery-mockjax/jquery.mockjax.min.js"></script>
<script src="../assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js"></script>
<script src="../assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="../assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="../core/getavatar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/croppie@2.6.5/croppie.min.js"></script>
<!-- <script src="../assets/libs/croppie/croppie.js"></script> -->
<script>
    function logoutsess() {
        Swal.fire({
            title: 'Are you sure you want to log out?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Log Out!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= $domain ?>auth/logout";
            }
        })
    }
    if (page == 'profiles') {
        var $image_crop = $('#image_demo').croppie({
            viewport: {
                width: 400,
                height: 400,
                type: 'square'
            },
            boundary: {
                width: 500,
                height: 500
            },
            maxZoomedCropWidth: 500,
            mouseWheelZoom: 'ctrl'
        });
        $('#exampleFormControlFile1').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#bs-example-modal-lg').modal('show');
        });

        $('.crop_image').click(function(event) {
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response) {
                $('#otp2').removeClass('d-none');
                $('#otp1').addClass('d-none');
                $('#bs-example-modal-lg').modal('hide');
                console.log(response);
                setTimeout(function() {
                    $.ajax({
                        url: "../core/App.upload.php",
                        type: "POST",
                        "data": {
                            "type": "updateprofileuser",
                            "id": "<?= getSingleValDB('users', 'username', $user, 'id') ?>",
                            "result": response,
                        },
                        success: function(data) {
                            $('#otp1').removeClass('d-none');
                            $('#otp2').addClass('d-none');
                            Swal.fire({
                                icon: 'success',
                                title: 'Profile Picture Updated',
                                showConfirmButton: false,
                                timer: 1500
                            }).then((result) => {
                                location.reload();
                            })
                        }
                    });
                }, 2000);
            })
        });
    }
    if (page == 'cash') {
        $("#cash-table").DataTable({
            "scrollY": 200,

        })
        $("#history-table").DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "scrollY": 200,

        })
    }
    if (page == 'data-cash') {
        $("#datatables").DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "scrollY": 200,

        });
        $("#datatables2").DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "scrollY": 200,

        })
    }
    if (page == 'project') {
        $(function() {
            $("#names").selectize({
                plugins: ["remove_button"],
                persist: !1,
                onDelete: function(e) {
                    return confirm(
                        1 < e.length ?
                        "Are you sure you want to remove these " +
                        e.length +
                        " items?" :
                        'Are you sure you want to remove "' + e[0] + '"?'
                    );
                },
            });
            $("#division").selectize({
                create: !0,
            });
        });
    }
    if (page == 'presence') {
        $(document).ready(function() {
            $("#presence-table").DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                "scrollY": 200,

            })
        });
    }
    // $("div#clock").clock({"calendar":false});
    if (page == 'member') {
        $(document).ready(function() {
            $("#datatables").DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                "scrollY": 200,

            })
        });
    }

    if (page == 'dashboard') {
        $("div#clock").clock({
            langSet: "id"
        });
        $.ajax({
            url: '../core/App.upload.php',
            type: 'POST',
            data: {
                type: 'data-schedule',
            },
            success: function(data) {
                !(function(l) {
                    "use strict";

                    function e() {
                        (this.$body = l("body")),
                        (this.$calendar = l("#calendar-dashboard")),
                        (this.$calendarObj = null),
                        (this.$selectedEvent = null),
                        (this.$newEventData = null);
                    }
                    (e.prototype.init = function() {
                        var e = new Date(l.now());
                        var te = [],
                            a = this
                        for (var i = 0; i < data.result.length; i++) {
                            if (data.result[i].allday == 'false') {
                                te.push({
                                    title: data.result[i].title,
                                    start: new Date(data.result[i].start * 1000),
                                    end: new Date(data.result[i].end * 1000),
                                    className: data.result[i].classname,
                                })
                            } else {
                                te.push({
                                    title: data.result[i].title,
                                    start: new Date(data.result[i].start * 1000),
                                    allDay: new Date(data.result[i].end * 1000),
                                    className: data.result[i].classname,
                                })
                            }
                        }

                        (a.$calendarObj = new FullCalendar.Calendar(a.$calendar[0], {
                            slotDuration: "00:15:00",
                            slotMinTime: "08:00:00",
                            slotMaxTime: "19:00:00",
                            themeSystem: "bootstrap",
                            bootstrapFontAwesome: !1,
                            buttonText: {
                                today: "Today",
                                month: "Month",
                                list: "List",
                                prev: "Prev",
                                next: "Next",
                            },
                            initialView: "dayGridMonth",
                            handleWindowResize: !0,
                            height: l(window).height() - 200,
                            headerToolbar: {
                                left: "prev,next today",
                                center: "title",
                                right: "dayGridMonth,listMonth",
                            },
                            initialEvents: te,
                        })),
                        a.$calendarObj.render()
                    }),
                    (l.CalendarApp = new e()),
                    (l.CalendarApp.Constructor = e);
                })(window.jQuery),
                (function() {
                    "use strict";
                    window.jQuery.CalendarApp.init();
                })();
            }
        });
    }
    if (page == 'calendar') {
        $('[data-plugin="switchery"]').each(function(e, a) {
            new Switchery(a);
        });
        $("#alldaycheck").change(function() {
            if ($(this).prop('checked')) {
                $("#enddatediv").hide();
                $("#enddate").removeAttr('required');
            } else {
                $("#enddatediv").show();
                $("#enddate").prop("required", true);
            }
        });

        $.ajax({
            url: '../core/App.upload.php',
            type: 'POST',
            data: {
                type: 'data-schedule',
            },
            success: function(data) {
                !(function(l) {
                    "use strict";

                    function e() {
                        (this.$body = l("body")),
                        (this.$modal = l("#event-modal")),
                        (this.$calendar = l("#calendar")),
                        (this.$formEvent = l("#form-event")),
                        (this.$btnNewEvent = l("#btn-new-event")),
                        (this.$btnDeleteEvent = l("#btn-delete-event")),
                        (this.$btnSaveEvent = l("#btn-save-event")),
                        (this.$modalTitle = l("#modal-title")),
                        (this.$calendarObj = null),
                        (this.$selectedEvent = null),
                        (this.$newEventData = null);
                    }
                    (e.prototype.onEventClick = function(e) {
                        this.$formEvent[0].reset(),
                            this.$formEvent.removeClass("was-validated"),
                            (this.$newEventData = null),
                            this.$btnDeleteEvent.show(),
                            this.$modalTitle.text("Edit Event"),
                            this.$modal.show(),
                            (this.$selectedEvent = e.event),
                            l("#event-title").val(this.$selectedEvent.title),
                            l("#event-category").val(this.$selectedEvent.classNames[0]);
                        console.log(this.$selectedEvent.title);
                    }),
                    (e.prototype.onSelect = function(e) {
                        this.$formEvent[0].reset(),
                            this.$formEvent.removeClass("was-validated"),
                            (this.$selectedEvent = null),
                            (this.$newEventData = e),
                            this.$btnDeleteEvent.hide(),
                            this.$modalTitle.text("Add New Event"),
                            this.$modal.show(),
                            this.$calendarObj.unselect();
                    }),
                    (e.prototype.init = function() {
                        this.$modal = new bootstrap.Modal(
                            document.getElementById("event-modal"), {
                                keyboard: !1
                            }
                        );
                        var e = new Date(l.now());

                        var t = [],
                            a = this
                        for (var i = 0; i < data.result.length; i++) {
                            if (data.result[i].allday == 'false') {
                                t.push({
                                    title: data.result[i].title,
                                    start: new Date(data.result[i].start * 1000),
                                    end: new Date(data.result[i].end * 1000),
                                    className: data.result[i].classname,
                                })
                            } else {
                                t.push({
                                    title: data.result[i].title,
                                    start: new Date(data.result[i].start * 1000),
                                    allDay: new Date(data.result[i].end * 1000),
                                    className: data.result[i].classname,
                                })
                            }
                        }

                        (a.$calendarObj = new FullCalendar.Calendar(a.$calendar[0], {
                            slotDuration: "00:15:00",
                            slotMinTime: "08:00:00",
                            slotMaxTime: "19:00:00",
                            themeSystem: "bootstrap",
                            bootstrapFontAwesome: !1,
                            buttonText: {
                                today: "Today",
                                month: "Month",
                                week: "Week",
                                day: "Day",
                                list: "List",
                                prev: "Prev",
                                next: "Next",
                            },
                            initialView: "dayGridMonth",
                            handleWindowResize: !0,
                            height: l(window).height() - 200,
                            headerToolbar: {
                                left: "prev,next today",
                                center: "title",
                                right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth",
                            },
                            initialEvents: t,
                            // editable: !0,
                            droppable: !0,
                            selectable: !0,
                            dateClick: function(e) {
                                a.onSelect(e);
                            },
                            eventClick: function(e) {
                                a.onEventClick(e);
                            },
                        })),
                        a.$calendarObj.render(),
                            a.$btnNewEvent.on("click", function(e) {
                                a.onSelect({
                                    date: new Date(),
                                    allDay: !0
                                });
                            }),
                            a.$formEvent.on("submit", function(e) {
                                e.preventDefault();
                                var t = a.$formEvent[0];
                                if (t.checkValidity()) {

                                    if (a.$selectedEvent) {
                                        $.ajax({
                                            url: '../core/App.upload.php',
                                            type: 'POST',
                                            data: {
                                                type: 'update-schedule-row',
                                                title: a.$selectedEvent.title,
                                                newTitle: l("#event-title").val(),
                                                className: l("#event-category").val(),
                                            },
                                            success: function(data) {
                                                console.log(data);
                                            },
                                            error: function(data) {
                                                console.log(data);
                                            }
                                        })
                                        a.$selectedEvent.setProp("title", l("#event-title").val()),
                                            a.$selectedEvent.setProp("classNames", [
                                                l("#event-category").val(),
                                            ]);
                                    } else {
                                        var n = {
                                            title: l("#event-title").val(),
                                            start: a.$newEventData.date,
                                            allDay: a.$newEventData.allDay,
                                            className: l("#event-category").val(),
                                        };

                                        function convert(str) {
                                            var date = new Date(str),
                                                mnth = ("0" + (date.getMonth() + 1)).slice(-2),
                                                day = ("0" + date.getDate()).slice(-2);
                                            return [date.getFullYear(), mnth, day].join("-");
                                        }
                                        $.ajax({
                                            url: '../core/App.upload.php',
                                            type: 'POST',
                                            data: {
                                                type: 'add-schedule-row',
                                                title: l("#event-title").val(),
                                                start: convert(a.$newEventData.date),
                                                className: l("#event-category").val(),
                                            },
                                            success: function(data) {
                                                a.$calendarObj.addEvent(n);
                                                console.log(data);
                                            },
                                            error: function(data) {
                                                console.log(data);
                                            }
                                        })
                                        console.log(convert(a.$newEventData.date))
                                    }
                                    a.$modal.hide();
                                } else e.stopPropagation(), t.classList.add("was-validated");
                            }),
                            l(
                                a.$btnDeleteEvent.on("click", function(e) {
                                    console.log(a.$selectedEvent._def.title);
                                    $.ajax({
                                        url: '../core/App.upload.php',
                                        type: 'POST',
                                        data: {
                                            type: 'delete-schedule',
                                            title: a.$selectedEvent._def.title,
                                        },
                                        success: function(data) {
                                            if (data.status == 'success') {
                                                a.$selectedEvent &&
                                                    (a.$selectedEvent.remove(),
                                                        (a.$selectedEvent = null),
                                                        a.$modal.hide());
                                            } else {
                                                alert(data.message);
                                            }
                                        },
                                        error: function(data) {
                                            alert(data.message);
                                        }
                                    });

                                })
                            );
                    }),
                    (l.CalendarApp = new e()),
                    (l.CalendarApp.Constructor = e);
                })(window.jQuery),
                (function() {
                    "use strict";
                    window.jQuery.CalendarApp.init();
                })();
            }
        });
    }
</script>
<!-- App js-->
<script src="../assets/js/app.min.js"></script>


</body>

</html>