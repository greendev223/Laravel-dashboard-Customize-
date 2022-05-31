<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Calendar')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Calendar')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Calendar Event')): ?>
        <div class="row">

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Calendar</h5>
                    </div>
                    <div class="card-body">
                        <div class="calendar" data-toggle="calendar" id="calendar"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">

                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4">This Months events</h4>
                        <ul class="event-cards list-group list-group-flush mt-3 w-100">
                            
                            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item card mb-3">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-auto mb-3 mb-sm-0">
                                            <div class="d-flex align-items-center">

                                                <?php if($event->className == 'event-danger'): ?>
                                                    <div class="theme-avtar bg-danger">
                                                    <?php elseif($event->className == 'event-warning'): ?>
                                                        <div class="theme-avtar bg-warning">
                                                        <?php elseif($event->className == 'event-info'): ?>
                                                            <div class="theme-avtar bg-info">
                                                            <?php elseif($event->className == 'event-success'): ?>
                                                                <div class="theme-avtar bg-success">
                                                                <?php elseif($event->className == 'event-primary'): ?>
                                                                    <div class="theme-avtar bg-primary">
                                                                    <?php elseif($event->className == 'event-default'): ?>
                                                                        <div class="theme-avtar bg-default">
                                                <?php endif; ?>
                                                <i class="ti ti-calendar-event"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="m-0"><?php echo e($event->title); ?></h6>
                                                <small class="text-muted">Start date : <?php echo e($event->start); ?> , End date :
                                                    <?php echo e($event->end); ?></small>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </ul>
                </div>
            </div>
        </div>
        </div>

        <div class="modal fade" id="new-event" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="body">


                        <form class="new-event--form">
                            <div class="modal-body">
                                <div class="row">

                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('Event Title')); ?></label>
                                        <input type="text" class="form-control form-control-alternative new-event--title"
                                            placeholder="<?php echo e(__('Event Title')); ?>">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label class="form-control-label d-block mb-3"><?php echo e(__('Status Color')); ?></label>
                                        <div class=" btn-group-toggle btn-group-colors event-tag mb-0" data-toggle="buttons">
                                            <label class="btn bg-info active"><input type="radio" name="event-tag"
                                                    value="event-info" autocomplete="off" checked></label>
                                            <label class="btn bg-warning"><input type="radio" name="event-tag"
                                                    value="event-warning" autocomplete="off"></label>
                                            <label class="btn bg-danger"><input type="radio" name="event-tag"
                                                    value="event-danger" autocomplete="off"></label>
                                            <label class="btn bg-success"><input type="radio" name="event-tag"
                                                    value="event-success" autocomplete="off"></label>
                                            <label class="btn bg-default"><input type="radio" name="event-tag"
                                                    value="bg-default" autocomplete="off"></label>
                                            <label class="btn bg-primary"><input type="radio" name="event-tag"
                                                    value="event-primary" autocomplete="off"></label>
                                        </div>
                                    </div>
                                    <input type="hidden" class="new-event--start" />
                                    <input type="hidden" class="new-event--end" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-light"
                                    data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                                <input class="btn btn-primary new-event--add" type="submit" value="<?php echo e(__('Create')); ?>">
                            </div>

                            <?php echo e(Form::close()); ?>


                    </div>

                </div>
            </div>
        </div>


        <div class="modal fade" id="edit-event" tabindex="-1" role="dialog" aria-labelledby="edit-event-label"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form class="edit-event--form">
                            <div class="form-group">
                                <label class="form-control-label"><?php echo e(__('Event Title')); ?></label>
                                <input type="text" class="form-control form-control-alternative edit-event--title"
                                    placeholder="<?php echo e(__('Event Title')); ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label d-block mb-3"><?php echo e(__('Status Color')); ?></label>
                                <div class="btn-group btn-group-toggle btn-group-colors event-tag mb-0" data-toggle="buttons">
                                    <label class="btn bg-info active"><input type="radio" name="event-tag" value="bg-info"
                                            autocomplete="off" checked></label>
                                    <label class="btn bg-warning"><input type="radio" name="event-tag" value="bg-warning"
                                            autocomplete="off"></label>
                                    <label class="btn bg-danger"><input type="radio" name="event-tag" value="bg-danger"
                                            autocomplete="off"></label>
                                    <label class="btn bg-success"><input type="radio" name="event-tag" value="bg-success"
                                            autocomplete="off"></label>
                                    <label class="btn bg-default"><input type="radio" name="event-tag" value="bg-default"
                                            autocomplete="off"></label>
                                    <label class="btn bg-primary"><input type="radio" name="event-tag" value="bg-primary"
                                            autocomplete="off"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label"><?php echo e(__('Description')); ?></label>
                                <textarea class="form-control form-control-alternative edit-event--description textarea-autosize"
                                    placeholder="<?php echo e(__('Event Description')); ?>"></textarea>
                                <i class="form-group--bar"></i>
                            </div>
                            <input type="hidden" class="edit-event--id">
                        </form>
                    </div>
                    <div class="modal-footer mr-3 mb-3">
                        <button class="btn btn-danger btn-sm rounded-pill ml-4"
                            data-calendar="delete"><?php echo e(__('Delete')); ?></button>
                        <button class="ml-auto btn btn-sm btn-secondary rounded-pill"
                            data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button class="btn btn-primary btn-sm rounded-pill"
                            data-calendar="update"><?php echo e(__('Update')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('stylesheets'); ?>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/main.min.js')); ?>"></script>


    <script type="text/javascript">
        $(function() {
            'use strict';

            (function() {
                var etitle;
                var etype;
                var etypeclass;
                var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    themeSystem: 'bootstrap',
                    slotDuration: '00:10:00',
                    navLinks: true,
                    droppable: true,
                    selectable: true,
                    selectMirror: true,
                    editable: true,
                    dayMaxEvents: true,
                    handleWindowResize: true,
                    eventSources: [{
                        url: '<?php echo e(route('calendars.create')); ?>',
                    }],


                    dateClick: function(date) {

                        console.log(date['dateStr']);
                        // var isoDate = moment(date).toISOString();
                        var isoDate = date['dateStr'];
                        console.log(isoDate);
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Calendar Event')): ?>
                            $('#new-event').modal('show');
                        <?php endif; ?>
                        $('.btn-group-colors label.btn').removeClass('active');
                        $('.btn-group-colors label.btn.bg-info').addClass('active');

                        $('.new-event--title').val('');
                        $('.new-event--start').val(isoDate);
                        $('.new-event--end').val(isoDate);
                    },
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Calendar Event')): ?>
                        // eventClick: function (event, element) {
                        // $('.btn-group-colors label.btn').removeClass('active');
                        // $('.btn-group-colors label.btn.' + event.className[0]).addClass('active');
                        // // console.log(event.className);
                        // $('#edit-event input[value=' + event.className[0] + ']').prop('checked', true);
                        // $('.edit-event--id').val(event.id);
                        // $('.edit-event--title').val(event.title);
                        // $('.edit-event--description').val(event.description);
                        // $('#edit-event').modal('show');
                        // }
                        //
                    <?php endif; ?>



                });

                function calendarDropped(event) {
                    var eventObj = {
                        start: event.start.format(),
                        end: event.end !== null ? event.end.format() : event.start.format(),
                        calendaraction: 'dropped'
                    }

                    $.ajax({
                        url: '<?php echo e(route('calendars.index')); ?>/' + event.id,
                        method: 'PUT',
                        data: eventObj,
                        success: function(response) {},
                        error: function(data) {
                            data = data.responseJSON;
                            show_toastr('<?php echo e(__('Error')); ?>', data.error, 'error')
                        }

                    });
                }

                calendar.render();
            })();
            // console.log(data);

            $('body').on('click', '.new-event--add', function() {

                var eventTitle = $('.new-event--title').val();

                var eventObj = {
                    title: eventTitle,
                    start: $('.new-event--start').val(),
                    end: $('.new-event--end').val(),
                    allDay: true,
                    className: $('.event-tag input:checked').val()
                }

                if (eventTitle != '') {
                    $.ajax({
                        url: '<?php echo e(route('calendars.store')); ?>',
                        method: 'POST',
                        data: eventObj,
                        success: function(response) {
                            eventObj.id = response.last_id;
                            $this.fullCalendar('renderEvent', eventObj, true);
                        },
                        error: function(data) {
                            data = data.responseJSON;
                            show_toastr('<?php echo e(__('Error')); ?>', data.error,
                                'error')
                        }
                    });

                    $('.new-event--form')[0].reset();
                    $('.new-event--title').closest('.form-group').removeClass('has-danger');
                    $('#new-event').modal('hide');
                } else {
                    $('.new-event--title').closest('.form-group').addClass('has-danger');
                    $('.new-event--title').focus();
                }
            });


            $('body').on('click', '[data-calendar]', function() {
                alert("dg");
                var calendarAction = $(this).data('calendar');
                var currentId = $('.edit-event--id').val();
                var currentTitle = $('.edit-event--title').val();
                var currentDesc = $('.edit-event--description').val();
                var currentClass = $('#edit-event .event-tag input:checked').val();
                var currentEvent = $this.fullCalendar('clientEvents', currentId);

                var eventObj = {
                    id: currentId,
                    title: currentTitle,
                    description: currentDesc,
                    className: currentClass,
                    calendaraction: calendarAction
                }

                if (calendarAction === 'update') {
                    if (currentTitle != '') {
                        currentEvent[0].title = currentTitle;
                        currentEvent[0].description = currentDesc;
                        currentEvent[0].className[0] = [currentClass];
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Calendar Event')): ?>
                            // Update event
                            $this.fullCalendar('updateEvent', currentEvent[0]);
                        
                            $.ajax({
                            url: '<?php echo e(route('calendars.index')); ?>/' + currentId,
                            method: 'PUT',
                            data: eventObj,
                            success: function (response) {
                            },
                            error: function (data) {
                            data = data.responseJSON;
                            show_toastr('<?php echo e(__('Error')); ?>', data.error, 'error')
                            }
                            });
                            $('#edit-event').modal('hide');
                        <?php endif; ?>
                    } else {
                        $('.edit-event--title').closest('.form-group').addClass('has-error');
                        $('.edit-event--title').focus();
                    }
                }

                if (calendarAction === 'delete') {
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Calendar Event')): ?>
                        $('#edit-event').modal('hide');
                        // Delete event
                        $this.fullCalendar('removeEvents', currentId);
                    
                        $.ajax({
                        url: '<?php echo e(route('calendars.index')); ?>/' + currentId,
                        method: 'DELETE',
                        success: function (response) {
                        },
                        error: function (data) {
                        data = data.responseJSON;
                        show_toastr('<?php echo e(__('Error')); ?>', data.error, 'error')
                        }
                        });
                    <?php endif; ?>
                }
            });

        });
    </script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\wetransfer_scripts-to-install-onn-your-local-machine_2022-05-23_0954\posgo\main_file\resources\views/calendars/index.blade.php ENDPATH**/ ?>